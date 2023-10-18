<?php
require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class SocketServer implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        // 클라이언트 연결 시 실행되는 로직
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // 클라이언트로부터 메시지를 받았을 때 실행되는 로직
    }

    public function onClose(ConnectionInterface $conn) {
        // 클라이언트 연결이 닫혔을 때 실행되는 로직
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        // 에러가 발생했을 때 실행되는 로직
    }
}

$context = stream_context_create([
    'ssl' => [
        'local_cert' => '/etc/httpd/conf/ssl/zap.kr/fullchain.cer',
        'local_pk' => '/etc/httpd/conf/ssl/zap.kr/zap.kr.key',
    ],
]);

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new SocketServer()
        )
    ),
    9999,
    '0.0.0.0',
    $context
);

$server->run();