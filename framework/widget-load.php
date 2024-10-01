<?php

namespace DenaliElementorWidgets;

/**
 * Class ElementorWidgets
 *
 * Main ElementorWidgets class
 * @since 1.0.0
 */
class ElementorWidgets
{

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var ElementorWidgets The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return ElementorWidgets An instance of the class.
	 */
	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public $widgets = array();

	public function widgets_list()
	{

		$this->widgets = array(
			'site-information',
			'site-information-style-1',
			'site-social',
			'site-social-style-2',
			'site-copyright',
			'instagram-posts',
			'contact-information',
			'page-breadcrumb',
			'step-list',
			'post-grid',
			'post-grid-style-1',
			'post-loop-item',
			'post-loop-item-style-1',
			'testimonial-slider',
			'testimonial-loop-item',
			'testimonial-loop-item-style-1',
			'testimonial-loop-item-style-2',
			'brand-loop-item',
			'orbit-circle',
			'pattern-background',
			'buble-background',
			'product-loop-item',
			'highlighted-heading',
			'popular-services',
			'popular-service-style-1',
			'popular-services-style-2',
			'pricing-item',
			'pricing-item-style-1',
			'time-list',
			'therapist-loop-item',
			'services-list', 
			'service-loop-item',
			'page-title-bar',
			'site-box-phone',
			'location-list'
		);

		return $this->widgets;
	}

	/**
	 * widget_styles
	 *
	 * Load required core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_styles()
	{
		wp_enqueue_style('slick-slider', get_template_directory_uri() . '/assets/libs/slick/slick.css', array(), false);
	}

	/**
	 * widget_scripts
	 *
	 * Load required core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts()
	{
		wp_register_script('slick-slider', get_template_directory_uri() . '/assets/libs/slick/slick.min.js', array('jquery'), '', true);
		wp_register_script('select2-min', get_template_directory_uri() . '/assets/libs/select2/select2.min.js', array('jquery'), '', true);
		wp_register_script('elementor-widgets',  get_stylesheet_directory_uri() . '/framework/widgets/frontend.js', ['jquery'], '', true);
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files()
	{

		foreach ($this->widgets_list() as $widget) {
			require_once(get_stylesheet_directory() . '/framework/widgets/' . $widget . '/widget.php');

			foreach (glob(get_stylesheet_directory() . '/framework/widgets/' . $widget . '/skins/*.php') as $filepath) {
				include $filepath;
			}
		}
	}

	/**
	 * Register categories
	 *
	 * Register new Elementor category.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_categories($elements_manager)
	{

		$elements_manager->add_category(
			'denali',
			[
				'title' => esc_html__('Denali', 'denali')
			]
		);
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets()
	{
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SiteInformation\Widget_SiteInformation());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SiteInformationStyle1\Widget_SiteInformationStyle1());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SiteSocial\Widget_SiteSocial());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SiteSocialStyle2\Widget_SiteSocialStyle2());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SiteCopyright\Widget_SiteCopyright());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\InstagramPosts\Widget_InstagramPosts());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ContactInformation\Widget_ContactInformation());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PageBreadcrumb\Widget_PageBreadcrumb());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\StepList\Widget_StepList());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostGrid\Widget_PostGrid());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostGridStyle1\Widget_PostGridStyle1());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostLoopItem\Widget_PostLoopItem());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostLoopItemStyle1\Widget_PostLoopItemStyle1());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\TestimonialSlider\Widget_TestimonialSlider());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\TestimonialLoopItem\Widget_TestimonialLoopItem());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\TestimonialLoopItemStyle1\Widget_TestimonialLoopItemStyle1());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\TestimonialLoopItemStyle2\Widget_TestimonialLoopItemStyle2());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\BrandLoopItem\Widget_BrandLoopItem());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\TherapistLoopItem\Widget_TherapistLoopItem());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PopularServices\Widget_PopularServices());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PopularServicesStyle1\Widget_PopularServicesStyle1());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PopularServicesStyle2\Widget_PopularServicesStyle2());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ServicesList\Widget_ServicesList());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ServiceLoopItem\Widget_ServiceLoopItem());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\OrbitCircle\Widget_OrbitCircle());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PatternBackground\Widget_PatternBackground());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\BubleBackground\Widget_BubleBackground());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ProductLoopItem\Widget_ProductLoopItem());

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\HighlightedHeading\Widget_HighlightedHeading());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PricingItem\Widget_PricingItem());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PricingItemStyle1\Widget_PricingItemStyle1());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\TimeList\Widget_TimeList());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SiteBoxPhone\Widget_SiteBoxPhone());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PageTitleBar\Widget_PageTitleBar());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\LocationList\Widget_LocationList());
	}

	/**
	 *  ElementorWidgets class constructor
	 *
	 * Register action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct()
	{

		// Register widget styles
		add_action('elementor/frontend/after_register_styles', [$this, 'widget_styles']);

		// Register widget scripts
		add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);

		// Register categories
		add_action('elementor/elements/categories_registered', [$this, 'register_categories']);

		// Register widgets
		add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
	}
}

// Instantiate ElementorWidgets Class
ElementorWidgets::instance();
