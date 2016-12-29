<?php
if(isset($_POST['email'])) {
  // CONFIG FOR EMAILS:
  $email_internal_to = "chancedatingapp@gmail.com";
  $external_sender_email = "noreply@chancedatingapp.com";
  $internal_sender_email = "gimpmaster@chancedatingapp.com";
  $internal_sender_name = "Server";
  $external_sender_name = "Chance Team";
  $internal_email_subject = "New Chance User";
  $external_email_subject = "Chance App";
  $external_email_message = "Hello and thanks for your interest in chance.  This email confirms that we know you are interested in our application.  We'll let you know as soon as we release the app";
  //END CONFIG

  function died($error) {
    // your error code can go here
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
  }
  // validation expected data exists
  if(!isset($_POST['email'])) {
    died('We are sorry, but there appears to be a problem with the form you submitted.');
  }
  $user_email = $_POST['email']; // required
  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$user_email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
  $email_message = "Form details below.\n\n";
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }
  $email_message .= "Email: ".clean_string($user_email)."\n";

  file_put_contents('email_list.txt', $user_email.PHP_EOL , FILE_APPEND);
  // create email headers
  email($email_internal_to,$internal_sender_email,$internal_sender_name,$internal_email_subject,$email_message); //internal email
  email($user_email,$external_sender_email,$external_sender_name,$external_email_subject,$external_email_message); //external email to user
}else{
  die(); //if we die the html below is not printed.
}
function email($to,$from,$from_name,$subject,$message){
  $headers = 'From: "'.$from_name.'" <'.$from.">\r\n".
  'Reply-To: "'.$from_name.'" <'.$from.">\r\n".
  'X-Mailer: PHP/' . phpversion();
  @mail($to,$subject,$message,$headers);
}
?>
<!-- Added basic styling copy-pasted from index.html so page doesn't look like shit... should probably improve it-->
<html>
<head>
  <title>Chance - Serendipity Happens</title>
  <link rel="icon" href="assets/images/favicons/favicon.png">
  <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#FF7C7F">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
  <script>
  WebFont.load({
    google: {
      families: ["Roboto: 100,300,500"]
    }
  });
  </script>
  <!-- Fallback for fonts if someone has scripts disabled -->
  <noscript>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,500" rel="stylesheet">
  </noscript>
</head>
<body style="text-align:center;font-family:Roboto">
  <div class="navbar-header">
    <a class="navbar-brand" href="https://chancedatingapp.com">
      <div class="brand-centered">
        <img class="logo" alt="Chance Logo" src="assets/images/logo.svg" height="40">
      </div>
    </a>
  </div>
  <div style="text-align:left;margin-left:20vw;margin-right:20vw;margin-top:20vh;">
    &emsp;Thank you for your interest in Chance!  You should have just received an email confirming your interest.
    If you don't see this email, something went wrong and you should enter your name again.
    We'll make sure to contact you when the app is launched.
  </div>
  <br><br>
  <a href="index.html">Click here to go back</a>
</body>
</html>
