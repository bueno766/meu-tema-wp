<?php 

function meutema_customize_register($wp_customize) {

    //Título Banner
    $wp_customize -> add_section('front-page', array(
        'title' => __('Título Banner', 'Meu Tema'),
        'description' => sprintf(__('Opções para o banner','Meu Tema')),
        'priority' => 20
    ));

    $wp_customize -> add_setting('banner_title', array(
        'default' => _x('Meu primeiro tema de WordPress', 'Meu Tema'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('banner_title',array(
        'label' => __('Título do banner', 'Meu Tema'),
        'section' => 'front-page',
        'priority' => 1
    ));

    $wp_customize -> add_setting('banner_text', array(
        'default' => _x('Feito por mim com muita dedicação e esforço', 'Meu Tema'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('banner_text',array(
        'label' => __('Texto do banner', 'Meu Tema'),
        'section' => 'front-page',
        'priority' => 2
    ));
}

add_action('customize_register','meutema_customize_register');

