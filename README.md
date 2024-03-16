**# Contact Form with PHP Backend and Email Notification**

![Contact Form](images/send-message.jpg)

## Contact-Us-Form-with-PHP-Backend-MySQL-Google-reCAPTCHA-Integration-and-Email-Notification

**Description:**

This Secure Contact Form System is an advanced PHP-based solution designed to provide a secure and robust way for users to send inquiries or messages through a company website. This project includes features such as database integration, server-side validation, sanitization, CSRF protection, and Google reCAPTCHA implementation to ensure data integrity and prevent common security vulnerabilities.

**Features:**

- **Database Integration**: Messages submitted through the contact form are securely stored in a MySQL database for future reference.
- **Server-side Validation**: Basic validation is implemented to ensure that user input meets certain criteria, such as validating email addresses.
- **Sanitization**: User input is sanitized using `htmlspecialchars()` to prevent XSS (Cross-Site Scripting) attacks.
- **CSRF Protection**: CSRF (Cross-Site Request Forgery) tokens are generated and verified to prevent unauthorized form submissions.
- **CAPTCHA**: Integration with Google reCAPTCHA provides an additional layer of security to prevent automated submissions by bots.
- **Responsive Design**: The contact form is designed to be responsive and user-friendly across various devices and screen sizes.
- **Thank You Page**: Upon successful submission, users are redirected to a thank you page to acknowledge their message.

**Folder Structure:**

```
Folder Structure:
- **css:** Contains CSS files for styling the contact form.
- **docs:** Markdown files containing explanations on how to set up PHPMailer, Google reCAPTCHA, and CSRF protection.
- **images:** Screenshots of the index.php page and other pages.
- **js:** Includes JavaScript files for client-side functionality.
- **vendor:** Contains third-party libraries like PHPMailer.
- **index.php:** PHP file for the contact form interface.
- **process_form.php:** PHP file for processing form submissions and sending email notifications.
- **README.md:** Documentation file explaining project setup and usage.
- **tables.sql:** SQL file for creating the database table in MySQL.
- **thank_you.php:** PHP file for the thank you page.
```

**Technologies Used:**

- PHP
- MySQL
- Bootstrap
- Google reCAPTCHA
- PHPMailer
- phpMyAdmin
- XAMPP

**Usage:**

1. Clone or download the project files to your local machine.
2. Set up a MySQL database and update the database configuration in `process_form.php` with your database credentials.
3. [Create Google reCAPTCHA site and secret keys using the guide in the docs folder](docs/Google-reCAPTCHA.md).
4. Replace the site key in the `index.php` and secret key in `process_form.php`.
5. Upload the project files to your web server (e.g., via htdocs).
6. Access the `index.php` file in your web browser to view and use the contact form.
7. Upon form submission, messages will be stored in the database, and an email notification will be sent to the specified admin address.
8. Customize the project as needed by modifying the HTML, CSS, JavaScript, and PHP files.

**License:**

This project is licensed under the [MIT License](LICENSE).

---
