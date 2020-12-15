<?php include 'inc/connection.php';

if(isset($_POST['submit']))
{

  require 'inc/phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

$name =  trim(filter_input(INPUT_POST,"name", FILTER_SANITIZE_STRING));

$email = trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));
$subject = trim(filter_input(INPUT_POST,'subject', FILTER_SANITIZE_STRING));
$body = trim(filter_input(INPUT_POST,'body', FILTER_SANITIZE_SPECIAL_CHARS));
//$uploaded_file = $_REQUEST['uploaded_file'];

if($name == "" || $email == "" || $subject == "" || $body == "" )
{
  $error_message = "Please fill in the required fields: Name, E-mail, Subject, Body";
}
if(!isset($error_message) && $_POST['address'] != "")
{
  $error_message = "No Spam Bots Allowed!";
}
if(!isset($error_message) && (!$mail->ValidateAddress($email)))
{
  $error_message = "Invalid Email Address.";
}

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
if(!isset($error_message))
{
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'coloredupeducation@gmail.com';                 // SMTP username
$mail->Password = 't1219898';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($email, 'Mailer');
$mail->addAddress('coloredupeducation@gmail.com', 'Joshua Kaufman');     // Add a recipient
$mail->addReplyTo($email, $name);


// $if (isset($_FILES['file']) &&
//     $_FILES['file']['error'] == UPLOAD_ERR_OK)
//      {
$mail->AddAttachment( $_FILES['attachment']['tmp_name'], $_FILES['attachment']['name'] );
// }
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = 'From: ' . $name . '<br>' . $body;
$mail->AltBody = 'From: ' . $name . "\n" . $body;

if(!$mail->send()) {
       $error_message = 'Message could not be sent.';
       $error_message .= 'Mailer Error: ' . $mail->ErrorInfo;
   }
   $name = "";
   $email = "";
   $subject = "";
   $body = "";
}
}
?>

<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'inc/styles.php'; ?>
 <title>Contact</title>
</head>
<body>
<?php include 'inc/nav.php'; ?>
<div class="container">
    <h1 class="nice">Contact: Fill out your info and hit send!</h1>
      <div class="jumbotron">
<p>
Here are some reasons that will definitely grant you a response:
<ol>
<li class="red">Request live help from staff</li>
<li class="orange">Submit a new drawing to the website</li>
<li class="yellow">Contribute a lesson or other education material</li>
<li class="green">Suggest a new subject or lesson to include in the library</li>
<li class="blue">Get online credit for lesson, material, or drawing you authored <u class="black">(Proof Required)</u></li>
<li class="purple">General issues, comments, feedback about <b class="red">C</b><b class="green">U</b><b class="blue">E</b></li>
<li class="magenta">Join the <b class="red">C</b><b class="green">U</b><b class="blue">E</b> team <b class="black">*This site is <u>nonprofit</u>*</b></li>
<li class="brown">Personal questions to Joshua Kaufman</li>
<li class="black">Bugs &amp; Technical Issues</li>
</ol>
<hr>
</p>
<?php if (isset($_POST['submit']) && (!isset($error_message))) {
    echo '<p class="alert alert-success center-block text-center">Thanks for reaching out! I will be in touch!<br><a href="home.php" class="center-block btn btn-lg btn-info">Click To Return Home</a></p>';
} else {
    if (isset($error_message)) {
        echo '<p class="alert alert-danger center-block text-center">'.$error_message . '</p>';
    } else {
        echo '<p class="alert alert-info center-block text-center">Looking forward to hearing from you!</p>';
    }
  }
?>
<form class="form" action="contact.php" method="post" enctype="multipart/form-data">
<div class="form-group row">
  <label for="name" class="col-sm-2">Name:</label>
    <div class="col-sm-10"><input type="text" name="name" id="name" class="form-control" required value="<?php if (isset($name)) { echo $name; } ?>" >
</div>
</div>
<div class="form-group row">
    <label for=email class="col-sm-2">E-mail:</label>
<div class="col-sm-10">
    <input type="text" name="email" id="email" class="form-control" required value="<?php if (isset($email)) { echo $email; } ?>" >
</div>
</div>
<div class="form-group row">
      <label for="subject" class="col-sm-2">Subject:</label>
<div class="col-sm-10">
      <input type="text" name="subject" id="subject" class="form-control" required value="<?php if (isset($subject)) { echo $subject; } ?>" >
    </div>
  </div>
<div class="form-group row">
  <div class="col-sm-12">
      <label for="body">Body: </label><textarea name="body" id="body" class="form-control" rows="6" required><?php if (isset($body) && ($body != "")) { echo htmlspecialchars($_POST["body"]); } ?></textarea>
</div>
</div>
<div class="form-group row">
<input type="file" name="attachment" class="btn btn-lg" id="attachment">
</div>
  <p style="display:none">
                <label for="address">Address</label>
                <input type="text" name="address" id="Address" />
                <q>Please leave this field blank</q></p>

      <button type="submit" name="submit" value="submit" class="btn btn-lg btn-success center-block">Send</button>
    </form>

</div>
</div>

<?php include 'inc/scripts.php'; ?>
</body>
</html>
