<?php
session_start();
if (!isset($_SESSION['uname'])) {
    echo "<script>alert('an error occured, please try again');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else {
    $uname = $_SESSION['uname'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>
    <h2 style="color:red;">Hi <?php echo $uname; ?></h2>
</body>

</html>