<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

include "./includes/navbar.php";

include "connection.php";

$userId = $_SESSION['id'];


$query = "
    SELECT u.id, u.username, MAX(m.timestamp) AS last_message_time,
           SUM(CASE WHEN m.receiver_id = $userId AND m.seen = 0 THEN 1 ELSE 0 END) AS new_message_count
    FROM users u
    JOIN messages m ON u.id = m.sender_id OR u.id = m.receiver_id
    WHERE (m.sender_id = $userId OR m.receiver_id = $userId) AND u.id != $userId
    GROUP BY u.id
    ORDER BY last_message_time DESC
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<head>
    <title>Chat List</title>
    <link rel="stylesheet" href="./assets/css/chatlist.css">
    <link rel="stylesheet" href="./assets/css/navbar.css">  
</head>
<body>
   
    <h1>Chat List</h1>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <li>
                <a href="chat.php?user_id=<?= $row['id'] ?>" class="<?= $row['new_message_count'] > 0 ? 'new-message' : '' ?>">
                    <?= htmlspecialchars($row['username']) ?>
                    <?php if ($row['new_message_count'] > 0): ?>
                        <span class="new-message-badge"><?= $row['new_message_count'] ?></span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
<script src="./assets/js/navbar.js"></script>
</body>
</html>
