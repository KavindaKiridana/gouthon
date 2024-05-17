<?php
// Start session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $pin = $_POST['pin'];

    // SQL query to fetch the user
    $sql = "SELECT * FROM Users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($pin, $row['password_hash'])) {
            // Set session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['utype'];

            // Redirect based on user type
            if ($row['utype'] != NULL) {
                header('Location: adminDashboard.php');
            } else {
                header('Location: home.php');
            }
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid username or password.');</script>";
        }
    } else {
        // Invalid password
        echo "<script>alert('Invalid username or password.');</script>";
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



    <!-- Third Parallax Image with Portfolio Text -->
    <div class="bgimg-3 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
        </div>
    </div>

    <div class="w3-row">
        <div class="w3-col s4  w3-center">
            &nbsp;
        </div>
        <div class="w3-col s4  w3-center">
            <!-- Container (Contact Section) -->
            <div class="w3-content w3-container w3-padding-64" id="contact">
                <h3 class="w3-center">Sign In</h3>
                <p><em>Don't have an account?<a href="signUp.php">sign up</a></em></p>
                <div class="w3-row w3-padding-32 w3-section">
                    <div class="w3-col m8 w3-panel">
                        <form action="signIn.php" method="post">
                            <input class="w3-input w3-border" style="margin:0 0 8px 0" type="text"
                                placeholder="User Name" required name="uname">
                            <input class="w3-input w3-border" style="margin:0 0 8px 0" type="text"
                                placeholder="DTP Code" required name="dtp">
                            <input class="w3-input w3-border" style="margin:0 0 8px 0" type="text"
                                placeholder="Password" required name="pin">
                            <button class="w3-button w3-black w3-right w3-section" type="submit">
                                <i class="fa fa-paper-plane"></i> SIGN IN
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="w3-col s4 w3-center">
            &nbsp;
        </div>
    </div>







</body>

</html>