<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'raphael.feitoza@grcsolutions.com.br';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  //$contact->subject = $_POST['subject'];
  $contact->subject = 'Nova mensagem de contato através do site';

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'De');
  $contact->add_message( $_POST['enterprise'], 'Empresa');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['phone'], 'Telefone/Celular');
  $contact->add_message( $_POST['message'], 'Demanda / Objetivo', 10);

  echo $contact->send();
?>