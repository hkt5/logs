<?php

namespace App\Services;

use App\Log as AppLog;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Repositories\LogRepository;
use App\Services\StoreLogService;
use Illuminate\Support\Facades\Validator;

class LogService
{

    /**
     * @var LogRepository repository
     */
    private LogRepository $repository;
    /**
     * @var StoreLogService storeLogService
     */
    private StoreLogService $storeLogService;

    /**
     * __construct
     *
     * @param LogRepository repository
     * @param StoreLogService storeLogService
     *
     * @return void
     */
    public function __construct(
        LogRepository $repository,
        StoreLogService $storeLogService
    ) {
        $this->repository = $repository;
        $this->storeLogService = $storeLogService;
    }

    /**
     * findAll
     *
     * @return array
     */
    public function findAll() : array
    {
        try {
            $logs = $this->repository->findAll();
            return [
                'content' => $logs, 'errors' => null, 'code' => Response::HTTP_OK
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage().$e->getTrace());
            return [
                'content' => null, 'errors' => ['exception' => $e->getMessage()],
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }

    /**
     * findById
     *
     * @param int id
     *
     * @return array
     */
    public function findById(int $id) : array
    {
        try {
            $log = $this->repository->findById($id);
            if ($log !== null) {
                return [
                    'content' => $log, 'errors' => null, 'code' => Response::HTTP_OK
                ];
            } else {
                return [
                    'content' => null, 'errors' => null, 'code' => Response::HTTP_NOT_FOUND
                ];
            }
        } catch (Exception $e) {
            Log::error($e->getMessage().$e->getTrace());
            return [
                'content' => null, 'errors' => ['exception' => $e->getMessage()],
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
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
        $validator = Validator::make($data, AppLog::$rules);
        if ($validator->fails()) {
            return [
                'content' => null, 'errors' => $validator->errors(),
                'code' => Response::HTTP_NOT_ACCEPTABLE
            ];
        } else {
            return $this->storeLogService->store($data);
        }
    }
}
