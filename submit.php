<?php
// CONFIG FOR EMAILS:
$email_internal_to = 'chancedatingapp@gmail.com';
$external_sender_email = 'noreply@chancedatingapp.com';
$internal_sender_email = 'gimpmaster@chancedatingapp.com';
$internal_sender_name = 'Server';
$external_sender_name = 'Chance Team';
$internal_email_subject = 'New Chance User';
$external_email_subject = 'Subscriber Confirmation';
$external_email_message = file_get_contents('email_template.html');
//END CONFIG

// validation expected data exists
if (!isset($_POST['email'])) {
    died('We are sorry, but there was a problem with the email you entered.');
}
$user_email = $_POST['email']; // required
$error_message = '';
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if (!preg_match($email_exp, $user_email)) {
    $error_message .= 'Submitted email is invalid';
}
if (strlen($error_message) > 0) {
    died($error_message);
}
$email_message = 'Form details below.<br><br>';
function clean_string($string)
{
    $bad = array('content-type', 'bcc:', 'to:', 'cc:', 'href');

    return str_replace($bad, '', $string);
}
$email_message .= 'Email: '.clean_string($user_email);

file_put_contents('email_list.txt', $user_email.PHP_EOL, FILE_APPEND);
// create email headers
email($email_internal_to, $internal_sender_email, $internal_sender_name, $internal_email_subject, $email_message); //internal email
email($user_email, $external_sender_email, $external_sender_name, $external_email_subject, $external_email_message); //external email to user

function email($to, $from, $from_name, $subject, $message)
{
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: "'.$from_name.'" <'.$from.'>';
    $headers[] = 'Reply-To: "'.$from_name.'" <'.$from.'>';
    @mail($to, $subject, $message, implode("\r\n", $headers));
}
function died($error)
{
    ?>

  <html lang="en">
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='keywords' content='Chance, Dating'>
    <meta name='description' content='Serendipity happens.'>
    <meta name='author' content='Jad Chaar'>

    <title>Chance - Serendipity Happens</title>

    <link rel='icon' href='assets/images/favicons/favicon.png'>
    <link rel='mask-icon' href='/assets/images/favicons/safari-pinned-tab.svg' color='#FF7C7F'>

    <link rel='canonical' href='https://chancedatingapp.com/submit.php' />

    <script>
        WebFontConfig = {
            google: {
                families: ['Roboto:300,500']
            }
        };

        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <noscript>
      <link href='https://fonts.googleapis.com/css?family=Roboto:300,500' rel='stylesheet'>
    </noscript>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
    <link href='assets/css/styles.min.css' rel='stylesheet'>
  </head>
  <body id='submission-body'>
    <nav class='navbar navbar-default navbar-fixed-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='https://chancedatingapp.com'>
            <div class='brand-centered'>
              <img class='logo' alt='Chance Logo' src='assets/images/logo.svg' height='40'>
            </div>
          </a>
        </div>
      </div>
    </nav>

    <div style= 'padding: 25px; color: #4FB7FC;' align='center' >
      <h1>Error: <?php echo $error; ?></h1>
      <br />
      <h3>Please resubmit your email</h3>
      <br />
      <img alt='Robot' src='assets/images/robot-submission.svg' id='robot-submission'>
      <br /> <br class='hidden-br'/>
      <a href='https://chancedatingapp.com'><button class='btn btn-default btn-lg'><span class='glyphicon glyphicon-home' aria-hidden='true'></span>&nbsp;&nbsp;Back to Homepage</button></a>
    </div>

  </body>

  </html>

  <?php
  die();
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Chance, Dating">
  <meta name="description" content="Serendipity happens.">
  <meta name="author" content="Jad Chaar">

  <title>Chance - Serendipity Happens</title>

  <link rel="icon" href="assets/images/favicons/favicon.png">
  <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#FF7C7F">

  <link rel="canonical" href="https://chancedatingapp.com/submit.php" />

  <script>
      WebFontConfig = {
          google: {
              families: ['Roboto:300,500']
          }
      };

      (function(d) {
          var wf = d.createElement('script'),
              s = d.scripts[0];
          wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
          s.parentNode.insertBefore(wf, s);
      })(document);
  </script>
  <noscript>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet">
  </noscript>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="assets/css/styles.min.css" rel="stylesheet">
</head>

<body id="submission-body">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="https://chancedatingapp.com">
          <div class="brand-centered">
            <img class="logo" alt="Chance Logo" src="assets/images/logo.svg" height="40">
          </div>
        </a>
      </div>
    </div>
  </nav>

  <div class="submission-page-text">
    <h1>Thank you for your interest in Chance!</h1>
    <h2>Stay tuned for development updates.</h2>
    <br />
    <img alt="Robot" src="assets/images/robot-submission.svg" id="robot-submission">
    <br class="hidden-br"/> <br class="hidden-br"/>
    <a href="https://chancedatingapp.com"><button class="btn btn-default btn-lg"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Back to Homepage</button></a>
  </div>

</body>

</html>
