<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LogController extends Controller
{

    /**
     * @var LogService logService
     */
    private LogService $logService;

    /**
     * @var EventService eventService
     */
    private EventService $eventService;

    public function __construct(
        LogService $logService,
        EventService $eventService
    ) {
        $this->logService = $logService;
        $this->eventService = $eventService;
    }

    /**
     * findAll
     *
     * Find all logs.
     * <aside class="notice">Require users microservice.</aside>
     *
     * @response 200 {
     *   "content": [
     *   {
     *       "id": 1,
     *       "user": "user",
     *       "base_path": "/",
     *       "client_ip": "127.0.0.1",
     *       "host": "http://localhost",
     *       "query_string": "name=hello_world",
     *       "request_uri": "/create",
     *       "user_info": "user_info",
     *       "message": "hello",
     *       "reason": "world",
     *       "created_at": "2022-03-14T12:57:41.000000Z",
     *       "updated_at": "2022-03-14T12:57:41.000000Z",
     *  },
     * ],
     * "errors": null
     *}
     */
    public function findAll(Request $request) : JsonResponse
    {
        $result = $this->logService->findAll();
        $logdata = [
            'reason' => $result['code'],
            'message' => $result,
        ];
        $this->eventService->logEvent($request, $logdata);
        return response()->json(
            ['content' => $result['content'], 'errors' => $result['errors']],
            $result['code']
        );
    }

    /**
     * findById
     *
     * Find log by id.
     * <aside class="notice">Require users microservice.</aside>
     *
     * @response 200 {
     *   "content": {
     *       "user": "et",
     *       "base_path": "sint",
     *       "client_ip": "aut",
     *       "host": "magnam",
     *       "query_string": "illo",
     *       "request_uri": "sed",
     *       "user_info": "nisi",
     *       "reason": "odio",
     *       "message": "accusantium",
     *       "created_at": "2022-03-14T12:57:41.000000Z",
     *       "updated_at": "2022-03-14T12:57:41.000000Z",
     *       "id": 21
     *   },
     *   "errors": null
     * }
     */
    public function findById(Request $request, string $id) : JsonResponse
    {
        $result = $this->logService->findById((int) $id);
        $logdata = [
            'reason' => $result['code'],
            'message' => $result,
        ];
        $this->eventService->logEvent($request, $logdata);
        return response()->json(
            ['content' => $result['content'], 'errors' => $result['errors']],
            $result['code']
        );
    }

    /**
     * store
     *
     * Store new log.
     *
     * @bodyParam user string required Current application user.
     * @bodyParam client_ip string required Current application user ip.
     * @bodyParam base_path string required Current application user base path.
     * @bodyParam host string required Current application user host.
     * @bodyParam query_string string required Current application user query string.
     * @bodyParam request_uri string required Current application user request uri.
     * @bodyParam user_info string required Current application user info.
     * @bodyParam reason string required Request reason.
     * @bodyParam message string required Current application user message.
     *
     * @response 200 {
     * "content": {
     *   "user": "et",
     *   "base_path": "sint",
     *   "client_ip": "aut",
     *   "host": "magnam",
     *   "query_string": "illo",
     *   "request_uri": "sed",
     *   "user_info": "nisi",
     *   "reason": "odio",
     *   "message": "accusantium",
     *   "created_at": "2022-03-14T12:57:41.000000Z",
     *   "updated_at": "2022-03-14T12:57:41.000000Z",
     *   "id": 21
     * },
     * "errors": null
     * }
     */
    public function store(Request $request) : JsonResponse
    {
        $result = $this->logService->store($request->all());
        $logdata = [
            'reason' => $result['code'],
            'message' => $result,
        ];
        $this->eventService->logEvent($request, $logdata);
        return response()->json(
            ['content' => $result['content'], 'errors' => $result['errors']],
            $result['code']
        );
    }
}
