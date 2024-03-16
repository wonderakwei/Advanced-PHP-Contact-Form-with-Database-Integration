# PHPMailer: Send Emails Using PHP and Gmail SMTP

This repository provides a guide and code examples for sending emails using PHPMailer library with Gmail SMTP. PHPMailer is a popular library for sending emails securely and efficiently in PHP applications.

## Installation

To get started, install the PHPMailer library using Composer. Add the following line to your `composer.json` file:

```json
"phpmailer/phpmailer": "^6.8"
```

Then, run Composer's install command:

```bash
composer require phpmailer/phpmailer
```

## Usage

### Gmail SMTP Configuration

Before sending emails with PHPMailer, configure Gmail SMTP settings. You can use either less secure app access, 2-Step Verification with an app password, or OAuth2.

#### Less Secure App Access (Deprecated)

Enable less secure app access in your Google account security settings. Note that this option is deprecated and less recommended.

#### 2-Step Verification with App Password

If you have 2-Step Verification enabled for your Gmail account, generate an App password to use with PHPMailer.

#### OAuth2

OAuth2 is the recommended method for authenticating PHPMailer with Gmail. Obtain a Google client ID and client secret, and follow the OAuth2 authentication process.

### Sending Emails

After configuring Gmail SMTP, use PHPMailer to send emails. Below is a basic example:

```php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
// Set SMTP configuration
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your_email@gmail.com';
$mail->Password = 'your_app_password';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

// Set sender and recipient
$mail->setFrom('your_email@gmail.com', 'Your Name');
$mail->addAddress('recipient@example.com', 'Recipient Name');

// Set email content
$mail->isHTML(true);
$mail->Subject = 'Test Email';
$mail->Body = 'This is a test email sent using PHPMailer and Gmail SMTP.';

// Send email
if (!$mail->send()) {
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent successfully!';
}
```

## Additional Resources

- [Composer Download](https://getcomposer.org/download/)
- [PHPMailer GitHub Repository](https://github.com/PHPMailer/PHPMailer)
- [PHPMailer with Gmail SMTP Tutorial](https://mailtrap.io/blog/phpmailer-gmail/)
- [Stack Overflow: PHP Zip Extension Missing](https://stackoverflow.com/questions/41274829/php-error-the-zip-extension-and-unzip-command-are-both-missing-skipping)
- [Stack Overflow: Recaptcha Not Verifying with file_get_contents](https://stackoverflow.com/questions/43528882/recaptcha-not-verifying-with-file-get-contents)

## Limitations and Issues

Before deploying an application using PHPMailer with Gmail SMTP, consider the limitations and possible issues to ensure smooth email delivery and avoid SMTP errors.