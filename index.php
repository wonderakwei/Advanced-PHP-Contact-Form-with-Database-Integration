
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Contact Us</h2>
                    </div>
                    <div class="card-body">
                        <form id="contactForm" method="post" action="process_form.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Your Message" required></textarea>
                            </div>
                            <!-- CSRF Token -->
                            <?php
                                session_start();
                                $token = bin2hex(random_bytes(32));
                                $_SESSION['csrf_token'] = $token;
                            ?>
                            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                            <!-- Google reCAPTCHA -->
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey=""></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name = "submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>
