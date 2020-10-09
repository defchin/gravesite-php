<?php
    //check for header injection
    function has_header_injection($str){
        return preg_match( "/[\r\n]/", $str);
    }

    if (isset ($_POST['submit'])){
        $name = trim($_POST['name']);
        $subject = trim($_POST['subject']);
        $number = trim($_POST['number']);
        $email = trim($_POST['email']);
        $msg = trim($_POST['message']);
        
        //Check to see if $name or $email have header injections
   
    if (has_header_injection($name) || has_header_injection($email)) {
        die();   //if true, kill the script
        }

        if (!$name || !$email || !$msg){
            echo '<h4 class="error">Allfield requird.</h4><a href="contact.php" class="button block">Go back and try again</a>';
            exit;
        }

        //add the recipient email to a veriable
        $to = $email;

        // Create a subject 
        $subject = "$name sent you a message via your contact form";

        //construct the message
        $message = "Name: $name\r\n";
        $message .= "Subject: $subject\r\n";
        $message .= "Number: $number\r\n";
        $message .= "email: $email\r\n";
        $message .= "Message:\r\n$msg";

        //If the subscribe checkbox was checked
        if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe'){

            //Add a new line to the message
            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        }

        $message = wordwrap($message,72);

        //Set the mail headers into a variable

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $name <$email> \r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n\r\n";

        //Send the email
        mail($to, $subject, $message, $headers);

?>

<!-- Show success message after email has sent -->

<h5>Thanks for contacting KarbasiCorp!</h5>
<p>Please allow 24 hours for a response.</p>
<p><a href="contact.php" class="button block">&laquo; Go to Home Page</a></p>

<?php } ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Final Project">
        <meta name="author" content="Hamid Karbasi">
        <title>The Grave Site</title> 
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css"> 
        <link href="css/normalize.css" rel="stylesheet" type="text/css">
        <link href="css/w3.css" rel="stylesheet" type="text/css">
        <link href="css/styles.css" rel="stylesheet" type="text/css">    
    </head>
    <body>
        <header>
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="#openModal">Login</a></li>
                    </ul>           
                </nav>
                <div id="openModal" class="modalDialog">
                    <div><a href="#close" title="close" class="close">X</a>
                        <!-- content for Modal -->
                        <div class="login">
                            <h2>Sign in</h2>
                            <form>
                                <input type="email" placeholder="Email">
                                <input type="password" name="password" placeholder="password">
                                <input type="button" value="Login">
                            </form>
                        </div><!-- end login -->                      
                    </div><!-- end close -->                
                </div><!-- end openModal -->
            </div> <!-- end navbar -->        
        </header>
        
        <!-- ================== HERO ================== -->
        
        <section id="contact">
            <img src="img/contact.jpg">
        </section><!-- end hero -->
        
        
        <!-- ================= DISCRIPTION =============== -->
        
        <section id="contact_us">
            <div class="w3-container">
                <h3>Contact Us</h3>
                <hr>
                <p>Send us a message and we will get back to you as soon as we can</p>    
                <form method="POST" action="contact.php">
                    <div class="form_input">
                        <div class="w3-row-padding">
                          <div class="w3-half">
                            <input class="w3-input" type="text" placeholder="Full Name" name="name">
                          </div>
                          <div class="w3-half">
                            <input class="w3-input" type="text" placeholder="Subject" name="subject">
                          </div>
                        </div>
                        <div class="w3-row-padding">
                          <div class="w3-half">
                            <input class="w3-input" type="text" placeholder="Phone Number" name="number">
                          </div>
                          <div class="w3-half">
                            <input class="w3-input" type="text" placeholder="Email Address" name="email">
                          </div>
                        </div>
                        <p align="center">Message</p>
                        <textarea name="message">
                        </textarea>
                        <input type="submit" name="submit" value="Submit" class="w3-center">
                    </div>
                </form>
            </div>
        </section><!-- end discription -->        
    
        <footer>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="blog.html">Blog</a></li>
                </ul>           
            </nav>        
        </footer> 
    </body>
</html>    