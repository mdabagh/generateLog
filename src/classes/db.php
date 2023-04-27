<?php

namespace Mdabagh\GenerateLog\classes;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\models\Logging;
use Mdabagh\GenerateLog\GLogInterface;

class db implements GLogInterface
{
    function make($type, $message, $data, $exception, $request, $response)
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
            'fullname' => FacadesSession::get('username'),
            'msg' => $message,
            'data' => $data,
            'request_body' => $request,
            'response' => $response,
            'exception' => $exception
        ]);
    }
}
