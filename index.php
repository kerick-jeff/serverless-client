<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Serverless Architecture</title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">

        <!-- Some styling for our application -->
        <style type="text/css">
            html, body {
                height: 100%;
            }

            body {
                display: flex;
                flex-flow: column;
                align-items: center;
                justify-content: center;
            }

            .info {
                padding: 25px;
                border-radius: 4px;
                color: #ffffff;
                font-size: 1em;
                margin-bottom: 5vh;
                text-align: center;
            }

            .info.info-success {
                background-color: #28a745;
                border: 1px solid #28a745;
            }

            .info.info-error {
                background-color: #dc3545;
                border: 1px solid #dc3545;
            }

            h3 {
                color: #007bff;
            }

            form {
                padding: 25px;
                border: 1px solid #cccccc;
                background-color: #f4f4f4;
                border-radius: 4px;
            }

            form input, form button {
                font-size: 1em;
                padding: 8px 16px;
                border-radius: 4px;
            }

            form input {
                color: #555555;
                border: 1px solid #f4f4f4;
            }

            form button {
                color: #ffffff;
                margin-top: 2vh;
                background-color: #007bff;
                border: 1px solid #007bff;
            }

            form button:hover {
                background-color: #f4f4f4;
                color: #555555;
            }
        </style>

        <!-- Include Google Recaptcha Javscript API -->
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>

        <!-- A little JavaScript to handle clientside interactions -->
        <script type="text/javascript">
            // Run when the page loads
            window.addEventListener('load', () => {
                // Detect the user's userAgent
                const userAgent = window.navigator.userAgent;

                // Set the dataForm action attribute
                document.dataForm.action = 'https://us-central1-awesome-96.cloudfunctions.net/processFormData?userAgent=' + userAgent + '&redirectTo=' + window.location.href;
                
                document.getElementById("submit-btn").onclick = validate;
            });

            function onSubmit(token) {
                // Perform server-side verification
                console.log(token)

                // Handle server-side recaptcha verification. Then, submit form
                document.dataForm.submit();
            }

            function validate(event) {
                if (document.dataForm.checkValidity()) {
                    grecaptcha.execute();
                    event.preventDefault();
                }
            }
        </script>
    </head>
    <body>
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true' && isset($_GET['msg'])) { ?>
            <div class="info info-success"><?php echo $_GET['msg'] ?></div>
        <?php } elseif(isset($_GET['success']) &&  $_GET['success'] == 'false' && isset($_GET['msg'])) { ?>
            <div class="info info-error"><?php echo $_GET['msg'] ?></div>
        <?php } ?>

        <h3>Please fill all fields appropriately</h3>
        
        <form name="dataForm" method="POST">
            <input name="firstName" type="text"  placeholder="First Name" required>
            <input name="lastName" type="text" placeholder="Last Name" required>
            <input id="email" name="email" type="email" placeholder="Email Address" required>
            <div id='recaptcha' class="g-recaptcha" data-sitekey="6LcyUn8UAAAAAIdDyoVosxKYD007fdNfufJqkUlu" data-callback="onSubmit" data-size="invisible"></div>
            <button id="submit-btn">Submit</button>
        </form>
    </body>
</html>