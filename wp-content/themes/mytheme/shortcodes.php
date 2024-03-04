<?php

require_once("parts/advantages.php");


add_shortcode('display_advantages', 'display_advantages_shortcode');



       return '<div class="bedsheet box">
       <h2>BEDSHEET SETS</h2>
       <h3>500 kr</h3>
       <h4>2200 kr</h4>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
       </div>';

}
add_shortcode("box", "moody_studio_shortcode_draw_box");

