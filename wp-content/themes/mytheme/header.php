<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php echo get_option("blogname"); ?>
    </title>
    <?php wp_head(); ?>
</head>


<body  >

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
                        'theme_location' => 'main_menu',
                        'menu_id' => 'main_menu',
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
                        <li><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/Favorite.png" alt="Favorite"></a></li>
                        </ul>',
                    
        );
        
                    wp_nav_menu($menu_header);
                    ?>
                           
            </div>
    </div>

    <div class="lower-header">
        <?php
        $menu_header = array(
            'theme_location' => 'primary_menu',
            'menu_id' => 'primary_menu',
            'container' => 'nav',
            'container_class' => 'primary_menu'
        );
        wp_nav_menu($menu_header);
        ?>
    </div>
</header>

</body>