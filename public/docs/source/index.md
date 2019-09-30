---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_7d260b3c574f75742b2ac0118c36cb64 -->
## Show all logs.

[Show all user logs.]

> Example request:

```bash
curl -X GET -G "/all" 
```

```javascript
const url = new URL("/all");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "content": [],
    "error_messages": []
}
```

### HTTP Request
`GET /all`


<!-- END_7d260b3c574f75742b2ac0118c36cb64 -->

<!-- START_bc05019f8e3ad49eb15ba5bad0647e7f -->
## Create user log.

[Create full user log.]

> Example request:

```bash
curl -X POST "/create" \
    -H "Content-Type: application/json" \
    -d '{"user":"omnis","base_path":"vero","client_ip":"placeat","host":"qui","query_string":"iusto","request_uri":"rem","user_info":"non","reason":"rerum","message":"sapiente"}'

```

```javascript
const url = new URL("/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user": "omnis",
    "base_path": "vero",
    "client_ip": "placeat",
    "host": "qui",
    "query_string": "iusto",
    "request_uri": "rem",
    "user_info": "non",
    "reason": "rerum",
    "message": "sapiente"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "content": {
        "user": "user",
        "base_path": "base_path",
        "client_ip": "127.0.0.1",
        "host": "http:\/\/localhost",
        "query_string": "hello=world",
        "request_uri": "\/my_action",
        "user_info": "info",
        "reason": "you must login",
        "message": "message"
    },
    "error_message": []
}
```

### HTTP Request
`POST /create`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user | required |  optional  | The current user.
    base_path | required |  optional  | The base path.
    client_ip | required |  optional  | The user ip.
    host | required |  optional  | The user host.
    query_string | required |  optional  | The query string.
    request_uri | required |  optional  | The request uri.
    user_info | required |  optional  | The user info.
    reason | required |  optional  | The short information about action.
    message | required |  optional  | The short message about action.

<!-- END_bc05019f8e3ad49eb15ba5bad0647e7f -->


