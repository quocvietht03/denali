<?php

namespace DenaliElementorWidgets\Widgets\MiniCart;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_MiniCart extends Widget_Base
{

	public function get_name()
	{
		return 'bt-mini-cart';
	}

	public function get_title()
	{
		return __('Mini Cart', 'denali');
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
			'cart_mini_icon',
			[
				'label' => esc_html__('Icon Cart', 'denali'),
				'type' => Controls_Manager::MEDIA,
				'media_types' => ['svg'],
			]
		);


		$this->end_controls_section();
	}


	protected function register_style_content_section_controls()
	{

		$this->start_controls_section(
			'section_style_content_cart',
			[
				'label' => esc_html__('Content Cart', 'denali'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_cart',
			[
				'label' => __('Icon', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'icon_cart_size',
			[
				'label' => __('Icon size', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 35,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-mini-cart--default .bt-mini-cart a svg ' => 'width: {{SIZE}}px;height:{{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'icon_cart_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-mini-cart--default .bt-mini-cart a svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_cart_background',
			[
				'label' => __('Background', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-mini-cart--default .bt-mini-cart a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_cart',
			[
				'label' => __('Number Cart', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'number_cart_color',
			[
				'label' => __('Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-mini-cart--default .bt-mini-cart span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_cart_background',
			[
				'label' => __('Background', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-mini-cart--default .bt-mini-cart span' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_cart_typography',
				'label' => __('number_cart Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-elwg-mini-cart--default .bt-mini-cart span',
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
		$icon_cart = $settings['cart_mini_icon']['url'];

?>
		<div class="bt-elwg-mini-cart--default">
			<div class="bt-mini-cart">
				<a class="bt-toggle-btn" href="<?php echo esc_url(wc_get_cart_url()) ?>">
					<?php if (!empty($icon_cart) && 'svg' === pathinfo($icon_cart, PATHINFO_EXTENSION)) {
						echo file_get_contents($icon_cart);
					} else { ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="35" height="36" viewBox="0 0 35 36" fill="none">
							<path d="M11.5461 16.4643V16.4499M23.0922 16.4643V16.4499M11.5461 12.1201V10.6769C11.5461 9.14574 12.1544 7.67735 13.237 6.59469C14.3197 5.51204 15.788 4.90381 17.3192 4.90381C18.8503 4.90381 20.3187 5.51204 21.4013 6.59469C22.484 7.67735 23.0922 9.14574 23.0922 10.6769V12.1201M11.5461 12.1201H9.87234C8.37109 12.1201 7.12046 13.2709 6.99579 14.7669L6.03361 26.313C5.89337 27.9959 7.22143 29.4393 8.91016 29.4393H25.7282C27.417 29.4393 28.7451 27.9959 28.6048 26.313L27.6425 14.7669C27.5179 13.2709 26.2673 12.1201 24.766 12.1201H23.0922M11.5461 12.1201H23.0922" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					<?php } ?>
					<span class="cart_total"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
			</div>
		</div>
	<?php
	}

	protected function content_template() {}
}
