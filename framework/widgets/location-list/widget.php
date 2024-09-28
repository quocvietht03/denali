<?php

namespace DenaliElementorWidgets\Widgets\LocationList;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;


class Widget_LocationList extends Widget_Base
{

    public function get_name()
    {
        return 'bt-location-list';
    }

    public function get_title()
    {
        return __('Location List', 'denali');
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

        $repeater = new Repeater();


        $repeater->add_control(
            'location_heading',
            [
                'label' => __('Heading', 'denali'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $repeater->add_control(
            'location_title',
            [
                'label' => __('Title', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Our Locations', 'denali'),
            ]
        );
        $repeater->add_control(
            'location_address',
            [
                'label' => __('Address', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
            ]
        );
        $repeater->add_control(
            'location_maps_zoom',
            [
                'label' => __('Maps zoom', 'denali'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 12,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'location_button',
            [
                'label' => __('Button', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Enquire', 'denali'),
            ]
        );
        $repeater->add_control(
            'location_button_link',
            [
                'label' => __('Button Link', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
            ]
        );
        $repeater->add_control(
            'location_content',
            [
                'label' => __('Content', 'denali'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $repeater->add_control(
            'location_opening_hours',
            [
                'label' => __('Opening Hours', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Opening Hours', 'denali'),
            ]
        );

        $nested_repeater = new Repeater();

        $nested_repeater->add_control(
            'sub_location_title',
            [
                'label' => __('Title', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Monday To Friday', 'denali'),
            ]
        );

        $nested_repeater->add_control(
            'sub_location_hours',
            [
                'label' => __('Hours', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('12:00 pm - 08:00 pm', 'denali'),
            ]
        );
        $repeater->add_control(
            'location_time',
            [
                'label' => __('Time List', 'denali'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $nested_repeater->get_controls(),
                'default' => [
                    [
                        'sub_location_title' => __('Monday To Friday', 'denali'),
                        'sub_location_hours' => __('12:00 pm - 08:00 pm', 'denali'),
                    ],
                    [
                        'sub_location_title' => __('Saturday - Sunday', 'denali'),
                        'sub_location_hours' => __('06:00 pm - 05:00 pm', 'denali'),
                    ],
                ],
                'title_field' => '{{{ sub_location_title }}}',
            ]
        );
        $repeater->add_control(
            'location_email',
            [
                'label' => __('Email', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>  '',
            ]
        );
        $repeater->add_control(
            'location_phone',
            [
                'label' => __('Phone', 'denali'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => __('Location list', 'denali'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'location_title' => __('Sydney Double Bay', 'denali'),
                        'location_address' => __('66 Broklyn New Golden Street USA', 'denali'),
                        'location_button' => __('Enquire', 'denali'),
                        'location_button_link' => '#',
                        'location_opening_hours' => __('Opening Hours', 'denali'),
                        'location_time' => [
                            [
                                'sub_location_title' => __('Monday To Friday', 'denali'),
                                'sub_location_hours' => __('12:00 pm - 08:00 pm', 'denali'),
                            ],
                            [
                                'sub_location_title' => __('Saturday - Sunday', 'denali'),
                                'sub_location_hours' => __('06:00 pm - 05:00 pm', 'denali'),
                            ],
                        ],
                        'location_email' => __('help@company.com', 'denali'),
                        'location_phone' => __('+1(800)123-4566', 'denali'),
                        'location_maps_zoom' => '12',
                    ],
                    [
                        'location_title' => __('Newport Beach', 'denali'),
                        'location_address' => __('854 Avocado Ave. Street USA', 'denali'),
                        'location_button' => __('Enquire', 'denali'),
                        'location_button_link' => '#',
                        'location_opening_hours' => __('Opening Hours', 'denali'),
                        'location_time' => [
                            [
                                'sub_location_title' => __('Monday To Friday', 'denali'),
                                'sub_location_hours' => __('12:00 pm - 08:00 pm', 'denali'),
                            ],
                            [
                                'sub_location_title' => __('Saturday - Sunday', 'denali'),
                                'sub_location_hours' => __('06:00 pm - 05:00 pm', 'denali'),
                            ],
                        ],
                        'location_email' => __('help@company.com', 'denali'),
                        'location_phone' => __('+1(800)123-4566', 'denali'),
                        'location_maps_zoom' => '12',
                    ],
                    [
                        'location_title' => __('Waikoloa, USA', 'denali'),
                        'location_address' => __('Waikoloa Beach Resort, Unit D-8 250 Waikoloa Beach', 'denali'),
                        'location_button' => __('Enquire', 'denali'),
                        'location_button_link' => '#',
                        'location_opening_hours' => __('Opening Hours', 'denali'),
                        'location_time' => [
                            [
                                'sub_location_title' => __('Monday To Friday', 'denali'),
                                'sub_location_hours' => __('12:00 pm - 08:00 pm', 'denali'),
                            ],
                            [
                                'sub_location_title' => __('Saturday - Sunday', 'denali'),
                                'sub_location_hours' => __('06:00 pm - 05:00 pm', 'denali'),
                            ],
                        ],
                        'location_email' => __('help@company.com', 'denali'),
                        'location_phone' => __('+1(800)123-4566', 'denali'),
                        'location_maps_zoom' => '12',
                    ],
                ],
                'title_field' => '{{{ location_title }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function register_style_section_controls()
    {
        $this->start_controls_section(
            'section_style_item',
            [
                'label' => esc_html__('General', 'denali'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'location_list_border',
            [
                'label' => __('Border Width', 'denali'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--item' => 'border-bottom: {{SIZE}}{{UNIT}} solid #e9e9e9;',
                ],
            ]
        );
        $this->add_control(
            'location_list_color',
            [
                'label' => __('Border Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--item' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'location_list_maps_height',
            [
                'label' => __('Maps height', 'denali'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 213,
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--maps iframe' => 'height: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_heading',
            [
                'label' => esc_html__('Heading', 'denali'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'location_title_style',
            [
                'label' => esc_html__('Title', 'denali'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'location_title_color',
            [
                'label' => __('Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-infor .bt-location-title-wrap h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'location_title_hover_color',
            [
                'label' => __('Color Hover', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-infor:hover .bt-location-title-wrap h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_title_typography',
                'label' => __('Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-infor .bt-location-title-wrap h2 ',
            ]
        );
        $this->add_control(
            'location_address_color',
            [
                'label' => __('Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-infor .bt-location-title-wrap span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_address_typography',
                'label' => __('Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-infor .bt-location-title-wrap span',
            ]
        );
        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'style_normal',
            [
                'label' => __('Normal', 'denali'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-button a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-button a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_border_color',
            [
                'label' => __('border Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-button a' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover',
            [
                'label' => __('Hover', 'denali'),
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-button a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color_hover',
            [
                'label' => __('Background Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-button a:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('border Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--heading-button a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content', 'denali'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'location_opening_hours_style',
            [
                'label' => esc_html__('Opening Hours', 'denali'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'location_opening_hours_color',
            [
                'label' => __('Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--oppening-hours .bt-location-time h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_opening_hours_typography',
                'label' => __('Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--oppening-hours .bt-location-time h3',
            ]
        );
        $this->add_control(
            'location_list_time_style',
            [
                'label' => esc_html__('List Time', 'denali'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'location_title_list_time_color',
            [
                'label' => __('Title Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--oppening-hours .bt-location-time--title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_title_list_time_typography',
                'label' => __('Title Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--oppening-hours .bt-location-time--title',
            ]
        );
        $this->add_control(
            'location_hours_list_time_color',
            [
                'label' => __('Hours Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--oppening-hours .bt-location-time--hours' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_hours_list_time_typography',
                'label' => __('Hours Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--oppening-hours .bt-location-time--hours',
            ]
        );
        $this->add_control(
            'location_meta_style',
            [
                'label' => esc_html__('Meta', 'denali'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'location_title_meta_color',
            [
                'label' => __('Title Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--meta-item .bt-location-info h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_title_meta_typography',
                'label' => __('Title Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--meta-item .bt-location-info h4',
            ]
        );
        $this->add_control(
            'location_content_meta_color',
            [
                'label' => __('Content Color', 'denali'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--meta-item .bt-location-info span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_content_meta_typography',
                'label' => __('Content Typography', 'denali'),
                'default' => '',
                'selector' => '{{WRAPPER}} .bt-elwg-location-list--default .bt-location-list--meta-item .bt-location-info span',
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

        if (empty($settings['list'])) {
            return;
        }

?>
        <div class="bt-elwg-location-list--default">
            <div class="bt-location-list">
                <?php foreach ($settings['list'] as $index => $item) : ?>
                    <div class="bt-location-list--item">
                        <div class="bt-location-list--heading">
                            <div class="bt-location-list--heading-infor">
                                <div class="bt-location-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                        <path d="M2.34375 12.3438V12.0117C2.34375 6.68083 6.6808 2.34378 12.0117 2.34378C17.0204 2.34378 21.1514 6.17247 21.6325 11.0568L23.9817 13.1998C24.0087 12.9107 24.0234 12.6251 24.0234 12.3438V12.0117C24.0234 5.38849 18.635 2.86102e-05 12.0117 2.86102e-05C5.38846 2.86102e-05 0 5.38849 0 12.0117V12.3438C0 15.6935 1.92047 19.5969 5.70809 23.9455C8.45391 27.098 11.1613 29.2961 11.2753 29.3882L12.0117 29.9832V26.9373C9.63686 24.8564 2.34375 18.0042 2.34375 12.3438Z" fill="white" />
                                        <path d="M22.7344 25.2539H19.2188V21.7383H22.7344V25.2539Z" fill="white" />
                                        <path d="M8.20312 12.0117C8.20312 9.90832 9.90832 8.20313 12.0117 8.20313C14.1151 8.20313 15.8203 9.90832 15.8203 12.0117C15.8203 14.1151 14.1151 15.8203 12.0117 15.8203C9.90832 15.8203 8.20312 14.1151 8.20312 12.0117Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M26.6622 20.449V26.8226C26.6622 27.9302 25.7643 28.8281 24.6566 28.8281H17.236C16.1284 28.8281 15.2305 27.9302 15.2305 26.8226V20.449" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                        <path d="M28.418 22.0059L20.9473 15.1905L13.4766 22.0059" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                    </svg>
                                </div>
                                <div class="bt-location-title-wrap">
                                    <?php if (!empty($item['location_title'])) : ?>
                                        <h2> <?php echo esc_html($item['location_title']); ?> </h2>
                                    <?php endif; ?>
                                    <?php if (!empty($item['location_address'])) : ?>
                                        <span> <?php echo esc_html($item['location_address']) ?> </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bt-location-list--heading-button">
                                <?php if (!empty($item['location_button'])) : ?>
                                    <a href="<?php echo esc_url($item['location_button_link']) ?>"> <?php echo esc_html($item['location_button']) ?> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="bt-location-list--content <?php if ($index == 0) { ?> oppen <?php } ?>">
                            <div class="bt-location-list--inner">
                                <div class="bt-location-list--oppening-hours">
                                    <div class="bt-location-icon-oppening">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" fill="none">
                                            <path d="M38.6048 15.0958C38.5929 15.0833 38.5757 15.0791 38.5632 15.0682C35.3496 11.8723 30.926 9.89266 26.0484 9.8859C26.0396 9.8859 26.0312 9.8833 26.0224 9.8833C26.013 9.8833 26.0042 9.8859 25.9948 9.8859C21.1245 9.89422 16.7076 11.8692 13.4961 15.0578C13.4784 15.0729 13.4561 15.0791 13.4394 15.0958C13.4223 15.1129 13.4166 15.1353 13.4015 15.153C10.2212 18.3583 8.24984 22.7627 8.23424 27.62C8.23268 27.6392 8.22852 27.6579 8.22852 27.6772C8.22852 27.6964 8.23268 27.7151 8.23424 27.7344C8.24984 32.5901 10.2201 36.9935 13.3989 40.1983C13.415 40.2175 13.4218 40.2414 13.44 40.2596C13.4582 40.2778 13.4821 40.2841 13.5013 40.3002C16.7113 43.4852 21.1256 45.4586 25.9922 45.4679C26.0032 45.4679 26.013 45.4711 26.0234 45.4711C26.0338 45.4711 26.0432 45.4685 26.0531 45.4679C30.9276 45.4607 35.3481 43.4826 38.5606 40.2898C38.5747 40.2778 38.5929 40.2726 38.6064 40.2591C38.6199 40.2456 38.6246 40.2274 38.6366 40.2139C41.8366 36.9951 43.8178 32.5631 43.8178 27.6767C43.8178 22.7887 41.8356 18.3551 38.634 15.1363C38.6215 15.1244 38.6173 15.1077 38.6048 15.0958ZM40.441 28.4577H42.2365C42.0514 32.3468 40.4924 35.8823 38.0339 38.5868L36.7692 37.3221C36.4645 37.0179 35.9705 37.0179 35.6658 37.3221C35.3616 37.6269 35.3616 38.1209 35.6658 38.4256L36.9304 39.6897C34.2259 42.1477 30.6904 43.7057 26.8019 43.8897V42.0968C26.8019 41.6657 26.453 41.3168 26.0219 41.3168C25.5908 41.3168 25.2419 41.6657 25.2419 42.0968V43.8897C21.3533 43.7041 17.8194 42.1457 15.1154 39.6871L16.3774 38.4256C16.6822 38.1209 16.6822 37.6269 16.3774 37.3221C16.0727 37.0174 15.5787 37.0179 15.274 37.3221L14.0125 38.5842C11.555 35.8802 9.99652 32.3457 9.81192 28.4577H11.6028C12.0339 28.4577 12.3828 28.1088 12.3828 27.6777C12.3828 27.2466 12.0339 26.8977 11.6028 26.8977H9.81192C9.99652 23.0097 11.555 19.4757 14.012 16.7717L15.2745 18.0343C15.4269 18.1861 15.6266 18.2626 15.8262 18.2626C16.0259 18.2626 16.2256 18.1867 16.378 18.0343C16.6822 17.7296 16.6822 17.2356 16.378 16.9309L15.1154 15.6683C17.8194 13.2097 21.3538 11.6508 25.2424 11.4651V13.2591C25.2424 13.6902 25.5913 14.0391 26.0224 14.0391C26.4535 14.0391 26.8024 13.6902 26.8024 13.2591V11.4651C30.6915 11.6492 34.227 13.2077 36.9315 15.6657L35.6663 16.9303C35.3616 17.2351 35.3616 17.7291 35.6663 18.0338C35.8187 18.1861 36.0184 18.2621 36.218 18.2621C36.4177 18.2621 36.6174 18.1861 36.7698 18.0338L38.0349 16.7686C40.4935 19.4731 42.0519 23.0081 42.237 26.8972H40.4415C40.0104 26.8972 39.6615 27.2461 39.6615 27.6772C39.6615 28.1083 40.0099 28.4577 40.441 28.4577Z" fill="#C2A74E" />
                                            <path d="M34.6729 26.8977H28.7855C28.5146 25.9404 27.7595 25.1859 26.8022 24.9155V16.1425C26.8022 15.7115 26.4533 15.3625 26.0222 15.3625C25.5911 15.3625 25.2422 15.7115 25.2422 16.1425V24.9165C24.0384 25.2582 23.1523 26.3652 23.1523 27.6777C23.1523 29.2611 24.4404 30.5492 26.0238 30.5492C27.3368 30.5492 28.4444 29.6626 28.7855 28.4577H34.6729C35.104 28.4577 35.4529 28.1088 35.4529 27.6777C35.4529 27.2466 35.104 26.8977 34.6729 26.8977ZM27.3331 27.7063C27.3175 28.4161 26.7377 28.9892 26.0238 28.9892C25.3005 28.9892 24.7123 28.401 24.7123 27.6777C24.7123 26.9617 25.2895 26.3793 26.0025 26.3678C26.0092 26.3678 26.0149 26.3699 26.0217 26.3699C26.029 26.3699 26.0357 26.3678 26.043 26.3678C26.7476 26.3782 27.3175 26.9455 27.3326 27.6486C27.3326 27.6585 27.33 27.6678 27.33 27.6777C27.33 27.6876 27.3326 27.6964 27.3331 27.7063Z" fill="#C2A74E" />
                                            <path d="M15.2317 44.1204L11.8819 47.5072C11.5787 47.8135 11.5813 48.3075 11.8881 48.6101C12.04 48.7604 12.2381 48.8358 12.4367 48.8358C12.638 48.8358 12.8387 48.7588 12.991 48.6044L16.3409 45.2176C16.644 44.9113 16.6414 44.4173 16.3346 44.1147C16.0278 43.811 15.5344 43.8131 15.2317 44.1204Z" fill="#C2A74E" />
                                            <path d="M36.7592 44.1045C36.4545 43.7998 35.961 43.7998 35.6563 44.1045C35.3516 44.4087 35.3516 44.9027 35.6563 45.2074L39.0555 48.6067C39.2079 48.759 39.4076 48.835 39.6072 48.835C39.8069 48.835 40.0066 48.759 40.159 48.6067C40.4637 48.3025 40.4637 47.8085 40.159 47.5038L36.7592 44.1045Z" fill="#C2A74E" />
                                            <path d="M38.2427 3.16479C34.858 3.16479 31.8389 5.18656 30.5508 8.3154C30.4609 8.5338 30.4749 8.78183 30.5893 8.98879C30.7032 9.19576 30.9055 9.3398 31.1384 9.38035C34.4321 9.95443 37.4304 11.515 39.8084 13.8929C40.8853 14.9704 41.8031 16.1908 42.5363 17.5204C42.6502 17.7274 42.852 17.8714 43.0849 17.912C43.1296 17.9198 43.1744 17.9234 43.2191 17.9234C43.4068 17.9234 43.5904 17.8553 43.7339 17.7295C45.5294 16.1513 46.5596 13.8737 46.5596 11.4812C46.5596 6.8958 42.8286 3.16479 38.2427 3.16479ZM43.3766 15.8767C42.6736 14.7613 41.8478 13.7265 40.9113 12.79C38.5505 10.4292 35.6318 8.80368 32.4192 8.0502C33.6209 6.00296 35.8164 4.72428 38.2427 4.72428C41.9685 4.72428 44.9996 7.75536 44.9996 11.4812C44.9996 13.1041 44.4172 14.6604 43.3766 15.8767Z" fill="#C2A74E" />
                                            <path d="M8.78189 17.9239C8.82661 17.9239 8.87133 17.9203 8.91605 17.9125C9.14901 17.8719 9.35077 17.7279 9.46465 17.5209C10.1973 16.1913 11.1151 14.9714 12.1926 13.8934C14.571 11.5154 17.5688 9.95492 20.8625 9.38084C21.0955 9.34028 21.2978 9.19624 21.4116 8.98928C21.526 8.78232 21.5401 8.53428 21.4501 8.31588C20.1621 5.18704 17.143 3.16528 13.7583 3.16528C9.17241 3.16528 5.44141 6.89628 5.44141 11.4822C5.44141 13.8747 6.47101 16.1518 8.26709 17.7305C8.41061 17.8558 8.59417 17.9239 8.78189 17.9239ZM7.00141 11.4816C7.00141 7.75584 10.0325 4.72476 13.7583 4.72476C16.1846 4.72476 18.38 6.00344 19.5818 8.05068C16.3692 8.80416 13.4499 10.4297 11.0896 12.7905C10.1531 13.727 9.32685 14.7618 8.62433 15.8772C7.58381 14.6604 7.00141 13.104 7.00141 11.4816Z" fill="#C2A74E" />
                                        </svg>
                                    </div>
                                    <div class="bt-location-time">
                                        <?php if (!empty($item['location_opening_hours'])) : ?>
                                            <h3> <?php echo esc_html($item['location_opening_hours']) ?> </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($item['location_time'])) : ?>
                                            <div class="bt-location-time--infor">
                                                <?php foreach ($item['location_time'] as $time) : ?>
                                                    <div class="bt-location-time--item">
                                                        <?php if (!empty($time['sub_location_title'])) : ?>
                                                            <div class="bt-location-time--title">
                                                                <?php echo esc_html($time['sub_location_title']); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($time['sub_location_hours'])) : ?>
                                                            <div class="bt-location-time--hours">
                                                                <?php echo esc_html($time['sub_location_hours']); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="bt-location-list--maps">
                                    <?php if (!empty($item['location_address'])) : ?>
                                        <iframe loading="lazy" src="https://maps.google.com/maps?q=<?php echo urlencode($item['location_address']) ?>&#038;t=m&#038;z=<?php echo esc_attr($item['location_maps_zoom']['size']) ?>&#038;output=embed&#038;iwloc=near" title="<?php echo htmlspecialchars($item['location_address']) ?>" aria-label="<?php echo htmlspecialchars($item['location_address']) ?>"></iframe>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bt-location-list--meta">
                                <?php if (!empty($item['location_email'])) : ?>
                                    <div class="bt-location-list--meta-item">
                                        <a href="<?php echo esc_url('mailto:' . $item['location_email']); ?>">
                                            <div class="bt-location-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 14.0625C18.8784 14.0625 15.9375 17.0034 15.9375 20.625C15.9375 24.2466 18.8784 27.1875 22.5 27.1875C26.1216 27.1875 29.0625 24.2466 29.0625 20.625C29.0625 17.0034 26.1216 14.0625 22.5 14.0625ZM22.5 15.9375C25.0875 15.9375 27.1875 18.0375 27.1875 20.625C27.1875 23.2125 25.0875 25.3125 22.5 25.3125C19.9125 25.3125 17.8125 23.2125 17.8125 20.625C17.8125 18.0375 19.9125 15.9375 22.5 15.9375ZM2.8125 5.87063L14.4281 14.8059C14.7656 15.0647 15.2344 15.0647 15.5719 14.8059L27.1875 5.87063V13.125C27.1875 13.6425 27.6075 14.0625 28.125 14.0625C28.6425 14.0625 29.0625 13.6425 29.0625 13.125V5.625C29.0625 4.0725 27.8025 2.8125 26.25 2.8125H3.75C2.1975 2.8125 0.9375 4.0725 0.9375 5.625V20.625C0.9375 22.1775 2.1975 23.4375 3.75 23.4375H14.0625C14.58 23.4375 15 23.0175 15 22.5C15 21.9825 14.58 21.5625 14.0625 21.5625H3.75C3.2325 21.5625 2.8125 21.1425 2.8125 20.625V5.87063ZM19.4934 21.2878L21.3684 23.1628C21.7341 23.5294 22.3284 23.5294 22.6941 23.1628L25.5066 20.3503C25.8722 19.9847 25.8722 19.3903 25.5066 19.0247C25.1409 18.6591 24.5466 18.6591 24.1809 19.0247L22.0312 21.1744L20.8191 19.9622C20.4534 19.5966 19.8591 19.5966 19.4934 19.9622C19.1278 20.3278 19.1278 20.9222 19.4934 21.2878ZM25.65 4.6875H4.35L15 12.8794L25.65 4.6875Z" fill="white" />
                                                </svg>
                                            </div>
                                            <div class="bt-location-info">
                                                <h4><?php echo esc_html__('Email:', 'denali'); ?></h4>
                                                <span> <?php echo esc_html($item['location_email']) ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item['location_phone'])) : ?>
                                    <div class="bt-location-list--meta-item">
                                        <a href="<?php echo esc_url('tel:' . preg_replace('/[^0-9]+/', '', $item['location_phone'])); ?>">
                                            <div class="bt-location-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                    <g clip-path="url(#clip0_19_296)">
                                                        <path d="M27.1795 23.3041C27.1776 22.913 27.0985 22.5261 26.9466 22.1657C26.7947 21.8053 26.5731 21.4785 26.2945 21.2041L23.7445 18.6751C23.1867 18.1197 22.4316 17.808 21.6445 17.8081C21.2524 17.8123 20.8651 17.894 20.5047 18.0485C20.1443 18.203 19.818 18.4271 19.5445 18.7081L18.2335 20.0341C17.7895 20.2771 15.3985 19.1611 13.1575 16.9411C10.9165 14.7211 9.74947 12.3001 9.98047 11.8741L11.3005 10.5421C11.8605 9.97709 12.1732 9.21282 12.1698 8.41733C12.1665 7.62183 11.8473 6.86025 11.2825 6.30005L8.73547 3.77405C8.16934 3.21801 7.408 2.90572 6.61447 2.90405C6.22236 2.90801 5.8349 2.98957 5.47447 3.14404C5.11404 3.29851 4.78776 3.52283 4.51447 3.80405L1.69447 6.63305C0.527474 7.80005 0.659474 10.0591 2.06947 12.9631C3.38647 15.6631 5.66947 18.7291 8.52547 21.5521C12.6715 25.6621 17.9005 29.1001 21.2395 29.1001C21.6538 29.1212 22.068 29.0582 22.4573 28.9148C22.8466 28.7715 23.2028 28.5508 23.5045 28.2661L26.3125 25.4341C26.59 25.1535 26.8094 24.8209 26.9582 24.4554C27.1069 24.0899 27.1821 23.6987 27.1795 23.3041ZM25.4605 24.5791L22.6525 27.4111C21.1255 28.9501 15.2995 26.5741 9.37147 20.7001C6.61747 17.9701 4.40647 15.0361 3.14947 12.4381C2.01247 10.0981 1.78747 8.23805 2.54947 7.47605L5.35747 4.64405C5.69275 4.30676 6.1479 4.11585 6.62347 4.11305C6.85799 4.11268 7.09027 4.15859 7.307 4.24817C7.52374 4.33774 7.72066 4.46922 7.88647 4.63505L10.4365 7.16105C10.7708 7.49818 10.9584 7.95375 10.9584 8.42855C10.9584 8.90335 10.7708 9.35893 10.4365 9.69605L9.11647 11.0311C8.53747 11.6131 8.66047 12.6661 9.48547 14.1601C10.2449 15.4814 11.1816 16.6927 12.2695 17.7601C13.3477 18.8408 14.5691 19.7684 15.8995 20.5171C17.3995 21.3271 18.4555 21.4441 19.0345 20.8621L20.3545 19.5271C20.6898 19.1898 21.1449 18.9989 21.6205 18.9961C22.0923 18.9972 22.5447 19.1836 22.8805 19.5151L25.4305 22.0441C25.7648 22.3812 25.9524 22.8368 25.9524 23.3116C25.9524 23.7864 25.7648 24.2419 25.4305 24.5791H25.4605Z" fill="white" />
                                                        <path d="M28.5002 14.9159C28.6593 14.9159 28.8119 14.8527 28.9245 14.7402C29.037 14.6277 29.1002 14.4751 29.1002 14.3159C29.0962 10.7675 27.6851 7.36546 25.1762 4.85604C22.6673 2.34663 19.2656 0.934696 15.7172 0.929932C15.5581 0.929932 15.4054 0.993146 15.2929 1.10567C15.1804 1.21819 15.1172 1.3708 15.1172 1.52993C15.1172 1.68906 15.1804 1.84167 15.2929 1.9542C15.4054 2.06672 15.5581 2.12993 15.7172 2.12993C18.9476 2.1339 22.0446 3.41915 24.3285 5.7037C26.6125 7.98824 27.897 11.0855 27.9002 14.3159C27.9002 14.4751 27.9634 14.6277 28.0759 14.7402C28.1884 14.8527 28.3411 14.9159 28.5002 14.9159Z" fill="white" />
                                                        <path d="M23.5982 14.3159C23.5982 14.4751 23.6614 14.6277 23.7739 14.7402C23.8864 14.8527 24.0391 14.9159 24.1982 14.9159C24.3573 14.9159 24.5099 14.8527 24.6225 14.7402C24.735 14.6277 24.7982 14.4751 24.7982 14.3159C24.7958 11.908 23.8384 9.59924 22.136 7.89627C20.4336 6.19329 18.1252 5.23511 15.7172 5.23193C15.5581 5.23193 15.4054 5.29515 15.2929 5.40767C15.1804 5.52019 15.1172 5.6728 15.1172 5.83193C15.1172 5.99106 15.1804 6.14368 15.2929 6.2562C15.4054 6.36872 15.5581 6.43193 15.7172 6.43193C17.8069 6.43511 19.8101 7.26686 21.2874 8.74479C22.7648 10.2227 23.5958 12.2262 23.5982 14.3159Z" fill="white" />
                                                        <path d="M15.1172 10.1339C15.1172 10.2931 15.1804 10.4457 15.2929 10.5582C15.4054 10.6707 15.5581 10.7339 15.7172 10.7339C16.6652 10.7395 17.5728 11.1187 18.2429 11.7894C18.913 12.46 19.2915 13.3679 19.2962 14.3159C19.2962 14.4751 19.3594 14.6277 19.4719 14.7402C19.5844 14.8527 19.7371 14.9159 19.8962 14.9159C20.0553 14.9159 20.2079 14.8527 20.3205 14.7402C20.433 14.6277 20.4962 14.4751 20.4962 14.3159C20.4915 13.0496 19.9865 11.8365 19.0914 10.9408C18.1963 10.0452 16.9835 9.53947 15.7172 9.53394C15.5581 9.53394 15.4054 9.59715 15.2929 9.70967C15.1804 9.82219 15.1172 9.97481 15.1172 10.1339Z" fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_19_296">
                                                            <rect width="30" height="30" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="bt-location-info">
                                                <h4><?php echo esc_html__('Phone:', 'denali'); ?></h4>
                                                <span> <?php echo esc_html($item['location_phone']) ?></span>
                                            </div>

                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($index == 0) { ?>
                            <div class="bt-more-info active">
                                <span><?php echo esc_html__('Less Information', 'denali') ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8.00053 10.6666C8.08826 10.6671 8.17524 10.6503 8.25646 10.6171C8.33769 10.584 8.41157 10.5351 8.47386 10.4733L12.4739 6.47329C12.5994 6.34776 12.6699 6.1775 12.6699 5.99996C12.6699 5.82243 12.5994 5.65216 12.4739 5.52663C12.3483 5.40109 12.1781 5.33057 12.0005 5.33057C11.823 5.33057 11.6527 5.40109 11.5272 5.52663L8.00053 9.05996L4.47386 5.53329C4.34633 5.42408 4.18228 5.36701 4.01449 5.37349C3.84671 5.37997 3.68755 5.44952 3.56882 5.56825C3.45009 5.68698 3.38053 5.84614 3.37405 6.01393C3.36757 6.18171 3.42464 6.34576 3.53386 6.47329L7.53386 10.4733C7.65803 10.5965 7.82563 10.6659 8.00053 10.6666Z" fill="#C2A74E" />
                                </svg>
                            </div>
                        <?php } else { ?>
                            <div class="bt-more-info">
                                <span><?php echo esc_html__('More Information', 'denali') ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8.00053 10.6666C8.08826 10.6671 8.17524 10.6503 8.25646 10.6171C8.33769 10.584 8.41157 10.5351 8.47386 10.4733L12.4739 6.47329C12.5994 6.34776 12.6699 6.1775 12.6699 5.99996C12.6699 5.82243 12.5994 5.65216 12.4739 5.52663C12.3483 5.40109 12.1781 5.33057 12.0005 5.33057C11.823 5.33057 11.6527 5.40109 11.5272 5.52663L8.00053 9.05996L4.47386 5.53329C4.34633 5.42408 4.18228 5.36701 4.01449 5.37349C3.84671 5.37997 3.68755 5.44952 3.56882 5.56825C3.45009 5.68698 3.38053 5.84614 3.37405 6.01393C3.36757 6.18171 3.42464 6.34576 3.53386 6.47329L7.53386 10.4733C7.65803 10.5965 7.82563 10.6659 8.00053 10.6666Z" fill="#C2A74E" />
                                </svg>
                            </div>
                        <?php } ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
<?php }

    protected function content_template() {}
}
