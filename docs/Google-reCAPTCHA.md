# Setting Up Google reCAPTCHA for Local Development

Google reCAPTCHA is a free service that helps protect your website from spam and abuse. Follow these steps to generate the site key and secret key for local development:

### Step 1: Register a New Site

1. Go to [reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin/create).
2. Enter a label for your site (e.g., example.com).
3. Choose the reCAPTCHA type based on your requirements:
   - **Score based (v3):** Verify requests with a score.
   - **Challenge (v2):** Verify requests with a challenge.
   - **"I'm not a robot" Checkbox:** Validate requests with the checkbox.
   - **Invisible reCAPTCHA badge:** Validate requests in the background.
4. Enter the domains you want to use reCAPTCHA with (e.g., localhost, 127.0.0.1).
5. Click on "Submit" to register your site.

### Step 2: Generate Keys

1. After registering your site, you'll be provided with the site key and secret key.
2. Copy the site key and secret key and save them in a secure location.
3. Use these keys in your local development environment to integrate reCAPTCHA with your website forms.

### Important Notes:
- Ensure that you select the appropriate reCAPTCHA type based on your integration needs.
- Use the provided keys only for local development purposes.
- When deploying your website to production, remember to obtain new keys from the reCAPTCHA Admin Console and update them in your application configuration.

That's it! You've successfully set up Google reCAPTCHA for local development. Now, your website forms are protected from spam and abuse.