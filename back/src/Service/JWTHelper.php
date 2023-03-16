<?php

namespace App\Service;

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'JWTHelper' ) ) {

    /**
     * Class JWTHelper
     */
    class JWTHelper {

        /**
         * JWTHelper constructor.
         */
        public function __construct() {
            // Do something
        }

    }

    // Instantiate
    new JWTHelper();
}
