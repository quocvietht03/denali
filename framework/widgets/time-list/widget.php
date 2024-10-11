<?php

namespace DenaliElementorWidgets\Widgets\TimeList;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

class Widget_TimeList extends Widget_Base
{

	public function get_name()
	{
		return 'bt-time-list';
	}

	public function get_title()
	{
		return __('Time List', 'denali');
	}

	public function get_icon()
	{
		return 'eicon-posts-ticker';
	}

	public function get_categories()
	{
		return ['denali'];
	}

	public function get_script_depends()
	{
		return ['elementor-widgets'];
	}

	protected function register_layout_section_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'denali'),
			]
		);
		$this->add_control(
			'time_enable_icon',
			[
				'label' => __('Enable Icon', 'denali'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'denali'),
				'label_off' => __('No', 'denali'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'time_icon',
			[
				'label' => esc_html__('Icon', 'denali'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'condition' => [
					'time_enable_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'time_list_enable',
			[
				'label' => __('Enable Custom List', 'denali'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'denali'),
				'label_off' => __('No', 'denali'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'time_title',
			[
				'label' => __('Title', 'denali'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Monday', 'denali'),
			]
		);

		$repeater->add_control(
			'time_hours',
			[
				'label' => __('Hours', 'denali'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('12:00 pm - 08:00 pm', 'denali'),
			]
		);



		$this->add_control(
			'list',
			[
				'label' => __('List Time', 'denali'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'time_title' => __('Monday', 'denali'),
						'time_hours' => __('12:00 pm - 08:00 pm', 'denali'),

					],
					[
						'time_title' => __('Tuesday To Friday', 'denali'),
						'time_hours' => __('06:00 pm - 05:00 pm', 'denali'),
					],
					[
						'time_title' => __('Saturday - Sunday', 'denali'),
						'time_hours' => __('8:00 am - 3:30 pm', 'denali'),
					],
				],
				'title_field' => '{{{ time_title }}}',
				'condition' => [
					'time_list_enable' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_section_controls()
	{

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__('Icon', 'denali'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'time_enable_icon' => 'yes',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __('Color Icon', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-time--icon svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .bt-time--icon svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __('Size', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 54,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-time--icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
				],

				'condition' => [
					'time_enable_icon' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'icon_gap',
			[
				'label' => __('Space Between', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-time--item' => 'column-gap: {{SIZE}}{{UNIT}}',
				],

				'condition' => [
					'time_enable_icon' => 'yes',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Content', 'denali'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'titmetitle_style',
			[
				'label' => __('Title', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'timetitle_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-time--title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'timetitle_typography',
				'label' => __('Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-time--title',
			]
		);

		$this->add_control(
			'timehours_style',
			[
				'label' => __('Hours', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'timehours_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-time--hours' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'timehours_typography',
				'label' => __('Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-time--hours',
			]
		);
		$this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_layout_section_controls();
		$this->register_style_section_controls();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$site_information = get_field('site_information', 'options');

?>
		<div class="bt-elwg-time-list--default">
			<ul class="bt-time-list">
				<?php if (!empty($settings['time_list_enable']) && $settings['time_list_enable'] === 'yes') {
					if (empty($settings['list'])) {
						return;
					}
					foreach ($settings['list'] as $index => $item) {
				?>
						<li class="bt-time--item">
							<?php if (!empty($settings['time_enable_icon']) && $settings['time_enable_icon'] === 'yes' && !empty($settings['time_icon']['url'])) { ?>
								<div class="bt-time--icon">
									<?php
									if (!empty($settings['time_icon']['url']) && 'svg' === pathinfo($settings['time_icon']['url'], PATHINFO_EXTENSION)) {
										echo file_get_contents($settings['time_icon']['url']);
									}
									?>
								</div>
							<?php } ?>
							<div class="bt-time--infor">
								<div class="bt-time--title">
									<?php echo esc_html($item['time_title']); ?>
								</div>
								<div class="bt-time--hours">
									<?php echo esc_html($item['time_hours']); ?>
								</div>
							</div>
						</li>
						<?php }
				} else {
					if (!empty($site_information['opening_hours'])) {
						foreach ($site_information['opening_hours'] as $item) {
						?>
							<li class="bt-time--item">
								<?php if (!empty($settings['time_enable_icon']) && $settings['time_enable_icon'] === 'yes' && !empty($settings['time_icon']['url'])) { ?>
									<div class="bt-time--icon">
										<?php
										if (!empty($settings['time_icon']['url']) && 'svg' === pathinfo($settings['time_icon']['url'], PATHINFO_EXTENSION)) {
											echo file_get_contents($settings['time_icon']['url']);
										}
										?>
									</div>
								<?php } ?>
								<div class="bt-time--infor">
									<div class="bt-time--title">
										<?php echo esc_html($item['heading']); ?>
									</div>
									<div class="bt-time--hours">
										<?php echo esc_html($item['hours']); ?>
									</div>
								</div>
							</li>
				<?php
						}
					}
				}
				?>
			</ul>
		</div>
<?php
	}

	protected function content_template() {}
}
