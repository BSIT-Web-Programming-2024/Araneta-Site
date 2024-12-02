<?php
include("database.php");

// Get user input (replace with your input method)
$username = $_POST['username'];

// Sanitize and validate user input
if (empty($username)) {
    echo "Username cannot be empty.";
    exit;
}

// Prepare and execute the query
$stmt = mysqli_prepare($conn, "SELECT name, email, message FROM users WHERE user = ?");
mysqli_stmt_bind_param($stmt, "s", $username);

try {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row["name"] . "<br>";
        echo $row["email"] . "<br>";
        echo $row["message"] . "<br>";
    } else {
        echo "User not found.";
    }
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>