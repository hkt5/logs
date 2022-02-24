<?php

namespace Tests;

use App\Log;
use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ShowAllLogsTest extends TestCase
{
    public function testIndex() : void
    {

        // given
        $log = new Log();

        // when
        $result = $this->get('/all');

        // then
        $result->seeStatusCode(Response::HTTP_OK);
        $result->seeJson($log->attributesToArray());
    }

    public function testPaginate() : void
    {

        // when
        $result = $this->get('/paginate');

        // then
        $result->seeStatusCode(Response::HTTP_OK);

    }
}
