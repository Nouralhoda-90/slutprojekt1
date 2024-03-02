<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php echo get_option("blogname"); ?>
    </title>
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header>
    <div class="upper-header">
        <div class="column-50">
            <a href="/"><span class="logo-text">MOODY STORE</span></a>
        </div>
        <div class="column-50">
           
                    <?php
                     $cart_items_count = WC()->cart->get_cart_contents_count();
                    $menu_header = array(
                        'theme_location' => 'menyikoner',
                        'menu_id' => 'header-menu',
                        'container' => 'nav',
                        'items_wrap' => 
                        '<ul>
                        <li><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/Vector.png" alt="Search"></a></li>
                        <li><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/account.png" alt="My Account"></a></li>
                        <li><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/cart11.png" alt="Cart" style="width: 25px;"></a></li>
                        <div class="basket-item-count">
                        <span class="cart-items-count count">
                    
                        <span class="cart-items-count count">' . $cart_items_count . '</span>
                            
                        </span>
                    </div>
                        <li><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/favor.png" alt="Favorite"></a></li>
                        </ul>',
                    
        );
        
                    wp_nav_menu($menu_header);
                    ?>
                           
            </div>
        
    </div>
    <div class="lower-header">
        <?php
        $menu_header = array(
            'theme_location' => 'huvudmeny',
            'menu_id' => 'header-menu',
            'container' => 'nav',
            'container_class' => 'menu'
        );
        wp_nav_menu($menu_header);
        ?>
    </div>
</header>

</body>