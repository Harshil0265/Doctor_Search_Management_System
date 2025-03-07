<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../css/settings.css"> <!-- Replace with the actual path to your CSS file -->
    <script src="../settings.js"></script> <!-- Replace with the actual path to your JavaScript file -->
</head>

<body>

    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">

                                    <?php
                                    // Initialize variables with default values
                                    $username = "";
                                    $useremail = "";

                                    // Check if the form has been submitted
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Assuming you are retrieving values from a form
                                        $username = $_POST["username"];
                                        $useremail = $_POST["useremail"];

                                        // Your further code for processing form data
                                    }

                                    // Now you can use $username and $useremail without warnings
                                    echo "Username: " . htmlspecialchars($username);
                                    echo "User Email: " . htmlspecialchars($useremail);
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php"><input type="button" value="Log out"
                                            class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-home">
                        <a href="index.php" class="non-style-link-menu">
                            <div><p class="menu-text">Home</p></div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="doctors.php" class="non-style-link-menu">
                            <div><p class="menu-text">All Doctors</p></div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu">
                            <div><p class="menu-text">Scheduled Sessions</p></div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu">
                            <div><p class="menu-text">My Bookings</p></div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-settings menu-active menu-icon-settings-active">
                        <a href="settings.php" class="non-style-link-menu non-style-link-menu-active">
                            <div><p class="menu-text">Settings</p></div>
                        </a>
                    </td>
                </tr>
            </table>
        </div>

        <div class="dash-body" style="margin-top: 15px">
            <button onclick="goBack()" class="login-btn btn-primary-soft btn btn-icon-back"
                style="padding-top: 11px; padding-bottom: 11px; margin-left: 20px; width: 125px">
                <font class="tn-in-text">Back</font>
            </button>
            <p style="font-size: 23px; padding-left: 12px; font-weight: 600;">Settings</p>
            <button onclick="showPopup('edit')" class="btn-primary btn">Edit Account</button>
            <button onclick="showPopup('view')" class="btn-primary btn">View Account</button>
            <button onclick="showPopup('drop')" class="btn-primary btn">Delete Account</button>
        </div>
    </div>

    <script>
        function goBack() {
            // Your back button logic goes here
            window.history.back();
        }

        function showPopup(action) {
            var popup = document.getElementById("popup1");
            var content = document.getElementById("popup-content");

            if (action === 'edit') {
                content.innerHTML = "Edit popup content goes here.";
            } else if (action === 'view') {
                content.innerHTML = "View popup content goes here.";
            } else if (action === 'drop') {
                content.innerHTML = "Delete popup content goes here.";
            }

            popup.style.display = "block";
        }

        function closePopup() {
            var popup = document.getElementById("popup1");
            popup.style.display = "none";
        }
    </script>

    <div id="popup1" class="overlay">
        <div class="popup">
            <center>
                <a class="close" onclick="closePopup()">&times;</a>
                <div id="popup-content" class="popup-content">
                    <!-- Popup content goes here -->
                </div>
            </center>
        </div>
    </div>

</body>

</html>
