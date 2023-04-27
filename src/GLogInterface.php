<?php
namespace Mdabagh\GenerateLog;

interface GLogInterface
{
    public function make($type, $message, $data, $exception, $request, $response);
}