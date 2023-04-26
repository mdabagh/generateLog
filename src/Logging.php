<?php

namespace Mdabagh\GenerateLog;

use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    protected $table = 'logging';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'url' ,'ip', 'file_parent','file', 'line','function', 'username','fullname', 'msg','data', 'request_body', 'response' ,'exception'
    ];

    protected $casts = [
        'data' => 'array',
        'request_body' => 'array',
        'response' => 'array',
        'exception' => 'array'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
