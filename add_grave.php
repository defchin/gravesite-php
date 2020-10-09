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
        
        
        
        <!-- ==================== DISCRIPTION =================== -->
        
        <body>
        <header><h2>Add a New Grave</h2></header>

            <form action="add_grave_action.php" method="post"
                  id="add_grave" enctype="multipart/form-data">

                <label>First Name:</label>
                <input type="text" name="firstName"><br>

                <label>Middle Name:</label>
                <input type="text" name="middleName"><br>

                <label>Last Name:</label>
                <input type="text" name="lastName"><br>

                <label>Birth Date:</label>
                <input type="date" name="birthDate"><br>

                <label>Death Date:</label>
                <input type="date" name="deathDate"><br>

                Gravestone Image File:<br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br>

                <label>Upload Key:</label>
                <input type="text" name="uploadKey"><br>

                <label>&nbsp;</label>
                <input type="submit" name="submit" value="Add Grave"><br>

            </form>

        </body>

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