<?php

namespace DenaliElementorWidgets\Widgets\PageTitleBar;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_PageTitleBar extends Widget_Base
{

	public function get_name()
	{
		return 'bt-page-title-bar';
	}

	public function get_title()
	{
		return __('Page Title Bar', 'denali');
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
			'custom_title_blurry',
			[
				'label' => __('Custom Title Blurry', 'denali'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
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
			'title_blurry_style',
			[
				'label' => __('Title Blurry', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'title_blurry_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-page-titlebar--title-blurry' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_blurry_typography',
				'label' => __('Blurry Title Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-page-titlebar--title-blurry',
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
					'{{WRAPPER}} .bt-page-titlebar--title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Title Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-page-titlebar--title',
			]
		);

		$this->add_control(
			'breadcrumb_style',
			[
				'label' => __('Breadcrumb', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'breadcrumb_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-page-titlebar--breadcrumb' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'breadcrumb_typography',
				'label' => __('Breadcrumb Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-page-titlebar--breadcrumb',
			]
		);

		$this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_content_section_controls();
		$this->register_style_content_section_controls();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$home_text = esc_html__('Home', 'denali');
		$delimiter = '|';
?>
		<div class="bt-elwg-page-titlebar">

			<div class="bt-page-titlebar">
				<div class="bt-page-titlebar--infor">
					<h1 class="bt-page-titlebar--title"><?php echo denali_page_title(); ?></h1>
					<div class="bt-page-titlebar--breadcrumb">
						<?php
						echo denali_page_breadcrumb($home_text, $delimiter);
						?>
					</div>
				</div>
			</div>
		</div>
<?php
	}

	protected function content_template() {}
}
