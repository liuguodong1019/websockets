#WebSockets

###Install:
Use composer :)

```php

require "vendor/autoload.php";

use nicklasos\WebSocket;

$ws = new WebSocket('localhost', 3030);

$ws->on('open', function ($conn, $ip) {
    $response = array(
        'type' => 'system',
        'message' => $ip . ' connected'
    );

    $conn->send($response);
});

$ws->on('close', function ($conn, $ip) {
    $response = array(
        'type' => 'system',
        'message' => $ip . ' disconnected'
    );

    $conn->send($response);
});

$ws->on('message', function ($conn, $data) {
    if ($data) {
        $user_name = $data['name'];
        $user_message = $data['message'];

        $response_text = array(
            'type'=>'usermsg',
            'name' => $user_name,
            'message' => $user_message
        );

        $conn->send($response_text);
    }
});

$ws->setTimeout(1);
$ws->run();
```