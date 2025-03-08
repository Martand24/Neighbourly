<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

include "connection.php";


$receiverId = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
if ($receiverId <= 0) {
    die("Invalid User ID.");
}

$userId = $_SESSION['id'];


$updateQuery = "UPDATE messages SET seen = 1 WHERE sender_id = ? AND receiver_id = ?";
if (!($stmt = mysqli_prepare($conn, $updateQuery))) {
    die("Database error: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "ii", $receiverId, $userId);
mysqli_stmt_execute($stmt);


$receiverQuery = "SELECT username FROM users WHERE id = ?";
if (!($stmt = mysqli_prepare($conn, $receiverQuery))) {
    die("Database error: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "i", $receiverId);
mysqli_stmt_execute($stmt);
$receiverResult = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($receiverResult) === 0) {
    die("Receiver not found.");
}
$receiverRow = mysqli_fetch_assoc($receiverResult);
$receiverUsername = $receiverRow['username'];


$query = "
    SELECT * FROM messages
    WHERE (sender_id = ? AND receiver_id = ?)
    OR (sender_id = ? AND receiver_id = ?)
    ORDER BY timestamp ASC
";
if (!($stmt = mysqli_prepare($conn, $query))) {
    die("Database error: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "iiii", $userId, $receiverId, $receiverId, $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<head>
    <title>chatbox</title>
    <link rel="stylesheet" href="./assets/css/chat.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>
<body>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="logout.php" style="background-color: #f44336; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Logout</a>
    </div>

    <h1><?= htmlspecialchars($receiverUsername) ?></h1>
    <div id="chat-box">
 
<?php
        while ($row = mysqli_fetch_assoc($result)) {

	      ?> 
            
                                <div class="<?= $row['sender_id'] == $userId ? 'message-sent' : 'message-received' ?>">
                <strong><?= $row['sender_id'] == $userId ? 'You' : htmlspecialchars($receiverUsername) ?>:</strong>
                <?= htmlspecialchars($row['message']) ?>
                <div class="timestamp"><?= date('h:i A', strtotime($row['timestamp'])) ?></div>
	    </div>
 <?php
            
        }
        ?>               </div>

    <form id="chat-form">
        <input type="text" id="message" placeholder="Type a message">
        <button type="submit">Send</button>
    </form>

	<script>     
    const userId = <?= json_encode($userId) ?>;
    const receiverId = <?= json_encode($receiverId) ?>;
    const receiverUsername = <?= json_encode(htmlspecialchars($receiverUsername)) ?>;
</script>
<script src="./assets/js/chat.js"></script>
  </body>
</html>
