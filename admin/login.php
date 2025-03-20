<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: ../index.php"); // Redirect to the main index.php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="login-container">
        <h3 class="text-center">Admin Login</h3>
        <form id="adminLoginForm">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $("#adminLoginForm").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: "login_process.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            window.location.href = response.redirect; // Redirect to the main dashboard
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert("Login failed. Please try again.");
                    }
                });
            });
        });
    </script>
</body>
</html>
