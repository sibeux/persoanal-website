<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */

// an email address that will be in the From field of the email.
$from = 'Demo contact form <sender@yourdomain.com>';

// an email address that will receive the email with the output of the form
$sendTo = 'Demo contact form <reciever@example.com>';

// subject of the email
$subject = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('InputName' => 'Name', 'InputEmail' => 'Email', 'InputSubject' => 'Subject', 'InputMessage' => 'Message'); 

// message that will be displayed when everything is OK :)
$okMessage = 'Your message successfully submitted. Thank you, I will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

require_once('../database/db.php');

class Email{
    private $conn;

    function __construct(){
        // Create connection
        $this->conn = new mysqli(HOST, SIBEUX, pass, DB);
        // Check connection
        if ($this->conn->connect_error) {
            http_response_code(500);
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function __destruct()
    {
        // tutup koneksi
        $this->conn->close();
    }

    function create($data){
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = strlen($value) > 0 ? $value : null;
        }
        // tambahkan data email baru
        $query = "INSERT INTO email VALUES(?, ?, ?, ?, NULL)";
        $sql = $this->conn->prepare($query);
        $sql->bind_param(
            "ssss", 
            $data['InputName'], 
            $data['InputEmail'], 
            $data['InputSubject'], 
            $data['InputMessage']
        );
            try{
                $sql->execute();
            } catch (Exception $e) {
                $sql->close();
                http_response_code(500);
                die($e->getMessage());
            }
            $sql->close();
    }
}

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');
            
    $emailText = "You have a new message from your contact form\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // All the neccessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    // Send email
    // mail($sendTo, $subject, $emailText, implode("\n", $headers));
    $email = new Email();

    $email->create($_POST);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}