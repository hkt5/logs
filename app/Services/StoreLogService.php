<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Repositories\LogRepository;

class StoreLogService
{

    /**
     * @var LogRepository repository
     */
    private LogRepository $repository;

    /**
     * __construct
     *
     * @param LogRepository repository
     *
     * @return void
     */
    public function __construct(LogRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * store
     *
     * @param array data
     *
     * @return array
     */
    public function store(array $data) : array
    {
        try {
            $log = $this->repository->store($data);
            return [
                'content' => $log, 'errors' => null, 'code' => Response::HTTP_OK
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return [
                'content' => null, 'errors' => ['exception' => $e->getMessage()],
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }
}
