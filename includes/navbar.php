<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already active
}

include "connection.php"; // Include database connection
?>

<div class="nav-bar">
    <div class="no-collapse">
        <a class="nav-index" href="./index.php">
            <img src="./assets/images/logo.png" class="logo" alt="logo">
        </a>
        <a class="nav-share" href="./post.php">Share</a>
        <a class="nav-explore" href="./explore.php">Explore</a>
        <a class="nav-chat" href="./chatlist.php">Chats</a>
        <div class="search-bar">
            <form class="search-bar-inner" action="/neighbourly/explore.php" method="get">
                <input type="text" placeholder="Search items" name="query" class="search-box" id="search_input">
                <button class="search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="myCollapse">
        <!-- Bell Icon for Notifications -->
        <div class="notification-icon">
            <i class="fa-solid fa-bell notif_bell" id="bell_icon" style="font-size:30px; cursor: pointer; color:white;margin-top: 7px; margin-right:10px;"></i>
            <span class="notification-count" id="notification-count">0</span>
        </div>

        <!-- Notification Dropdown -->
        <div class="notification-dropdown" id="notification-dropdown">
            <div class="notification-header">Notifications</div>

            <!-- Message Requests Section -->
            <div class="notification-type">Message Requests</div>
            <?php
              // Fetch pending item requests for the logged-in user
$sql = "SELECT ir.*, u.username, i.name AS item_name 
        FROM item_requests ir 
        JOIN users u ON ir.sender_id = u.id 
        JOIN items i ON ir.item_id = i.id 
        WHERE ir.recipient_id = ? AND ir.status = 'pending'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='notification-item'>";
        echo "<p><strong>" . htmlspecialchars($row['username']) . "</strong> requested your item <strong>" . htmlspecialchars($row['item_name']) . "</strong>.</p>";
        echo "<button onclick='acceptItemRequest(" . $row['request_id'] . ")'>Accept</button>";
        echo "<button onclick='declineItemRequest(" . $row['request_id'] . ")'>Decline</button>";
        echo "</div>";
    }
} else {
    echo "<div class='notification-item'>";
    echo "<p>No new item requests.</p>";
    echo "</div>";
}

           ?>

                  </div>
    </div>

    <a class="nav-about" href="/aboutUs.html">About us</a>
    <?php if (isset($_SESSION['id'])): 
        $id = $_SESSION['id'];
        $query = mysqli_query($conn, "SELECT photo FROM users WHERE id = $id") or die("Error occurs");
        $res_photo = ""; // Default empty
        if ($result = mysqli_fetch_assoc($query)) {
            $res_photo = $result['photo'];
        }
    ?>
        <a class="nav-profile" href="./profile.php">
            <img style="height:3rem; width:3rem; border-radius: 50%;" 
                 src="<?php echo !empty($res_photo) ? $res_photo : './assets/images/logo.png'; ?>" 
                 class="nav-profile" 
                 alt="User Photo">
        </a>
    <?php else: ?>
        <a href="./login.php">Login</a>
    <?php endif; ?>
</div>

<script>
// JavaScript to toggle notification dropdown
document.getElementById('bell_icon').addEventListener('click', function () {
    const dropdown = document.getElementById('notification-dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

function acceptItemRequest(requestId) {
    fetch('handle_item_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            request_id: requestId,
            action: 'accept'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item request accepted! The item is now marked as Unavailable.');
            location.reload(); // Refresh the page to update notifications
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
}

function declineItemRequest(requestId) {
    fetch('handle_item_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            request_id: requestId,
            action: 'decline'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item request declined!');
            location.reload(); // Refresh the page to update notifications
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
}

</script>
</body>
</html>

