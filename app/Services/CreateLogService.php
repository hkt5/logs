<?php


namespace App\Services;


use App\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CreateLogService
{

    public function create(Request $request) : JsonResponse
    {

        $validator = Validator::make($request->all(), Log::$rules);
        if($validator->fails()){

            return response()->json(
                ['content' => [], 'error_messages' => $validator->errors()], Response::HTTP_BAD_REQUEST
            );
        }
        $log = new Log();
        $log->user = $request->get('user');
        $log->base_path = $request->get('base_path');
        $log->client_ip = $request->get('client_ip');
        $log->host = $request->get('host');
        $log->query_string = $request->get('query_string');
        $log->request_uri = $request->get('request_uri');
        $log->user_info = $request->get('user_info');
        $log->reason = $request->get('reason');
        $log->message = $request->get('message');
        $log->save();
        return response()->json(['content' => $request->all(), 'error_messages' => []], Response::HTTP_OK);
    }
}
