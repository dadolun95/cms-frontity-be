<?php

add_action('template_redirect', 'frontity_redirect');

function frontity_redirect() {
    if (!defined( 'REST_REQUEST' ) && !defined( 'WP_ADMIN' )) {
        wp_redirect('https://www.dadolun.com');
        exit;
    }
}
