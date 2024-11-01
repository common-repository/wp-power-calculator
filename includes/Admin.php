<?php

namespace WP_POWERCAL;

/**
 * The admin class
 */
class Admin {

    /**
     * Initialize the class
     */
    function __construct() {
        $settings = new Admin\Settings();
        new Admin\Menu( $settings );
    }

}
