<?php
require_once('database.php');

$qryGetGraves = "SELECT * FROM graves";
$grave_set = mysqli_query($connection, $qryGetGraves);

$graves = array();
while ($row = mysqli_fetch_assoc($grave_set)) {
    $graves[$row["graveID"]] = $row;
}

?>

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
        
        <section id="hero">
            <h1>Welcome to the Grave Site</h1>
                <div class="search">
                    <form action="index.html">
                        <input type="search" name="ancestor_search" placeholder="Find you Ancestor">
                    </form> 
                </div><!-- end search -->
        </section><!-- end hero -->
        
        <!-- ==================== DISCRIPTION =================== -->
        
        <body>
        <header><h1>Graves</h1></header>
        <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Death Date</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($graves as $grave) : ?>
            <tr>
                <td><<img src = "<?php echo $grave['PhotoName']; ?>" width="200" height="200"></td>
                <td><?php echo $grave['firstName']; ?></td>
                <td><?php echo $grave['middleName']; ?></td>
                <td><?php echo $grave['lastName']; ?></td>
                <td><?php echo $grave['birthDate']; ?></td>
                <td><?php echo $grave['deathDate']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <a href = "add_grave.php">Add Grave</a>

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