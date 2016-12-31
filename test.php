<?php
//JAD - change the first parameter of this function to your email to send the email that clients recieve when they opt-in to your personal email
email("ramicaza@gmail.com", "gimpmaster@chancedatingapp.com", "Server", "Hue", file_get_contents("email_template.html")); //external email to user
//echo $html_string;
function email($to, $from, $from_name, $subject, $message){
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';
  $headers[] = 'From: "'.$from_name.'" <'.$from.'>';
  $headers[] = 'Reply-To: "'.$from_name.'" <'.$from.'>';
  @mail($to, $subject, $message, implode("\r\n", $headers));
}
?>
