<?php


namespace App\Http\Controllers;


use App\Services\CreateLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateLogController extends Controller
{

    private $createLogService;

    public function __construct(CreateLogService $createLogService)
    {
        $this->createLogService = $createLogService;
    }

    /**
     * Create user log.
     *
     * [Create full user log.]
     *
     * @bodyParam user required The current user.
     * @bodyParam base_path required The base path.
     * @bodyParam client_ip required The user ip.
     * @bodyParam host required The user host.
     * @bodyParam query_string required The query string.
     * @bodyParam request_uri required The request uri.
     * @bodyParam user_info required The user info.
     * @bodyParam reason required The short information about action.
     * @bodyParam message required The short message about action.
     *
     * @responseFile responses/responseLog.json
     */
    public function index(Request $request) : JsonResponse
    {
        return $this->createLogService->create($request);
    }
}
