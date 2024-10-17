<?php

namespace DenaliElementorWidgets\Widgets\SiteSocial;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Widget_SiteSocial extends Widget_Base
{

	public function get_name()
	{
		return 'bt-site-social';
	}

	public function get_title()
	{
		return __('Site Social', 'denali');
	}

	public function get_icon()
	{
		return 'eicon-posts-ticker';
	}

	public function get_categories()
	{
		return ['denali'];
	}

	protected function register_content_section_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'denali'),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'denali'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
			]
		);

		$this->end_controls_section();
	}

	protected function register_layout_section_controls()
	{
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __('Layout', 'denali'),
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__('Alignment', 'denali'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Left', 'denali'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'denali'),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__('Right', 'denali'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-site-social' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_content_section_controls()
	{

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Content', 'denali'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Title Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-site-social span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Title Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-elwg-site-social span',
			]
		);

		$this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_content_section_controls();
		$this->register_layout_section_controls();
		$this->register_style_content_section_controls();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if (function_exists('get_field')) {
			$site_infor = get_field('site_information', 'options');
		} else {
			return;
		}

		if (empty($site_infor['site_socials'])) {
			return;
		}

?>
		<div class="bt-elwg-site-social">
			<?php
			if (!empty($settings['title'])) {
				echo '<span class="bt-title">' . $settings['title'] . '</span>';
			}

			foreach ($site_infor['site_socials'] as $item) {
				if ($item['social'] == 'facebook') {
					echo '<a class="bt-' . esc_attr($item['social']) . '" href="' . esc_url($item['link']) . '" target="_blank">
								<svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.37955 0.428292V3.08008H7.80255C6.56706 3.08008 6.33603 3.67271 6.33603 4.52651V6.42494H9.27911L8.88737 9.39816H6.33603V17.022H3.26237V9.39816H0.700983V6.42494H3.26237V4.23521C3.26237 1.69392 4.81929 0.307755 7.08938 0.307755C8.1742 0.307755 9.10835 0.388113 9.37955 0.428292Z" fill="white"/></svg>
							</a>';
				}
				if ($item['social'] == 'linkedin') {
					echo '<a class="bt-' . esc_attr($item['social']) . '" href="' . esc_url($item['link']) . '" target="_blank">
								<svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.27079 4.91476V14.869H0.956061V4.91476H4.27079ZM4.48173 1.8411C4.49178 2.79534 3.76856 3.55873 2.61343 3.55873H2.59334C1.47838 3.55873 0.765213 2.79534 0.765213 1.8411C0.765213 0.866768 1.50852 0.123465 2.63352 0.123465C3.76856 0.123465 4.47169 0.866768 4.48173 1.8411ZM16.1938 9.16364V14.869H12.8891V9.54534C12.8891 8.2094 12.407 7.29534 11.2116 7.29534C10.2976 7.29534 9.75517 7.90806 9.5141 8.5007C9.43374 8.72168 9.40361 9.01297 9.40361 9.31431V14.869H6.09892C6.1391 5.84891 6.09892 4.91476 6.09892 4.91476H9.40361V6.36119H9.38352C9.81544 5.67815 10.5989 4.68373 12.3869 4.68373C14.5666 4.68373 16.1938 6.11007 16.1938 9.16364Z" fill="white"/></svg>
							</a>';
				}

				if ($item['social'] == 'twitter') {
					echo '<a class="bt-' . esc_attr($item['social']) . '" href="' . esc_url($item['link']) . '" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
										<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
									</svg>
							</a>';
				}

				if ($item['social'] == 'google') {
					echo '<a class="bt-' . esc_attr($item['social']) . '" href="' . esc_url($item['link']) . '" target="_blank">
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.2508 7.87891C14.2508 11.8538 11.5851 14.6713 7.57227 14.6713C3.7302 14.6713 0.618591 11.5597 0.618591 7.71763C0.618591 3.87556 3.7302 0.76395 7.57227 0.76395C9.45062 0.76395 11.0159 1.44699 12.2302 2.58538L10.3424 4.39732C9.83009 3.90402 8.92886 3.32533 7.57227 3.32533C5.20062 3.32533 3.26535 5.28906 3.26535 7.71763C3.26535 10.1462 5.20062 12.1099 7.57227 12.1099C10.3234 12.1099 11.3574 10.1272 11.5187 9.11217H7.57227V6.72154H14.137C14.2034 7.07254 14.2508 7.42355 14.2508 7.87891ZM22.4757 6.72154V8.71373H20.493V10.6964H18.5008V8.71373H16.5181V6.72154H18.5008V4.73884H20.493V6.72154H22.4757Z" fill="#E22E04"/></svg>
							</a>';
				}
			}
			?>
		</div>
<?php
	}

	protected function content_template()
	{
	}
}
