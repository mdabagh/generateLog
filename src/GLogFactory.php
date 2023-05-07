<?php
namespace Mdabagh\GenerateLog;

use Mdabagh\GenerateLog\classes\db;
use Mdabagh\GenerateLog\classes\dbAndStorage;
use Mdabagh\GenerateLog\classes\storage;

interface LogStrategy
{
    public function make($type, $message, $data, $exception, $request, $response);
}

class GLogFactory
{
    protected $state_active;

    public function __construct()
    {
        $this->state_active = config('GLog.state_active');
    }

    public function make($type, $message, $data, $exception, $request, $response)
    {
        $log_type = config("GLog.log_type_active.{$type}");

        if ($log_type) {
            $strategy = $this->getStrategy();
            $strategy->make($type, $message, $data, $exception, $request, $response);
        }
    }

    protected function getStrategy(): LogStrategy
    {
        switch ($this->state_active) {
            case 'db':
                return new db();
            case 'storage':
                return new storage();
            case 'dbAndStorage':
                return new dbAndStorage();
            default:
                throw new InvalidArgumentException("Invalid state_active value: {$this->state_active}");
        }
    }
}