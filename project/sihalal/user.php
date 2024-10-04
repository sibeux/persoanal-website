<?php

include './database/db.php';

$sql = "";

function getUserData($email)
{
    global $sql;

    $sql = "SELECT * FROM user WHERE email_user = '" . $email . "'";
}

function sendUserAddress($email, $address)
{
    global $sql;
    
// Mendapatkan data JSON dari body request
$input = file_get_contents('php://input');

// Mengubah JSON menjadi array PHP
$data = json_decode($input, true);

// Cek apakah data berhasil di-decode
if ($data === null) {
    // Jika gagal decode JSON, tangani error
    http_response_code(400); // Bad Request
    echo json_encode(['message' => 'Invalid JSON data']);
    exit;
}

// Mengakses data yang dikirim (misalnya, 'name', 'email', dan 'age')
$id_user = $data['id_user'] ?? '';
$receipt_name = $data['receipt_name'] ?? '';
$receipt_phone = $data['receipt_phone'] ?? '';

echo json_encode(
    [
        'id_user' => $id_user,
        'receipt_name' => $receipt_name,
        'receipt_phone' => $receipt_phone,
    ]
);


$sql = "";
}

switch ($_GET['method']) {
case 'get_user_data':
getUserData($_GET['email']);
break;
default:
break;
}

switch ($_POST['method']) {
case 'send_user_address':
sendUserAddress($_POST['email'], $_POST['address']);
break;
default:
break;
}

$result = $db->query($sql);

// Check if the query was successful
if (!$result) {
die("Query failed: " . (is_object($db) ? $db->error : 'Database connection error'));
}

// Create an array to store the data
$data = array();

// Check if there is any data
if ($result->num_rows > 0) {
// Loop through each row of data
while ($row = $result->fetch_assoc()) {
// Clean up the data to handle special characters
array_walk_recursive($row, function (&$item) {
if (is_string($item)) {
$item = htmlentities($item, ENT_QUOTES, 'UTF-8');
}
});

// Add each row to the data array
$data[] = $row;
}
}

// Convert the data array to JSON format
$json_data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// Check if JSON conversion was successful
if ($json_data === false) {
die("JSON encoding failed");
}

// Output the JSON data
echo $json_data;

// Close the dbection
$db->close();