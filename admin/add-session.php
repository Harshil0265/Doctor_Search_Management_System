<?php

session_start();

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"] == "" or $_SESSION['usertype'] != 'a') {
        header("location: ../login.html");
        exit(); // Add an exit to stop script execution after the header redirect
    }
} else {
    header("location: ../login.html");
    exit(); // Add an exit to stop script execution after the header redirect
}

if ($_POST) {
    // Import database
    include('../connection.php');

    // Validate and sanitize user input
    $title = mysqli_real_escape_string($database, $_POST["title"]);
    $docid = mysqli_real_escape_string($database, $_POST["docid"]);
    $nop = mysqli_real_escape_string($database, $_POST["nop"]);
    $date = mysqli_real_escape_string($database, $_POST["date"]);
    $time = mysqli_real_escape_string($database, $_POST["time"]);

    // Use prepared statement to prevent SQL injection
    $stmt = $database->prepare("INSERT INTO schedule (docid, title, scheduledate, scheduletime, nop) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issii", $docid, $title, $date, $time, $nop);
    
    if ($stmt->execute()) {
        header("location: schedule.php?action=session-added&title=" . urlencode($title));
        exit(); // Add an exit to stop script execution after the header redirect
    } else {
        // Handle the case when the query fails
        echo "Error: " . $stmt->error;
    }
}

?>
