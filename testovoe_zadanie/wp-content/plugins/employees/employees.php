<?php
/*
 * Plugin Name: Employees Plugin
 * Description: Плагин при подключении создает кастомный тип постов "Employees".
 * Version: 1
 */
//register_activation_hook( __FILE__, 'employees_activate' );


 //employees_activate Plugin
add_action( 'init', 'employees_activate' );
function employees_activate() {

    $args = array(
        'label' => __( 'Employees', 'root' ),               
        'supports' => array('title', 'custom-fields' ),      //custom fields view
        'public' => true,   
		'rewrite' => array('slug' => 'employees'),
		
    );

    register_post_type( 'employees', $args ); 
}
