<?php
class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $smtp;
  public $ajax;
  private $messages = array();

  public function add_message($content, $label, $priority = 0) {
    $this->messages[] = array(
      'content' => $content,
      'label' => $label,
      'priority' => $priority
    );
  }

  public function send() {
    $headers = 'From: ' . $this->from_name . ' <' . $this->from_email . '>' . "\r\n";
    $headers .= 'Reply-To: ' . $this->from_email . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    $message = '';
    foreach ($this->messages as $msg) {
      $message .= $msg['label'] . ": " . $msg['content'] . "\n";
    }

    if (!empty($this->smtp)) {
      // Implement SMTP sending here if needed
    }

    return mail($this->to, $this->subject, $message, $headers);
  }
}
?>
