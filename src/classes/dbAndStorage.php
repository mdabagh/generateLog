<?php

namespace Mdabagh\GenerateLog\classes;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\models\Logging;
use Illuminate\Support\Facades\Log;
use Mdabagh\GenerateLog\GLogInterface;

class dbAndStorage implements GLogInterface
{
    public function make($type, $message, $data, $exception, $request, $response){
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