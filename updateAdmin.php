<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $admin_id = $_POST['admin_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $admintype = $_POST['admintype'];
    $password = $_POST['pin'];
    $confirm_password = $_POST['pin2'];

    // Validate form data
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "UPDATE Admins SET first_name=?, last_name=?, username=?, mobile=?, email=?, admin_type=?, password_hash=? WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sssssssi", $param_fname, $param_lname, $param_uname, $param_mobile, $param_email, $param_admintype, $param_password, $param_admin_id);

        // Set parameters
        $param_fname = $fname;
        $param_lname = $lname;
        $param_uname = $uname;
        $param_mobile = $mobile;
        $param_email = $email;
        $param_admintype = $admintype;
        $param_password = $password_hash;
        $param_admin_id = $admin_id;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Admin updated successfully');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again later.');</script>";
            echo "<script>window.history.back();</script>";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "<script>alert('Database error. Please try again later.');</script>";
        echo "<script>window.history.back();</script>";
    }

    // Close connection
    $mysqli->close();
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
        <p class="w3-center"><em>update admin</em></p>

        <div class="w3-row w3-padding-32 w3-section">
            <div class="w3-col m8 w3-panel">

                <form action="/action_page.php" target="_blank">
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
                        <i class="fa fa-paper-plane"></i> UPDATE ADMIN
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