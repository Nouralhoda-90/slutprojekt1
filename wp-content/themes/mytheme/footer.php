<footer>
    <section class="container">
        <div class="column-address">
            <span class="footer-address-title">URBAN OUTFITTERS</span>
            <span class="footer-address-info"><?= get_option('store_footer_info'); ?></span>
            <div class="footer-address">
                <span><?= get_option('store_address'); ?></span>
                <span><?= get_option('store_tel'); ?></span>
                <span><?= get_option('store_email'); ?></span>
            </div>
            <?php
            $menu = array(
                'theme_location' => 'footer_social_media',
                'menu_id' => 'footer_social_media',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu);
            ?>
        </div>
        <div class="column-shopping">
            <span class="category">SHOPPING</span>
            <?php
            $menu = array(
                'theme_location' => 'footer_shopping',
                'menu_id' => 'footer_shopping',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu);
            ?>
        </div>
        <div class="column-links">
            <span class="category">MORE LINK</span>
            <?php
            $menu = array(
                'theme_location' => 'footer_links',
                'menu_id' => 'footer_links',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu);
            ?>
        </div>
       
        <section class="footer-right">
    <h3 class="footer-content">FROM THE CONTENT</h3>

    <article class="content1">
        <p class="content1-1">26 <span class="span-content1-1">May</span></p>
        <p class="content1-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="content1-3">3 comments</p>
    </article>
    <div class="line"></div>
    <article class="content2">
        <p class="content2-1">27 <span class="span-content2-1">May</span></p>
        <p class="content2-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="content1-3">3 comments</p>
    </article>
</section>


    <div class="new-copyright">
        <div class="new-copyright1"><?=  " Urban Outfitters" ?>&copy;All rights reserved</div>
    </div>
</footer>
<?php wp_footer(); ?>
