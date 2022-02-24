<?php

namespace Tests;

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class CreateLogControllerTest extends TestCase
{
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
        $response = ['content' => $log, 'error_messages' => []];

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
        $response = ['content' => [], 'error_messages' => ['reason' => ["The reason field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['message' => ["The message field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['user_info' => ["The user info field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['request_uri' => ["The request uri field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['query_string' => ["The query string field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['host' => ["The host field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['user' => ["The user field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['base_path' => ["The base path field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
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
        $response = ['content' => [], 'error_messages' => ['client_ip' => ["The client ip field is required."]]];

        // when
        $result = $this->post('/create', $log);

        // then
        $result->seeStatusCode(Response::HTTP_BAD_REQUEST);
        $result->seeJson($response);
    }
}
