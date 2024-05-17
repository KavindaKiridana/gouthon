<?php
require 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['pin'];
    $confirm_password = $_POST['pin2'];

    // Validate form data
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
        echo "<script>window.location.href='signUp.php';</script>";
        exit;
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO Users (username, password_hash, email, phone_number) VALUES (?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssss", $param_username, $param_password, $param_email, $param_mobile);

        // Set parameters
        $param_username = $uname;
        $param_password = $password_hash;
        $param_email = $email;
        $param_mobile = $mobile;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('User added successfully');</script>";
            echo "<script>window.location.href='home.php';</script>";
            exit(); // Ensure the script stops executing here
        } else {
            echo "<script>alert('Something went wrong. Please try again later.');</script>";
            echo "<script>window.location.href='signUp.php';</script>";
            exit();
        }

        // Close statement
        //$stmt->close();
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



    <!-- Third Parallax Image with Portfolio Text -->
    <div class="bgimg-3 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
        </div>
    </div>

    <!-- Container (Contact Section) -->
    <div class="w3-content w3-container w3-padding-64" id="contact">
        <h3 class="w3-center">Sign Up</h3>
        <p class="w3-center"><em>Already have an account?<a href="signIn.php">sign in</a></em></p>

        <div class="w3-row w3-padding-32 w3-section">
            <div class="w3-col m8 w3-panel">
                <form action="signUp.php" method="post">
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
                    <input class="w3-input w3-border" style="margin:0 0 8px 0" type="text" placeholder="Email" required
                        name="email">
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
                        <i class="fa fa-paper-plane"></i> SIGN UP
                    </button>
                </form>
            </div>
        </div>


    </div>





</body>

</html>