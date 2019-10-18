<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    public static $rules = [
        'user' => 'required|string',
        'base_path' => 'required|string',
        'client_ip' => 'required|string',
        'host' => 'required|string',
        'query_string' => 'required|string',
        'request_uri' => 'required|string',
        'user_info' => 'required|string',
        'reason' => 'required|string',
        'message' => 'required|string',
    ];

    protected $table = 'logs';

    protected $primaryKey = 'id';

    protected $user;
    protected $base_path;
    protected $client_ip;
    protected $host;
    protected $query_string;
    protected $request_uri;
    protected $user_info;
    protected $message;
    protected $reason;

    protected $fillable = [
        'user', 'base_path', 'client_ip'. 'host', 'query_string', 'request_uri', 'user_info', 'message'. 'reason',
    ];
}
