<?php

namespace DenaliElementorWidgets\Widgets\SiteBoxPhone;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_SiteBoxPhone extends Widget_Base
{

	public function get_name()
	{
		return 'bt-site-box-phone';
	}

	public function get_title()
	{
		return __('Site Box Phone', 'denali');
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
			'phone_custom_enable',
			[
				'label' => __('Enable Custom', 'denali'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'denali'),
				'label_off' => __('No', 'denali'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'denali'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'phone_custom_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__('Heading', 'denali'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Chat Us Anytime', 'denali'),
				'condition' => [
					'phone_custom_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'phone',
			[
				'label' => esc_html__('Phone', 'denali'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
				'condition' => [
					'phone_custom_enable' => 'yes',
				],
			]
		);


		$this->end_controls_section();
	}



	protected function register_style_content_section_controls()
	{

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Content Box', 'denali'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_style',
			[
				'label' => __('Icon', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'icon_ratio_size',
			[
				'label' => __('Size', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 52,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-site-box-phone--icon' => 'width: {{SIZE}}px;',
					'{{WRAPPER}} .bt-site-box-phone--infor' => 'width: calc( 100% - {{SIZE}}px );',
				],
			]
		);
		$this->add_responsive_control(
			'icon_gap',
			[
				'label' => __('Gap', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-site-box-phone--infor' => 'padding-left: {{SIZE}}px;',
				],
			]
		);
		$this->add_responsive_control(
			'content_gap',
			[
				'label' => __('Content Spacing', 'denali'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 8,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-site-box-phone--infor .bt-label' => 'margin-bottom: {{SIZE}}px;',
				],
			]
		);


		$this->add_control(
			'heading_style',
			[
				'label' => __('Heading', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => __('Heading Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-site-box-phone--infor .bt-label' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __('Heading Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-site-box-phone--infor .bt-label',
			]
		);
		$this->add_control(
			'phone_style',
			[
				'label' => __('Phone', 'denali'),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'phone_color',
			[
				'label' => __('Phone Color', 'denali'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-site-box-phone--infor .bt-phone' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'phone_typography',
				'label' => __('Price Typography', 'denali'),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-site-box-phone--infor .bt-phone',
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
		$site_information = get_field('site_information', 'options')
?>
		<div class="bt-elwg-site-box-phone">

			<div class="bt-site-box-phone">
				<?php if (!empty($settings['phone_custom_enable']) && $settings['phone_custom_enable'] === 'yes') { ?>
					<a href="<?php echo esc_url('tel:' . preg_replace('/[^0-9]+/', '', $settings['phone'])); ?>">
						<?php
						if (!empty($settings['icon'])) {
						?>
							<div class="bt-site-box-phone--icon">

								<img src="<?php echo esc_url($settings['icon']['url']) ?>" alt="" />

							</div>

						<?php
						} ?>
						<div class="bt-site-box-phone--infor">
							<?php
							if (!empty($settings['heading'])) {
								echo '<div class="bt-label">' . $settings['heading'] . '</div>';
							}
							?>
							<?php
							if (!empty($settings['phone'])) {
								echo '<div class="bt-phone">' . $settings['phone'] . '</div>';
							}
							?>
						</div>
					</a>
				<?php } else {
				?>
					<a href="<?php echo esc_url('tel:' . preg_replace('/[^0-9]+/', '', $site_information['site_phone'])); ?>">

						<div class="bt-site-box-phone--icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" fill="none">
								<g clip-path="url(#clip0_1200_1306)">
									<path d="M47.4297 41.2344H38.2891V26H47.4297C49.1125 26 50.4766 27.3641 50.4766 29.0469V38.1875C50.4766 39.8703 49.1125 41.2344 47.4297 41.2344Z" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M13.7109 41.2344H4.57031C2.88752 41.2344 1.52344 39.8703 1.52344 38.1875V29.0469C1.52344 27.3641 2.88752 26 4.57031 26H13.7109V41.2344Z" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M7.61719 41.2344V19.8047C7.61719 9.70826 15.9036 1.52344 26 1.52344C36.0964 1.52344 44.3828 9.70826 44.3828 19.8047V41.2344" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M44.3828 19.8047H47.4297" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M4.57031 19.8047H7.61719" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M32.0938 47.4297H41.3359C43.0187 47.4297 44.3828 46.0656 44.3828 44.3828V41.2344" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M29.0469 50.4766H22.9531C21.2703 50.4766 19.9062 49.1125 19.9062 47.4297C19.9062 45.7469 21.2703 44.3828 22.9531 44.3828H29.0469C30.7297 44.3828 32.0938 45.7469 32.0938 47.4297C32.0938 49.1125 30.7297 50.4766 29.0469 50.4766Z" stroke="#698F65" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
								</g>
								<defs>
									<clipPath id="clip0_1200_1306">
										<rect width="52" height="52" fill="white" />
									</clipPath>
								</defs>
							</svg>
						</div>
						<div class="bt-site-box-phone--infor">
							<?php
							echo '<div class="bt-label">' . esc_html__('Chat Us Anytime', 'denali') . '</div>';
							?>
							<?php
							echo '<div class="bt-phone">' . $site_information['site_phone'] . '</div>';
							?>
						</div>
					</a>
				<?php
				} ?>
			</div>

		</div>
<?php
	}

	protected function content_template() {}
}
