<?php
session_start();
if (empty($_SESSION["userid"])) {
    header("Location: ../controllers/login.php"); // Redirecting To Home Page
}

include('../controllers/UpdateUserProfile.php');

$connection = new db();
$conobj = $connection->OpenCon();
$id = $_SESSION['userid'];
$userQuery = $connection->ShowUserProfile($conobj, "users", $id);
oci_execute($userQuery);
$row = oci_fetch_assoc($userQuery);
// print_r($row);

$name = $row['USERS_NAME'];
$email = $row['USERS_EMAIL'];
$password = $row['USERS_PASSWORD'];


$connection->CloseCon($conobj);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../asset/css/mycss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../asset/css/styles.css">
    <title>User Profile</title>


</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#"><img src="Pictures/icon.jpg" height="30" width="41"></a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="UserHome.php"><span
                                class="fa fa-home fa-lg"></span>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="UserProfile.php"><span
                                class="fa fa-info fa-lg"></span> My Profile</a></li>


                    <li class="nav-item"><a class="nav-link" href="./contactus.html"><span
                                class="fa fa-sign-out fa-lg"></span> Log Out</a></li>
                </ul>
                <!-- Modal Login-->

                <!-- Modal Login -->
            </div>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>


    <!-- main  -->
    <p id="msg">
        <?php echo $error ?>
    </p>
    <section class="pad-70">
        <div class="container">
            <form action='' method='post'>
                <div class="form-row">
                    <div class="form-group">
                        Name:
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">

                        Password:
                        <input type="text" name="pass" value="<?php echo $password; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        Email:
                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="submit" value="Update" name="update" class="btn btn-md btn-primary btn-submit">
                        <a class="btn btn-md btn-success m-1" href="UserProfile.php">Back</a>
                    </div>
                </div>
        </div>
        </form>
        </div>
    </section>
    <!-- footer  -->
    <footer>
        <div class="container footer-wrap">
            <div class="footer-left">
                <ul class="footer-menu">
                    <li><a href="">Terms and Conditions</a></li>
                    <li><a href="">Privacy</a></li>
                </ul>

            </div>
            <div class="footer-right">
                <ul class="footer-menu">
                    <li><a href="">Follow</a></li>
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>

                </ul>
            </div>
        </div>


    </footer>
    <script src="https://kit.fontawesome.com/2065a5e896.js" crossorigin="anonymous"></script>
</body>

</html>