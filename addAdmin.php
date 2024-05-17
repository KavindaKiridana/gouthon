<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        // Get form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['pin'];
        $confirm_password = $_POST['pin2'];
        $utype = $_POST['admintype'];

        // Validate form data
        if ($password !== $confirm_password) {
            echo "Passwords do not match!";
            exit;
        }

        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement
        $sql = "INSERT INTO Users (username, password_hash, email, phone_number,utype) VALUES (?, ?, ?, ?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssss", $param_username, $param_password, $param_email, $param_mobile, $param_utype);

            // Set parameters
            $param_username = $uname;
            $param_password = $password_hash;
            $param_email = $email;
            $param_mobile = $mobile;
            $param_utype = $utype;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to index page
                echo "<script>alert('user added successfully');</script>";
                echo "<script>window.location.href='adminDashboard.php';</script>";
                exit();
            } else {
                echo "<script>alert('Something went wrong. Please try again later.');</script>";
                echo "<script>window.location.href='addAdmin.php';</script>";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('An error occurred: " . htmlspecialchars($e->getMessage(), ENT_QUOTES) . "'); 
        </script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                <i class="fa fa-bars"></i>
            </a>
            <a href="adminDashboard.php" class="w3-bar-item w3-button">Go Back</a>
        </div>
    </div>

    <!-- Third Parallax Image with Portfolio Text -->
    <div class="bgimg-3 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
        </div>
    </div>

    <!-- Container (Contact Section) -->
    <div class="w3-content w3-container w3-padding-64" id="contact">
        <h3 class="w3-center">Admin Dashboard</h3>
        <p class="w3-center"><em>add admin</em></p>

        <div class="w3-row w3-padding-32 w3-section">
            <div class="w3-col m8 w3-panel">

                <form action="addAdmin.php" method="post">
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="First Name" required
                                name="fname">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Last Name" required name="lname">
                        </div>
                    </div>
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="User Name" required name="uname">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Mobile" required name="mobile">
                        </div>
                    </div>

                    <input class="w3-input w3-border" type="text" placeholder="Email" required name="email"
                        style="margin:0 0 8px 0">
                    <input class="w3-input w3-border" type="text" placeholder="Admin Type" required name="admintype"
                        style="margin:0 0 8px 0">
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Password" required name="pin">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Confirm Password" required
                                name="pin2">
                        </div>
                    </div>
                    <button class="w3-button w3-black w3-right w3-section" type="submit">
                        <i class="fa fa-paper-plane"></i> ADD ADMIN
                    </button>
                </form>
            </div>
        </div>
    </div>



    <script>
        // Change style of navbar on scroll
        window.onscroll = function () { myFunction() };
        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
            } else {
                navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
            }
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

</body>

</html>