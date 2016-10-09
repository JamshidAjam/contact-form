<!DOCTYPE html>

<?php
        
    $error = "";
    $successMessage = "";

    if($_POST) {
        if(!$_POST["email"]) {
            $error .= "you need to enter your email.<br>";
        }
        if(!$_POST["subject"]) {
            $error .= "you need to enter your subject.<br>";
        }
        if(!$_POST["message"]) {
            $error .= "you need to enter your message.<br>";
        }
        if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "the email address is invalid.<br>";
        }
        
        if($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><strong>There were error(s)</strong><br>' . $error . '</div>';
        } else {
            $emailTo = "mr.jamshid.a@gmail.com";
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            $headers = "From: " . $_POST["email"];
            
            if(mail($emailTo, $subject, $message, $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Your message sent successfully.<br>';
            } else {
                $error = '<div class="alert alert-danger" role="alert"><strong>Your message couldn\'t be sent. Please try again later.</strong></div>';
            }
        }
    }

?>

<html>
<head>
    <title>Contact Form</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    

</head>    
<body>

<div class="container">
    
    <h1>Get in touch!</h1>
    
    <div id="error"><?php echo $error.$successMessage ?></div>
    
    <form method="post">
        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject">
        </div>

        <div class="form-group">
            <label for="message">What would you like to ask us?</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    
    
    <script type="text/javascript">
        $("form").submit(function (e) {
            
            var error = "";
            
            if($("#email").val() == "") {
                error += 'the email field is empty!<br>';
            }
            
            if($("#subject").val() == "") {
                error += 'the subject field is empty!<br>';
            }
            
            if($("#message").val() == "") {
                error += 'the message field is empty!<br>';
            }
            
            if(error != "") {
                $("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s)</strong><br>' + error + '</div>');
                return false;
            } else {
                return true;
            }
            
        });
    </script>
    
</body>    
</html>