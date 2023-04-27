<?php

namespace Mdabagh\GenerateLog\classes;
use Illuminate\Support\Facades\Log;
use Mdabagh\GenerateLog\GLogInterface;

class storage implements GLogInterface
{
    function make($type, $message, $data, $exception, $request, $response)
    {
        $backtrace = debug_backtrace();
        Log::$type([
            'ip' => $_SERVER['REMOTE_ADDR'] ?? "",
            'file_parent' => $backtrace[2]['file'] ?? "",
            'file' => $backtrace[1]['file'] ?? "",
            'line' => $backtrace[1]['line'] ?? "",
            'function' => $backtrace[2]['function'] ?? "",
            'user_id' => auth()->guard()->user()->id_user ?? "cron id",
            'user_name' => auth()->guard()->user()->fa_name ?? "cron name",
            'user_family' => auth()->guard()->user()->fa_family ?? "cron family",
            'msg' => $message,
            'data' => $data,
            'request_body' => $request,
            'response' => $response,
            'exception' => $exception
        ]);
    }
}
