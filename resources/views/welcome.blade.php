<!DOCTYPE html>
<html>
<head>
    <title>WebSocket Client</title>
    <script>
        // WebSocket 연결 생성
        const socket = new WebSocket('wss://211.53.209.85:9999');

        // 연결이 열렸을 때 이벤트 핸들러
        socket.onopen = function(event) {
            console.log('WebSocket 연결이 열렸습니다.');
            // 서버로 메시지 전송 예시:
            socket.send('안녕하세요, 서버!');
        };

        // 메시지 수신 이벤트 핸들러
        socket.onmessage = function(event) {
            console.log('서버로부터 메시지 수신:', event.data);
        };

        // 연결이 닫혔을 때 이벤트 핸들러
        socket.onclose = function(event) {
            console.log('WebSocket 연결이 닫혔습니다.');
        };

        // 에러 발생 시 이벤트 핸들러
        socket.onerror = function(error) {
            console.error('WebSocket 에러 발생:', error);
        };
    </script>
</head>
<body>
    <h1>WebSocket Client</h1>
</body>
</html>