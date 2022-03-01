<?php

namespace Tests\Unit;

use App\Log;
use Illuminate\Http\Response;
use Tests\TestCase;

class LogControllerTest extends TestCase
{
    public function test_FindAllLogs() : void
    {

        // given
        $log = new Log();

        // when
        $result = $this->get('/all');

        // then
        $result->seeStatusCode(Response::HTTP_OK);
        $result->seeJson($log->attributesToArray());
    }

    public function test_FindLogById_And_LogExists() : void
    {

        // given
        $id = 1;
        $log = Log::find($id);
        $response = ['content' => $log, 'errors' => null];

        // when
        $result = $this->get("/by-id/".$id);

        // then
        $result->seeStatusCode(Response::HTTP_OK);
    }

    public function test_FindLogById_And_LogNotExists() : void
    {

        // given
        $id = 999999999999999999;
        $response = ['content' => null, 'errors' => null];

        // when
        $result = $this->get('/by-id/'.$id);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_FOUND);
        $result->seeJson($response);
    }

    public function testCreateLog() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['errors' => null];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_OK);
        $result->seeJson($response);
    }

    public function testCreateLogWhenReasonIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
        ];
        $response = ['content' => null, 'errors' => ['reason' => ["The reason field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenMessageIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['message' => ["The message field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenUserInfoIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['user_info' => ["The user info field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenRequestUriIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['request_uri' => ["The request uri field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenQueryStringIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['query_string' => ["The query string field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenHostIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['host' => ["The host field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenUserIsEmpty() : void
    {

        // given
        $log = [
            'base_path' => '/',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['user' => ["The user field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenBasePathIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'client_ip' => '127.0.0.1',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['base_path' => ["The base path field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }

    public function testCreateLogWhenClientIpIsEmpty() : void
    {

        // given
        $log = [
            'user' => 'user',
            'base_path' => '/',
            'host' => 'http://localhost',
            'query_string' => 'name=hello_world',
            'request_uri' => '/create',
            'user_info' => 'user_info',
            'message' => 'hello',
            'reason' => 'world',
        ];
        $response = ['content' => null, 'errors' => ['client_ip' => ["The client ip field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        $result->seeJson($response);
    }
}
