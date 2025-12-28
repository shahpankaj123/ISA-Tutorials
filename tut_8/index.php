<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="signup-box">
    <h2>Signup</h2>
    <form action="signup.php" method="POST" onsubmit="return validateForm()">
        <input type="text" name="name" id="name" placeholder="Full Name">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit">Sign Up</button>
    </form>
</div>

<script src="script.js"></script>
</body>
</html>
