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


        <div class="header-container">

            <div class="header_section1">
                
                <h1>MOODY STUDIO</h1>

                <div class="header-icons">
                    <img src="<?= get_template_directory_uri() . "/build/assets/images/person.svg"; ?>"
                        class="header-icon" />
                    <img src="<?= get_template_directory_uri() . "/build/assets/images/search.svg"; ?>"
                        class="header-icon" />
                    <img src="<?= get_template_directory_uri() . "/build/assets/images/favorite.svg"; ?>"
                        class="header-icon" />
                    <img src="<?= get_template_directory_uri() . "/build/assets/images/basket.svg"; ?>"
                        class="header-icon" />
                </div>

            </div>


<!-- 

            <div class="header-menu">
                <?php
                $menu = array(
                    'theme_location' => 'huvudmeny',
                    'menu_id' => 'primary-menu',
                    'container' => 'nav',
                    'container_class' => 'menu'
                ); -->
                wp_nav_menu($menu);
                ?>
                <!-- Bag count -->
                <div class="bag-count">0</div>
            </div>
        </div>
    </header>
</body>