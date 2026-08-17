<?php
// include your database connection
include('../../database.php');

// ==== CONFIGURE YOUR NEW LOGIN DETAILS HERE ====
$newUsername = "ahamadit9721@gmail.com";          // your admin username
$newPassword = "ahamad@123";  // your new plain password
// ==============================================

// Hash the new password securely
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Check if admin already exists
$check = $conn->query("SELECT * FROM admin WHERE username='$newUsername'");

if ($check->num_rows > 0) {
    // Update existing admin
    $update = $conn->query("UPDATE admin SET password='$hashedPassword' WHERE username='$newUsername'");
    if ($update) {
        echo "<h3 style='color:green;'>✅ Password updated successfully for user: $newUsername</h3>";
        echo "<p><b>New Login:</b> Username: $newUsername | Password: $newPassword</p>";
    } else {
        echo "<h3 style='color:red;'>❌ Failed to update password!</h3>";
    }
} else {
    // Insert new admin if not exists
    $insert = $conn->query("INSERT INTO admin (username, password) VALUES ('$newUsername', '$hashedPassword')");
    if ($insert) {
        echo "<h3 style='color:green;'>✅ New admin created successfully!</h3>";
        echo "<p><b>Username:</b> $newUsername<br><b>Password:</b> $newPassword</p>";
    } else {
        echo "<h3 style='color:red;'>❌ Failed to create admin user!</h3>";
    }
}
?>
