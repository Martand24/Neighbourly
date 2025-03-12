<?php
$dbhost = "localhost";
$dbusername = "";
$dbpass = "";
$dbname = "";

$db = new mysqli($dbhost, $dbusername, $dbpass, $dbname);

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

$searchterm = $_GET['term'];
$skilldata = array();

if ($stmt = $db->prepare("SELECT id, name FROM items WHERE name LIKE ? ORDER BY name ASC")) {
    $searchPattern = '%' . $searchterm . '%';
    $stmt->bind_param('s', $searchPattern);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $data['id'] = $row['id'];
        $data['value'] = $row['name'];
        array_push($skilldata, $data);
    }

    $stmt->close();
}

echo json_encode($skilldata);
$db->close();
?>

