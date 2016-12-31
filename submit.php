<?php
<<<<<<< HEAD
if (isset($_POST['email'])) {
    // CONFIG FOR EMAILS:
  $email_internal_to = 'chancedatingapp@gmail.com';
    $external_sender_email = 'noreply@chancedatingapp.com';
    $internal_sender_email = 'gimpmaster@chancedatingapp.com';
    $internal_sender_name = 'Server';
    $external_sender_name = 'Chance Team';
    $internal_email_subject = 'New Chance User';
    $external_email_subject = 'Chance App';
    $external_email_message = "Hello and thanks for your interest in chance.  This email confirms that we know you are interested in our application.  We'll let you know as soon as we release the app";
  //END CONFIG

  function died($error)
  {
      // your error code can go here
      echo"<!DOCTYPE html>
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

          <script src='https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'></script>
          <script>
              WebFont.load({
                  google: {
                      families: ['Roboto: 100,300,500']
                  }
              });
          </script>
          <noscript>
            <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,500' rel='stylesheet'>
          </noscript>
          <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
          <link href='assets/css/styles.min.css' rel='stylesheet'>
      </head>";
      echo "
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
    </nav>";
=======
// CONFIG FOR EMAILS:
$email_internal_to = 'chancedatingapp@gmail.com';
$external_sender_email = 'noreply@chancedatingapp.com';
$internal_sender_email = 'gimpmaster@chancedatingapp.com';
$internal_sender_name = 'Server';
$external_sender_name = 'Chance Team';
$internal_email_subject = 'New Chance User';
$external_email_subject = 'Subscriber Confirmation';
$external_email_message = "Hello and thanks for your interest in chance.  This email confirms that we know you are interested in our application.  We'll let you know as soon as we release the app";
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
$email_message = "Form details below.\n\n";
function clean_string($string)
{
  $bad = array('content-type', 'bcc:', 'to:', 'cc:', 'href');
>>>>>>> dfdab89301d282897a3b55ff3cf8c59f14c69380

  return str_replace($bad, '', $string);
}
$email_message .= 'Email: '.clean_string($user_email)."\n";

file_put_contents('email_list.txt', $user_email.PHP_EOL, FILE_APPEND);
// create email headers
email($email_internal_to, $internal_sender_email, $internal_sender_name, $internal_email_subject, $email_message); //internal email
email($user_email, $external_sender_email, $external_sender_name, $external_email_subject, $external_email_message); //external email to user

function email($to, $from, $from_name, $subject, $message)
{
  $headers = 'From: "'.$from_name.'" <'.$from.">\r\n".
  'Reply-To: "'.$from_name.'" <'.$from.">\r\n".
  'X-Mailer: PHP/'.phpversion();
  @mail($to, $subject, $message, $headers);
}
<<<<<<< HEAD
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Chance, Dating">
    <meta name="description" content="Serendipity happens.">
    <meta name="author" content="Jad Chaar">
=======
function died($error)
{
  ?>
  <html>
  <head>
    <!-- Metadata for website (primarily for search engine crawlers) -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='keywords' content='Chance, Dating'>
    <meta name='description' content='Serendipity happens.'>
    <meta name='author' content='Jad Chaar'>
>>>>>>> dfdab89301d282897a3b55ff3cf8c59f14c69380

    <title>Chance - Serendipity Happens</title>

    <link rel='icon' href='assets/images/favicons/favicon.png'>
    <link rel='mask-icon' href='/assets/images/favicons/safari-pinned-tab.svg' color='#FF7C7F'>

    <link rel='canonical' href='https://chancedatingapp.com/submit.php' />

<<<<<<< HEAD
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
=======
    <script src='https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'></script>
>>>>>>> dfdab89301d282897a3b55ff3cf8c59f14c69380
    <script>
    WebFont.load({
      google: {
        families: ['Roboto: 100,300,500']
      }
    });
    </script>
    <noscript>
      <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,500' rel='stylesheet'>
    </noscript>
<<<<<<< HEAD
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
=======
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
    <link href='assets/css/styles.min.css' rel='stylesheet'>

    <style>
    </style>
  </head>
  <body id='submission-body'>
    <nav class='navbar navbar-default navbar-fixed-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='https://chancedatingapp.com'>
            <div class='brand-centered'>
              <img class='logo' alt='Chance Logo' src='assets/images/logo.svg' height='40'>
>>>>>>> dfdab89301d282897a3b55ff3cf8c59f14c69380
            </div>
          </a>
        </div>
      </div>
    </nav>
    <div style= 'padding: 25px; color: #4FB7FC;' align='center' >
      <h1>Error: <?php echo $error; ?></h1><br><h3>Please resubmit your email</h3><br><img alt='Robot' src='assets/images/robot-submission.svg' id='robot-submission'>
      <br class='hidden-br'/> <br class='hidden-br'/>
      <a href='https://chancedatingapp.com'><button class='btn btn-default btn-lg'><span class='glyphicon glyphicon-home' aria-hidden='true'></span>&nbsp;&nbsp;Back to Homepage</button></a>
    </div>
  </body>
  </html>

  <?php
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Metadata for website (primarily for search engine crawlers) -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Chance, Dating">
  <meta name="description" content="Serendipity happens.">
  <meta name="author" content="Jad Chaar">

  <title>Chance - Serendipity Happens</title>

  <link rel="icon" href="assets/images/favicons/favicon.png">
  <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#FF7C7F">

  <link rel="canonical" href="https://chancedatingapp.com/submit.php" />

  <!-- Load the font using Google WebFont Loader -->
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
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Minified CSS for deployment -->
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
