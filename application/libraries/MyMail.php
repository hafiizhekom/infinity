<?php

require_once dirname(__FILE__) . '/PHPMailer/PHPMailerAutoload.php';

class MyMail extends PHPMailer { 
    public function __construct() { 
        parent::__construct(); 
    } 

    public function mailjoin($isi){
        $this->isSMTP();                            // Set mailer to use SMTP
$this->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$this->SMTPAuth = true;                     // Enable SMTP authentication
$this->Username = 'teknikinformatika.kalbis@gmail.com';          // SMTP username
$this->Password = 'whosinabunkerwhosinabunker'; // SMTP password
$this->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$this->Port = 587;                          // TCP port to connect to

$this->setFrom('teknikinformatika.kalbis@gmail.com', 'Infinity Website Bot');
$this->addReplyTo('teknikinformatika.kalbis@gmail.com', 'Infinity Website Bot');
$this->addAddress('infinitykalbis@gmail.com');   // Add a recipient
//$this->addCC('cc@example.com');
//$this->addBCC('bcc@example.com');

$this->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>INFINITY REGISTRATION</h1>';
$bodyContent .= '<p>'.$isi.'</p>';

$this->Subject = 'INFINITY REGISTRATION';
$this->Body    = $bodyContent;

if(!$this->send()) {
    return false;
} else {
    return true;
}
    }

    public function replyfeedback($to, $isi){
    	$this->isSMTP();                            // Set mailer to use SMTP
$this->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$this->SMTPAuth = true;                     // Enable SMTP authentication
$this->Username = 'teknikinformatika.kalbis@gmail.com';          // SMTP username
$this->Password = 'whosinabunkerwhosinabunker'; // SMTP password
$this->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$this->Port = 587;                          // TCP port to connect to

$this->setFrom('teknikinformatika.kalbis@gmail.com', 'Admin Infinity');
$this->addReplyTo('teknikinformatika.kalbis@gmail.com', 'Admin Infinity');
$this->addAddress($to);   // Add a recipient
//$this->addCC('cc@example.com');
//$this->addBCC('bcc@example.com');

$this->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>INFINITY REPLY FEEDBACK</h1>';
$bodyContent .= '<p>'.$isi.'</p>';

$this->Subject = 'INFINITY REPLY FEEDBACK';
$this->Body    = $bodyContent;

if(!$this->send()) {
    return false;
} else {
    return true;
}
    }


    public function mailfeedbacknotif($emailfrom, $namafrom, $isi){
    	$this->isSMTP();                            // Set mailer to use SMTP
$this->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$this->SMTPAuth = true;                     // Enable SMTP authentication
$this->Username = 'teknikinformatika.kalbis@gmail.com';          // SMTP username
$this->Password = 'whosinabunkerwhosinabunker'; // SMTP password
$this->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$this->Port = 587;                          // TCP port to connect to

$this->setFrom('teknikinformatika.kalbis@gmail.com', 'Infinity Website Bot');
$this->addReplyTo($emailfrom, $namafrom);
$this->addAddress('infinitykalbis@gmail.com');   // Add a recipient

//$this->addCC('cc@example.com');
//$this->addBCC('bcc@example.com');

$this->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>INFINITY FEEDBACK</h1>';
$bodyContent .= '<p>Feedback dari '.$namafrom.' ('.$emailfrom.')</p><br><p>'.$isi.'</p>';

$this->Subject = 'INFINITY FEEDBACK';
$this->Body    = $bodyContent;

if(!$this->send()) {
    return false;
} else {
    return true;
}
    }


    public function testing(){
$this->isSMTP();                            // Set mailer to use SMTP
$this->Host = 'ssl://smtp.gmail.com';             // Specify main and backup SMTP servers
$this->SMTPAuth = true;                     // Enable SMTP authentication
$this->Username = 'teknikinformatika.kalbis@gmail.com';          // SMTP username
$this->Password = 'whosinabunkerwhosinabunker'; // SMTP password
$this->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$this->Port = 587;                          // TCP port to connect to

$this->setFrom('info@codexworld.com', 'CodexWorld');
$this->addReplyTo('info@codexworld.com', 'CodexWorld');
$this->addAddress('hafiizhekom@gmail.com');   // Add a recipient
$this->addCC('cc@example.com');
$this->addBCC('bcc@example.com');

$this->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$this->Subject = 'Email from Localhost by CodexWorld';
$this->Body    = $bodyContent;

if(!$this->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $this->ErrorInfo;
} else {
    echo 'Message has been sent';
}
    }
}