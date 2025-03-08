<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

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
    <link rel="stylesheet" href="chatlist.css">
</head>
<body>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="logout.php" style="background-color: #f44336; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Logout</a>
    </div>

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
</body>
</html>
