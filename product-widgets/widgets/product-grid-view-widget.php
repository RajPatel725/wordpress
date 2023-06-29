<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Product_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'product-widget';
    }

    public function get_title()
    {
        return __('Product Widget', 'product-widget');
    }

    public function get_icon()
    {
        return 'eicon-product-images';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'product_section',
            [
                'label' => __('Product Information', 'product-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => esc_html__('Select Post Type', 'product-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'post' => esc_html__('Post', 'product-widget'),
                    'product'  => esc_html__('Product', 'product-widget'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .select_product' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Number Of Post', 'product-widget' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
				'default' => 5,
			]
		);

        $this->add_control(
            'product_grid_page',
            [
                'label' => esc_html__('Product Per Row', 'product-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '4'  => esc_html__('3', 'product-widget'),
                    '3' => esc_html__('4', 'product-widget'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .select_grid' => 'select-grid: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // style controls
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'product-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Prodect Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

            $this->add_control(
                'title_text_color',
                [
                    'label' => esc_html__('Color', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .card_title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'default' => [],
                    'selector' => '{{WRAPPER}} .card_title',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'title_background',
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .card_title',
                ]
            );

            $this->add_control(
                'padding',
                [
                    'label' => esc_html__('Padding', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'selectors' => [
                        '{{WRAPPER}} .card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'title_box_width',
                [
                    'label' => esc_html__('Box Width', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '75',
                    'options' => [
                        '25' => esc_html__('25%', 'product-widget'),
                        '50'  => esc_html__('50%', 'product-widget'),
                        '75'  => esc_html__('75%', 'product-widget'),
                        '100'  => esc_html__('100%', 'product-widget'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .card_title' => 'border-style: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'text_align',
                [
                    'label' => esc_html__('Alignment', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__('Left', 'product-widget'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'product-widget'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__('Right', 'product-widget'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .card_title' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
        
           $this->add_control(
                'price_more_options',
                [
                    'label' => esc_html__( 'Prodect Price', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
    

            $this->add_control(
                'price_text_color',
                [
                    'label' => esc_html__('Color', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .card_price' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typography',
                    'default' => [],
                    'selector' => '{{WRAPPER}} .card_price',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'price_background',
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .card_title',
                ]
            );

            $this->add_control(
                'price_padding',
                [
                    'label' => esc_html__('Padding', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'selectors' => [
                        '{{WRAPPER}} .card_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'price_box_width',
                [
                    'label' => esc_html__('Box Width', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '75',
                    'options' => [
                        '25' => esc_html__('25%', 'product-widget'),
                        '50'  => esc_html__('50%', 'product-widget'),
                        '75'  => esc_html__('75%', 'product-widget'),
                        '100'  => esc_html__('100%', 'product-widget'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .card_price' => 'border-style: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_control(
                'price_align',
                [
                    'label' => esc_html__('Alignment', 'product-widget'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__('Left', 'product-widget'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'product-widget'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__('Right', 'product-widget'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .card_price' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_options',
                [
                    'label' => esc_html__( 'Prodect Button', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

                $this->add_control(
                    'read_btn_color',
                    [
                        'label' => esc_html__('Color', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#000',
                        'selectors' => [
                            '{{WRAPPER}} .read_more_btn' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'read_btn_typography',
                        'default' => [],
                        'selector' => '{{WRAPPER}} .read_more_btn',
                    ]
                );

                
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'read_btn_background',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .read_more_btn',
                    ]
                );

                $this->add_control(
                    'read_btn_padding',
                    [
                        'label' => esc_html__('Padding', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors' => [
                            '{{WRAPPER}} .read_more_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'read_btn_margin',
                    [
                        'label' => esc_html__('Margin', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors' => [
                            '{{WRAPPER}} .read_more_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'read_btn_align',
                    [
                        'label' => esc_html__('Alignment', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => esc_html__('Left', 'product-widget'),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__('Center', 'product-widget'),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__('Right', 'product-widget'),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'toggle' => true,
                        'selectors' => [
                            '{{WRAPPER}} .card_footer' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'read_more_btn',
                        'selector' => '{{WRAPPER}} .read_more_btn',
                    ]
                );

                $this->add_control(
                    'read_btn_border_radius',
                    [
                        'label' => esc_html__('Button Border Radius', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors' => [
                            '{{WRAPPER}} .read_more_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'box_btn_border',
                        'selector' => '{{WRAPPER}} .card_footer',
                    ]
                );

                $this->add_control(
                    'box_btn_border_radius',
                    [
                        'label' => esc_html__('Box Border Radius', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors' => [
                            '{{WRAPPER}} .card_footer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'section_box_options',
                    [
                        'label' => esc_html__( 'Section Box Border', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_control(
                    'box_img_border_radius',
                    [
                        'label' => esc_html__('Image Border Radius', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors' => [
                            '{{WRAPPER}} .card_img_top' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'box_margin',
                    [
                        'label' => esc_html__('Box Margin', 'product-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors' => [
                            '{{WRAPPER}} .card_main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );


        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $post_type = $settings['post_type'];
        $post_per_page = $settings['post_per_page'];
        $title_box_width = $settings['title_box_width'];
        $price_box_width = $settings['price_box_width'];
        $product_grid_page = $settings['product_grid_page'];

        $args = new WP_Query(array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => $post_per_page,
        ));
        
        // Display product information here using HTML and CSS
        if($args->have_posts()) { ?>

        <div class="container">
            <div class="row">
                <?php while($args->have_posts()){ $args->the_post(); ?>
                <div class="col-md-<?php echo $product_grid_page; ?> card_main">
                    <div class="card_headr">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card_img_top">
                    </div>
                    <div class="card_body d-flex">
                        <h5 class="card_title w-<?php echo $title_box_width; ?> m-0"><?php the_title(); ?></h5>
                        <p class="card_price w-<?php echo $price_box_width; ?> m-0">$50</p>
                    </div>
                    <div class="card_footer">
                        <a href="<?php echo get_the_permalink(); ?>" class="btn read_more_btn">Read More</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
<?php
        }
    }
}
