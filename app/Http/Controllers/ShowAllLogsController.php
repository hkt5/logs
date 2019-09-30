<?php


namespace App\Http\Controllers;


use App\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowAllLogsController extends Controller
{

    /**
     * Show all logs.
     * [Show all user logs.]
     *
     * @responseFile responses/responseLogs.json
     */
    public function index(Request $request) : JsonResponse
    {

        try {
            return response()->json(['content' => Log::all(), 'error_messages' => []], Response::HTTP_OK);
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::log('debug', $e->getMessage());
            return response()->json(['content' => [], 'error_messages' => []], Response::HTTP_OK);
        }
    }
}
