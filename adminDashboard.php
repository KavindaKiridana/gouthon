<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        html {
            height: 100%;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 250px;
            /* Same as the width of the sidebar */
            padding: 0px 10px;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar w3-bar-block w3-dark-grey">
        <h3 class="w3-bar-item">Admin Dashboard</h3>
        <a href="#home" class="w3-bar-item w3-button w3-hover-black">Home</a>
        <a href="#users" class="w3-bar-item w3-button w3-hover-black">Users</a>
        <a href="#settings" class="w3-bar-item w3-button w3-hover-black">Settings</a>
        <a href="#profile" class="w3-bar-item w3-button w3-hover-black">Profile</a>
    </div>

    <!-- Page Content -->
    <div class="main w3-container">
        <div class="w3-container w3-padding-64" id="home">
            <h2>Welcome, Admin</h2>
            <p>Manage your site using the navigation menu on the left.</p>
        </div>

        <div class="w3-container w3-padding-64" id="users">
            <h2>Users</h2>
            <p>Manage users here.</p>
            <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable w3-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <!-- Example user data -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <a href="#" class="w3-button w3-blue w3-small">Edit</a>
                        <a href="#" class="w3-button w3-red w3-small">Delete</a>
                    </td>
                </tr>
                <!-- Add more user rows as needed -->
            </table>
            <a class="w3-button w3-black" style="margin:8px 0  8px 0" href="addUser.php">Add User</a>
            <a class="w3-button w3-black" style="margin:8px 0  8px 0" href="updateUser.php">Edit User</a>
            <a class="w3-button w3-black" style="margin:8px 0  8px 0" href="addAdmin.php">Add Admin</a>
            <a class="w3-button w3-black" style="margin:8px 0  8px 0" href="updateAdmin">Edit Admin</a>
        </div>

        <div class="w3-container w3-padding-64" id="settings">
            <h2>Settings</h2>
            <p>Manage settings here.</p>
            <!-- Settings form or options -->
            <form>
                <label for="site-name">Site Name</label>
                <input class="w3-input" type="text" id="site-name" name="site-name">
                <br>
                <label for="email">Admin Email</label>
                <input class="w3-input" type="email" id="email" name="email">
                <br>
                <button class="w3-button w3-black">Save Changes</button>
            </form>
        </div>

        <div class="w3-container w3-padding-64" id="profile">
            <h2>Profile</h2>
            <p>Update your profile information here.</p>
            <form action="updateAdmin.php" method="post">
                <!-- Example profile update form -->
                <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                    <div class="w3-half">
                        <input class="w3-input w3-border" type="text" placeholder="First Name" required name="fname">
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
                        <input class="w3-input w3-border" type="password" placeholder="Password" required name="pin">
                    </div>
                    <div class="w3-half">
                        <input class="w3-input w3-border" type="password" placeholder="Confirm Password" required
                            name="pin2">
                    </div>
                </div>
                <button class="w3-button w3-black w3-right w3-section" type="submit">
                    <i class="fa fa-paper-plane"></i> UPDATE PROFILE
                </button>
            </form>
        </div>
    </div>

    <script>
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