<!DOCTYPE html>
<html lang="en">

<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require_once 'header.php';
require_once 'database_handler.php';
require_once 'constants.php';

if (empty($_POST)) die('Submit the exam first!');

$userInformation = (object) [
  'full_name' => $_POST['full_name'],
  'email' => $_POST['email'],
  'id_card' => $_POST['id_card'],
  'exam_data' => implode('-', $_POST['exam_data'])
];

$examFields = explode('-', $_POST['fields']);
$examResults = $_POST['exam_data'];

$emailBody = "\n";

foreach ($examResults as $index => $result) {
  $emailBody .= "Result #$index (" . $examFields[$index] . "): " . $result . "\n";
}

$database = new DatabaseHandler();

$databaseMessage = $database->persistUser($userInformation);
$emailMessage = '';

$email = new PHPMailer();
$email->isSMTP();
$email->SMTPAuth = true;
$email->Host = 'ssl://smtp.gmail.com';
$email->Port = 465;

$email->setFrom(EMAIL, 'Clinical Lab');
$email->Username = EMAIL;
$email->Password = EMAIL_PASSWORD;
$email->Subject = 'Exam Results for ' . $userInformation->full_name;

$email->Body = $emailBody;
$email->addAddress($userInformation->email);

if (!$email->Send()) {
  $emailMessage = 'Error sending email.';
} else {
  $emailMessage = 'Email sent to ' . $userInformation->email;
}
?>

<body>
  <main class="w-6/12 m-auto p-2">
    <div class="text-center border-2 border-gray-300 rounded-md m-5 p-3">
      <h2 class="text-xl my-7">
        <?php echo $databaseMessage; ?>
      </h2>

      <h3 class="text-xl my-4">
        <strong><?php echo $emailMessage; ?></strong>
      </h3>

      <em class='text-sm'>No pude generar el PDF, por esto la información va directamente en el cuerpo del email.</em>
      <p class="italic opacity-75 my-6">Manuel Zapata - 27.971.134 - N1013</p>
    </div>
  </main>
</body>

</html>