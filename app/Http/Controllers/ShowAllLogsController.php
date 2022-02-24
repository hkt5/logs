<?php


namespace App\Http\Controllers;


use App\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as LaravelLog;

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

            LaravelLog::log('error', $e->getMessage());
            return response()->json(['content' => [], 'error_messages' => []], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show paginate logs.
     * [Show paginate logs.]
     *
     * @responseFile responses/responseLogs.json
     */
    public function paginate(Request $request, int $size = null) : JsonResponse
    {

        if($size == null) {
            $size = 15;
        }

        try {
            return response()->json(
                [
                    'content' => DB::table('logs')->orderBy('created_at', 'desc')->paginate($size),
                    'error_messages' => []
                ],
                Response::HTTP_OK);
        } catch (\Exception $e) {

            LaravelLog::log('error', $e->getMessage());
            return response()->json(['content' => [], 'error_messages' => []], Response::HTTP_BAD_REQUEST);
        }
    }
}
