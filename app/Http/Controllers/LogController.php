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
     * @return JsonResponse
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
     * @param int id
     *
     * @return JsonResponse
     */
    public function findById(Request $request, int $id) : JsonResponse
    {
        $result = $this->logService->findById($id);
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
     * @param Request request
     *
     * @return JsonResponse
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
