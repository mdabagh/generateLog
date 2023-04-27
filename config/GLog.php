<?php

/**
 * Laravel GLOG Package by Mohammadsajad Dabagh.
 */

return [

    'state_active' => env('GLOG_STATE_ACTIVE', 'storage'),

    'log_type_active' => [
        'INFO' => env('GLOG_TYPE_INFO_ACTIVE', true),
        'WARNING' => env('GLOG_TYPE_WARNING_ACTIVE', true),
        'DEBUG' => env('GLOG_TYPE_DEBUG_ACTIVE', true),
        'ERROR' => env('GLOG_TYPE_ERROR_ACTIVE', true),
    ]

];