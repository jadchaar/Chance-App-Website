<?php
$contents = file_get_contents("email_list.txt");
email("chancedatingapp@gmail.com","gimpmaster@chancedatingapp.com","Server","Email List",$contents);
function email($to,$from,$from_name,$subject,$message){
  $headers = 'From: "'.$from_name.'" <'.$from.">\r\n".
  'Reply-To: "'.$from_name.'" <'.$from.">\r\n".
  'X-Mailer: PHP/' . phpversion();
  @mail($to,$subject,$message,$headers);
}
echo 'Full email list sent to "chancedatingapp@gmail.com"';
?>
