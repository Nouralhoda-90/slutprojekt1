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
            $menu_header = array(
                'theme_location' => 'menyikoner',
                'menu_id' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu_header);
            ?>
            <div class="basket-item-count">
                <span class="cart-items-count count">
                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                </span>
            </div>
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