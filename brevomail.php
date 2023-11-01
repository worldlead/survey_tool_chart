<?php
require_once(__DIR__ . '/vendor/autoload.php');

use GuzzleHttp\Guzzle\Client;

class Emailsend{
  private $config;
  private $apiInstance;
  private $sendSmtpEmail;
  public function __construct($apiKey){
    $this->config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);
    $this->apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
      new GuzzleHttp\Client(),
      $this->config
    );
    $this->sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail();
  }
  

  public function sendNotification($recipient, $fullname, $emailContent, $attachmentUrl='', $docName='', $subject='survey taking'){
    $this->sendSmtpEmail['subject'] = $subject;
    $this->sendSmtpEmail['htmlContent'] = $emailContent;
    $this->sendSmtpEmail['sender'] = array('name' => 'keni', 'email' => 'pro@recoureo.com');
    $this->sendSmtpEmail['to'] = array(
      array('email' => $recipient, 'name' => $fullname)
    );
    $this->sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
    if ($attachmentUrl !='') {
      $this->sendSmtpEmail['attachment'] = array(array('url' => $attachmentUrl, 'name' => $docName));
    }
    $this->mainSender();
  }

  
  private function mainSender(){
    try {
        $result = $this->apiInstance->sendTransacEmail($this->sendSmtpEmail);
        echo "Email sent successfully!";
        
    } catch (Exception $e) {
        echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
    }
  }
}

?>