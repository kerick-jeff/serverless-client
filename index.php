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
                align-items: center;
                justify-content: center;
            }

            form {
                width: 80%;
                padding: 25px;
                border: 1px solid #cccccc;
                background-color: #f4f4f4;
                border-radius: 4px;
            }

            form input {
                font-size: 1em;
                padding: 8px 16px;
                border-radius: 4px;
            }

            form input {
                color: #555555;
                border: 1px solid #f4f4f4;
            }

            form input[type="submit"] {
                color: #ffffff;
                background-color: #007bff;
                border: 1px solid #007bff;
            }

            form input[type="submit"]:hover {
                background-color: #f4f4f4;
                color: #555555;
            }
        </style>

        <!-- A little JavaScript to handle clientside interactions -->
        <script type="text/javascript">
            // Run when the page loads
            window.addEventListener('load', () => {
                // Detect the user's userAgent
                const userAgent = window.navigator.userAgent;

                // Set the dataForm action attribute
                document.dataForm.action = 'https://us-central1-awesome-96.cloudfunctions.net/processFormData?userAgent=' + userAgent;
            });
        </script>
    </head>
    <body>
        <form name="dataForm" method="POST">
            <input name="firstName" type="text" placeholder="First Name">
            <input name="lastName" type="text" placeholder="Last Name">
            <input name="email" type="email" placeholder="Email Address">
            <input type="submit" value="Submit">
        </form>
    </body>
</html> 