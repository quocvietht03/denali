<?php

namespace DenaliElementorWidgets\Widgets\ServicesList;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_ServicesList extends Widget_Base
{

	public function get_name()
	{
		return 'bt-services-list';
	}

	public function get_title()
	{
		return __('Services List', 'denali');
	}

	public function get_icon()
	{
		return 'eicon-posts-ticker';
	}

	public function get_categories()
	{
		return ['denali'];
	}

	protected function get_supported_ids()
	{
		$supported_ids = [];

		$wp_query = new \WP_Query(array(
			'post_type' => 'service',
			'post_status' => 'publish',
			'posts_per_page' => -1
		));

		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$supported_ids[get_the_ID()] = get_the_title();
			}
		}

		return $supported_ids;
	}

	public function get_supported_taxonomies()
	{
		$supported_taxonomies = [];

		$categories = get_terms(array(
			'taxonomy' => 'service_categories',
			'hide_empty' => false,
		));
		if (!empty($categories)  && !is_wp_error($categories)) {
			foreach ($categories as $category) {
				$supported_taxonomies[$category->term_id] = $category->name;
			}
		}

		return $supported_taxonomies;
	}


	protected function register_query_section_controls()
	{
		$this->start_controls_section(
			'section_query',
			[
				'label' => __('Query', 'denali'),
			]
		);

		$this->start_controls_tabs('tabs_query');

		$this->start_controls_tab(
			'tab_query_include',
			[
				'label' => __('Include', 'denali'),
			]
		);

		$this->add_control(
			'ids',
			[
				'label' => __('Ids', 'denali'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_ids(),
				'label_block' => true,
				'multiple' => true,
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __('Category', 'denali'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_taxonomies(),
				'label_block' => true,
				'multiple' => true,
			]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
			'tab_query_exnlude',
			[
				'label' => __('Exclude', 'denali'),
			]
		);

		$this->add_control(
			'ids_exclude',
			[
				'label' => __('Ids', 'denali'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_ids(),
				'label_block' => true,
				'multiple' => true,
			]
		);

		$this->add_control(
			'category_exclude',
			[
				'label' => __('Category', 'denali'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_taxonomies(),
				'label_block' => true,
				'multiple' => true,
			]
		);

		$this->add_control(
			'offset',
			[
				'label' => __('Offset', 'denali'),
				'type' => Controls_Manager::NUMBER,
				'default' => 0,
				'description' => __('Use this setting to skip over posts (e.g. \'2\' to skip over 2 posts).', 'denali'),
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'orderby',
			[
				'label' => __('Order By', 'denali'),
				'type' => Controls_Manager::SELECT,
				'default' => 'post_date',
				'options' => [
					'post_date' => __('Date', 'denali'),
					'post_title' => __('Title', 'denali'),
					'menu_order' => __('Menu Order', 'denali'),
					'rand' => __('Random', 'denali'),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __('Order', 'denali'),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __('ASC', 'denali'),
					'desc' => __('DESC', 'denali'),
				],
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => __('Posts Per Page', 'denali'),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
		);

		$this->end_controls_section();
	}


	protected function register_style_section_controls()
	{


		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Content', 'denali'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'section_ratio',
			[
				'label' => __('Space Between', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-service-list ' => 'grid-gap: {{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'icon_style',
			[
				'label' => __('Icon', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--icon svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_style',
			[
				'label' => __('Title', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => __('Color Hover', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-post--title',
			]
		);

		$this->end_controls_section();
	}

	protected function register_controls()
	{

		$this->register_query_section_controls();

		$this->register_style_section_controls();
	}

	public function query_posts()
	{
		$settings = $this->get_settings_for_display();

		$args = [
			'post_type' => 'service',
			'post_status' => 'publish',
			'posts_per_page' => $settings['posts_per_page'],
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
		];


		if (!empty($settings['ids'])) {
			$args['post__in'] = $settings['ids'];
		}

		if (!empty($settings['ids_exclude'])) {
			$args['post__not_in'] = $settings['ids_exclude'];
		}

		if (!empty($settings['category'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' 		=> 'service_categories',
					'terms' 		=> $settings['category'],
					'field' 		=> 'term_id',
					'operator' 		=> 'IN'
				)
			);
		}

		if (!empty($settings['category_exclude'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' 		=> 'service_categories',
					'terms' 		=> $settings['category_exclude'],
					'field' 		=> 'term_id',
					'operator' 		=> 'NOT IN'
				)
			);
		}

		if (0 !== absint($settings['offset'])) {
			$args['offset'] = $settings['offset'];
		}

		return $query = new \WP_Query($args);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$query = $this->query_posts();

?>
		<div class="bt-elwg-service-list--default">
			<?php
			if ($query->have_posts()) {
			?>
				<div class="bt-service-list">
					<?php
					while ($query->have_posts()) : $query->the_post();
					?>
						<div class="bt-service-list-item">
							<div class="bt-post--icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M18.3333 9.95818C18.3333 10.4582 18.0833 10.9582 17.6666 11.2915L11.1667 16.3749C11 16.5415 10.8334 16.6249 10.6667 16.6249C10.25 16.6249 9.91668 16.2915 9.83336 15.8749L9.58336 13.2082C9.58336 12.7915 9.25004 12.5415 8.83336 12.4582L3.41668 11.8749C3.16668 11.8749 3.08336 11.8749 3 11.7915C2.25 11.6249 1.66668 11.0415 1.66668 10.2915V9.87486V9.45818C1.75 8.70818 2.25 8.12486 3 7.95818C3.08332 7.95818 3.16668 7.95818 3.41668 7.87486L8.83336 7.29154C9.25004 7.29154 9.50004 6.95822 9.58336 6.54154L9.83336 3.87486C9.91668 3.45818 10.25 3.12486 10.6667 3.12486C10.8334 3.12486 11 3.20818 11.1667 3.29154L17.6667 8.37486C18.0833 8.95818 18.3333 9.45818 18.3333 9.95818ZM18.6667 12.6249C19.5 11.9582 20 10.9582 20 9.95818C20 8.87486 19.5 7.95818 18.6667 7.2915L12.1667 2.20818C11.75 1.87486 11.1667 1.70818 10.5834 1.70818C9.33336 1.70818 8.25004 2.70818 8.08336 3.95818L7.91668 5.95818L3.16668 6.45818C3 6.45818 2.83336 6.45818 2.66668 6.5415C1.16668 6.7915 0.0833588 8.0415 0 9.5415C0 9.70818 0 9.7915 0 10.0415V9.95818C0 10.1249 0 10.2915 0 10.4582C0.0833206 11.9582 1.25 13.2082 2.66668 13.4582C2.83336 13.4582 2.91668 13.4582 3.16668 13.5415L7.91668 14.0415L8.08336 16.0415C8.33336 17.2915 9.41668 18.2915 10.6667 18.2915C11.25 18.2915 11.75 18.1249 12.25 17.7915L18.6667 12.6249Z" fill="#C2A74E" />
								</svg>
							</div>
							<div class="bt-post--content">
								<?php echo denali_post_title_render(); ?>
							</div>
						</div>
					<?php
					endwhile;
					?>
				</div>
			<?php
			} else {
				get_template_part('framework/templates/post', 'none');
			}
			?>
		</div>
<?php
		wp_reset_postdata();
	}

	protected function content_template()
	{
	}
}
