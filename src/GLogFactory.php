<?php

use Mdabagh\GenerateLog\classes\db;
use Mdabagh\GenerateLog\classes\dbAndStorage;
use Mdabagh\GenerateLog\classes\storage;

class GLogFactory
{
    public $state_active;

    public function __construct()
    {
        $this->state_active = config('GLog.state_active');
    }

    public function make($type, $message, $data, $exception, $request, $response)
    {
        switch ($type) {
            case 'INFO':
                $log_type = config('GLog.log_type_active.INFO');
                if ($log_type) {
                    switch ($state_active) {
                        case 'db':
                            $db = new db();
                            $db->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'storage':
                            $storage = new storage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'dbAndStorage':
                            $storage = new dbAndStorage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                break;
            case 'WARNING':
                $log_type = config('GLog.log_type_active.WARNING');
                if ($log_type) {
                    switch ($state_active) {
                        case 'db':
                            $db = new db();
                            $db->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'storage':
                            $storage = new storage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'dbAndStorage':
                            $storage = new dbAndStorage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                break;
            case 'DEBUG':
                $log_type = config('GLog.log_type_active.DEBUG');
                if ($log_type) {
                    switch ($state_active) {
                        case 'db':
                            $db = new db();
                            $db->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'storage':
                            $storage = new storage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'dbAndStorage':
                            $storage = new dbAndStorage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                break;
            case 'ERROR':
                $log_type = config('GLog.log_type_active.ERROR');
                if ($log_type) {
                    switch ($state_active) {
                        case 'db':
                            $db = new db();
                            $db->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'storage':
                            $storage = new storage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        case 'dbAndStorage':
                            $storage = new dbAndStorage();
                            $storage->make($type, $message, $data, $exception, $request, $response);
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                break;

            default:
                break;
        }
    }
}
