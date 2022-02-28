<?php

namespace App\Repositories;

use App\Log;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class LogRepository
{

    /**
     * findAll
     *
     * @return Collection
     */
    public function findAll() : Collection
    {
        return Log::all();
    }

    /**
     * findById
     *
     * @param int id
     *
     * @return Log
     */
    public function findById(int $id) : ?Log
    {
        return Log::find($id);
    }

    /**
     * store
     *
     * @param array data
     *
     * @return Log
     */
    public function store(array $data) : ?Log
    {
        $log = new Log();
        $log->user = $data['user'];
        $log->base_path = $data['base_path'];
        $log->client_ip = $data['client_ip'];
        $log->host = $data['host'];
        $log->query_string = $data['query_string'];
        $log->request_uri = $data['request_uri'];
        $log->user_info = $data['user_info'];
        $log->reason = $data['reason'];
        $log->message = $data['message'];
        $log->created_at = Carbon::now();
        $log->updated_at = Carbon::now();
        $log->save();
        return $log;
    }
}
