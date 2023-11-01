<?php
require_once 'env.php';
require_once (__DIR__ . '/vendor/autoload.php');
require_once 'brevomail.php';
require_once 'db_functions.php';
$conn = connectDB();

if (isset($_POST['send_url'])) {
    $emails = $_POST['checkbox_values'];
    $podioLink = $_POST['podio_link'];
    
    foreach ($emails as $email) {
        
        $token = bin2hex(random_bytes(32));
        // $url = "https://recoureopro.com/survey/survey.php?validator=" . $token;
        $url = "http://localhost/survey/survey.php?validator=" . $token;
        $expires = 'DATE_ADD(NOW(), INTERVAL 1 HOUR)';
        $query = $conn->prepare("INSERT INTO survey_tokens (email, token, podio_link, created_at, expires_at)
                                VALUES (:email, :token, :podio_link, NOW(), " . $expires . ") ON DUPLICATE KEY UPDATE token = VALUES(token), podio_link = VALUES(podio_link)");
            $query->execute([
                "email" => $email,
                "token" => $token,
                "podio_link" => $podioLink
                
                
            ]);
        

        $sendmailer = new Emailsend(BREVO_API_KEY);
        try {

            $fullname = 'You';
            $recipient = $email;
            
            $emailContent = "
            <body style='font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px;'>
                <div class='container' style='background-color: #ffffff; padding: 20px; max-width: 600px; margin: auto; border-radius: 5px;'>
                    <p>Hello, Welcome to the survey channel!</p>
                    <p>Please, check the Podio Link below before taking the survey</p>
                    <p>Podio Link: " .$podioLink. "</p>
                    <br>
                    <a href='" . $url . "' class='btn' style='display: inline-block; background-color: #007BFF; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;' onmouseover='this.style.backgroundColor='#0056b3';' onmouseout='this.style.backgroundColor='#007BFF';'>Attend the survey</a>
                </div>
            </body>
            ";
            $sendmailer->sendNotification($recipient, $fullname, $emailContent);
            header("Location: index.php");
        } catch (Exception $e) {

            // for public use
            $_SESSION['STATUS']['mailstatus'] = 'message could not be sent, try again later';

            // for development use
            // $_SESSION['STATUS']['mailstatus'] = 'message could not be sent. ERROR: ' . $mail->ErrorInfo;

            header("Location: index.php");
            exit();
        }
    }
} else {
    echo "No checkboxes were selected.";
}
