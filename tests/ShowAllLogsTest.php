<?php


use App\Log;
use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ShowAllLogsTest extends TestCase
{

    use DatabaseMigrations;

    public function testIndex() : void
    {

        // given
        $log = new Log();

        $log->user = 'user';
        $log->base_path = '/';
        $log->client_ip = '127.0.0.1';
        $log->host = 'http://localhost';
        $log->query_string = 'name=hello_world';
        $log->request_uri = '/create';
        $log->user_info = 'user_info';
        $log->message = 'hello';
        $log->reason = 'world';
        $log->save();

        // when
        $result = $this->get('/all');

        // then
        $result->seeStatusCode(Response::HTTP_OK);
        $result->seeJson($log->attributesToArray());
    }
}
