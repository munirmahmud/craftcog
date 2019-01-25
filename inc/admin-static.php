<?php

if (!defined('ABSPATH'))
    die('Direct access forbidden.');
/**
 * Include static files: javascript and css for backend
 */
wp_enqueue_style('tp-admin', CRAFTCOG_CSS . '/tp_admin.css', null, CRAFTCOG_VERSION);
wp_enqueue_style( 'themify-icons', CRAFTCOG_CSS . '/icon-font.css', null, CRAFTCOG_VERSION );

wp_enqueue_script('tp-admin-js', CRAFTCOG_SCRIPTS . '/tp-admin.js', null, CRAFTCOG_VERSION);
