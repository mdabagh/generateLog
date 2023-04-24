<?php

use Illuminate\Support\Facades\Session as FacadesSession;
use App\models\Logging;
use Illuminate\Support\Facades\Log;

function logprossesModel($type , $message , $data , $exception , $request , $response)
{
    $backtrace = debug_backtrace();
    Logging::create([
        'type' => $type,
        'url' => url()->current(),
        'ip' => $_SERVER['REMOTE_ADDR'],
        'file_parent' => $backtrace[3]['class'],
        'file' => $backtrace[2]['class'],
        'line' => $backtrace[1]['line'],
        'function' => $backtrace[2]['function'],
        'username' => FacadesSession::get('username'),
        'fullname' =>FacadesSession::get('username'),
        'msg' => $message,
        'data' => $data,
        'request_body' => $request,
        'response' => $response,
        'exception' => $exception
    ]);
}


function logprosses($type , $message , $data , $exception , $request , $response)
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

function generateLog($type , $message , $data = null , $exception = null , $request = null , $response = null)
{
    switch ($type) {
        case 'INFO':
            $log_type = env('LOG_TYPE_INFO');
            if ($log_type) {
                logprosses($type , $message , $data , $exception , $request , $response);
            }
            break;
        case 'WARNING':
            $log_type = env('LOG_TYPE_WARNING');
            if ($log_type) {
                logprosses($type , $message , $data , $exception , $request , $response);
            }
            break;
        case 'DEBUG':
            $log_type = env('LOG_TYPE_DEBUG');
            if ($log_type) {
                logprosses($type , $message , $data , $exception , $request , $response);
            }
            break;
        case 'ERROR':
            $log_type = env('LOG_TYPE_ERROR');
            if ($log_type) {
                logprosses($type , $message , $data , $exception , $request , $response);
            }
            break;
        
        default:
            break;
    }
}
