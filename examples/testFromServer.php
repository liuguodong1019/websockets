<?php

$host = 'localhost';
$port = 3030;
$header = "Server-message: Hello from server\r\n";

//WebSocket handshake
$sock = fsockopen($host, $port, $errno, $errstr, 2);
fwrite($sock, $header) or die('error: ' . $errno . ':' . $errstr);

fclose($sock);