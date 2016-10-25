<?php
  define( 'WP_USE_THEMES', FALSE );
  require( '../../../wp-load.php' );

if($_POST) {
  $to_Email = "info@spirecreative.com";
  $subject = 'Spire Web Message';

  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

    $output = json_encode(
    array(
      'type'=>'error',
      'text' => 'Request must come from Ajax'
    ));

    die($output);
  }

  if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userMsg"])) {
    $output = json_encode(array('type'=>'error', 'text' => 'There are some errors in your form.'));
    die($output);
  }
  $user_Name = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
  $user_Email = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
  $user_Subject = filter_var($_POST["userSubject"], FILTER_SANITIZE_STRING);
  $user_Message = filter_var($_POST["userMsg"], FILTER_SANITIZE_STRING);

  $user_Message = str_replace("\&#39;", "'", $user_Message);
  $user_Message = str_replace("&#39;", "'", $user_Message);

  if(strlen($user_Name)<4) {
    $output = json_encode(array('type'=>'error', 'text' => '<strong>Full name is required</strong>'));
    die($output);
  }
  if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
    $output = json_encode(array('type'=>'error', 'text' => '<strong>Valid E-mail is required</strong>'));
    die($output);
  }
  if(strlen($user_Message)<6) {
    $output = json_encode(array('type'=>'error', 'text' => '<strong>Message is too short</strong>'));
    die($output);
  }


  $headers = 'From: '.$user_Email.'' . "\r\n" .
  'Reply-To: '.$user_Email.'' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $sentMail = @wp_mail($to_Email, $user_Subject.' - '.$subject, 'Name: '.$user_Name. "\r\n". 'E-mail: '.$user_Email. "\r\n\n".'--'."\r\n".$user_Message, $headers);

  if(!$sentMail) {
    $output = json_encode(array('type'=>'error', 'text' => '<strong>Failed to send message!</strong>'));
    die($output);
  } else {

    $resp_headers = 'From: '.$to_Email.'' . "\r\n" .
    'Reply-To: '.$to_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $output = json_encode(array('type'=>'message', 'text' => '<strong>Dear '.$user_Name .'</strong><br>Your message has been successfully sent. We will contact you very soon!'));
    die($output);
  }
}

?>