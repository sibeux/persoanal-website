<?php

include './database/db.php';
function getEmailCheck($db){
    if ($stmt = $db->prepare('SELECT user.email_user FROM user WHERE user.email_user = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc)
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $response = ["email_exists" => "true"];
            // Output the JSON data
            echo json_encode($response);
        } else {
            $response = ["email_exists" => "false"];
            echo json_encode($response);
        }
        $stmt->close();
    } else {
        echo 'Could not prepare statement!';
    }
}

switch ($_POST['method']) {
    case 'email_check':
        getEmailCheck($db);
        break;
    default:
        break;
}

$db->close();