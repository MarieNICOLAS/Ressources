<?php
//Instanciation de la classe WPABC\Main lors de l'initialisation de WP
function wpabc_init_plugin()
{
    $main_instance = new WPABC\main();
}
add_action('init', 'wpabc_init_plugin');
?>