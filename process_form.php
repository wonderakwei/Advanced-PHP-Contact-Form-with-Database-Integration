<?php
// Verify if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Verify CSRF token
    session_start();
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed");
    }

    // Verify CAPTCHA response
    $response = $_POST['g-recaptcha-response'];
    $secretKey = ""; // Your secret key here

    // Initialize cURL session
    $ch = curl_init();
    // Set cURL options
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => [
            'secret' => $secretKey,
            'response' => $response,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ],
        CURLOPT_RETURNTRANSFER => true
    ]);
    // Execute cURL session
    $output = curl_exec($ch);
    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $json = json_decode($output);

    // Check CAPTCHA response
    if (isset($json->success) && $json->success) {
        echo 'CAPTCHA verification successful';
    } else {
        echo 'CAPTCHA verification failed';
    }

    // Validate input
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Sanitize input
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $message = htmlspecialchars($message);

    // Database connection parameters
    $servername = "";
    $username = "";
    $password = '';
    $db_name = "";
    $port = '';

    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $db_name, $port);
    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();

} 
?>

<?php

    // Send notification email to the admin 
    
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Load Composer's autoloader
    require 'vendor/autoload.php';
    
    try {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
    
        // Set mailer to use SMTP
        $mail->isSMTP();
        // Set charset to utf8
        $mail->CharSet = "utf-8";
        // Enable SMTP authentication
        $mail->SMTPAuth = true;
        // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = 'tls';
        // Specify main and backup SMTP servers
        $mail->Host = 'smtp.gmail.com';
        // TCP port to connect to
        $mail->Port = 587;
        // Set email format to HTML
        $mail->isHTML(true);
    
        // SMTP username
        $mail->Username = 'example@gmail.com';
        // SMTP password
        $mail->Password = '';
    
        // Your application NAME and EMAIL
        $mail->setFrom('email address', 'username');
        // Message subject
        $mail->Subject = 'New Message from Contact Form';
        // Message body
        $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";
        // Target email
        $mail->addAddress('email address', 'username');
    
        // Send email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        // Display error message if email could not be sent
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    // Close SMTP connection
    $mail->smtpClose();
    
    
    // Redirect to thank you page
    header("Location: thank_you.php");
    exit();

?>
