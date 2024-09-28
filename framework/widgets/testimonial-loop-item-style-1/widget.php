<?php

namespace DenaliElementorWidgets\Widgets\TestimonialLoopItemStyle1;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_TestimonialLoopItemStyle1 extends Widget_Base
{

	public function get_name()
	{
		return 'bt-testimonial-loop-item-style1';
	}

	public function get_title()
	{
		return __('Testimonial Loop Item Style 1', 'denali');
	}

	public function get_icon()
	{
		return 'eicon-posts-ticker';
	}

	public function get_categories()
	{
		return ['denali'];
	}

	protected function register_layout_section_controls()
	{
	}

	protected function register_style_section_controls()
	{
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => esc_html__( 'Box', 'denali' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_content',
			[
				'label' => __('Background', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'denali' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bt-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'denali' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .bt-post',
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
			'rating_style',
			[
				'label' => __('Rating', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'rating_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--rating .bt-filled svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'desc_style',
			[
				'label' => __('Description', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __('Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-post--desc',
			]
		);
		$this->add_control(
			'name_style',
			[
				'label' => __('Name Author', 'denali'),
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
					'{{WRAPPER}} .bt-post--title-job' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'name_color_hover',
			[
				'label' => __('Color Hover', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post:hover .bt-post--title-job' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __('Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-post--title-job',
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

?>
		<div class="bt-elwg-testimonial-loop-item--style1">
			<?php get_template_part('framework/templates/testimonial', 'style1'); ?>
		</div>
<?php
	}

	protected function content_template()
	{
	}
}
