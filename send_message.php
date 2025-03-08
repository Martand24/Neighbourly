<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Content-Type: application/json');
    die(json_encode(['success' => false, 'error' => 'Not logged in']));
}

include "connection.php";


$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    header('Content-Type: application/json');
    die(json_encode(['success' => false, 'error' => 'Invalid input data']));
}

$userId = $_SESSION['id'];
$receiverId = $data['receiver_id'];
$message = $data['message'];


if (empty($message)) {
    header('Content-Type: application/json');
    die(json_encode(['success' => false, 'error' => 'Message cannot be empty']));
}

$query = "INSERT INTO messages (sender_id, receiver_id, message, seen) VALUES ($userId, $receiverId, '$message', 0)";
if (mysqli_query($conn, $query)) {
    
    require __DIR__ . '/vendor/autoload.php';
    $pusher = new Pusher\Pusher(
        "149d5000036ee6d6283a",
        "fa142b0e381d8edff81a",
	 "1952604",    
        ['cluster' => 'ap2']
    );

    $pusher->trigger("chat-channel-$userId-$receiverId", 'new-message', [
        'sender' => $userId,
        'message' => $message,
    ]);

    
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
} else {
    
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}
?>
