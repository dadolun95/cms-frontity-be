<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class RestApiController
 * @package App\Http\Controllers\Wordpress
 */
class RestApiController extends Controller
{

    /**
     * @param Request $request
     * @return array
     */
    public function execute(Request $request)
    {
        $method = $request->getMethod();
        $path_parts = parse_url( $request->getPathInfo() );
        $path_parts['path'] = str_replace('/wp-json', '', $path_parts['path']);
        $wpRequest = new \WP_REST_Request( $method, $path_parts['path'] );
        if ( ! empty( $request->getQueryString() ) ) {
            parse_str( $request->getQueryString(), $query_params );
            $wpRequest->set_query_params( $query_params );
        }
        $response = rest_do_request($wpRequest);
        $server = rest_get_server();
        $response = $server->response_to_data( $response, false );
        return (array) $response;
    }
}
