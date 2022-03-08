<?php

namespace App\Services;

use App\Events\LogEvent;
use Illuminate\Http\Request;

class EventService
{
    /**
     * logEvent
     *
     * @param Request request
     * @param array data
     *
     * @return void
     */
    public function logEvent(Request $request, array $data) : void
    {
        $data = [
            'user' => -1,
            'base_path' => $request->getBasePath() ?: null,
            'client_ip' => $request->getClientIp() ?: null,
            'host' => $request->getHost() ?: null,
            'query_string' => $request->getQueryString() ?: null,
            'request_uri' => $request->getRequestUri() ?: null,
            'user_info' => $request->getUserInfo() ?: null,
            'reason' => $data['reason'] ?: null,
            'message' => json_encode($data['message']) ?: null,
        ];
        event(new LogEvent($data));
    }
}
