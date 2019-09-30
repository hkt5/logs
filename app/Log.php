<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    public static $rules = [
        'user' => 'required',
        'base_path' => 'required',
        'client_ip' => 'required',
        'host' => 'required',
        'query_string' => 'required',
        'request_uri' => 'required',
        'user_info' => 'required',
        'reason' => 'required',
        'message' => 'required',
    ];

    protected $table = 'logs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user', 'base_path', 'client_ip'. 'host', 'query_string', 'request_uri', 'user_info', 'message'. 'reason',
    ];
}
