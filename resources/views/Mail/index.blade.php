<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
</head>
<body>
    <p>Dear {{ $name }},</p>

    <p>Thank you for registering with JolBihongo. Your account has been successfully created with the following information:</p>

    <ul>
        <li>Subscribe ID: {{ $user_id }}</li>
        <li>Name: {{ $name }}</li>
        <li>Mobile No: {{ $mobileNo }}</li>
        <li>Login Email ID: {{ $email }}</li>
        <li>Password: {{ $mobileNo }}</li>

    </ul>

    <h3>(Please change your password.)</h3>

<p>Thank you for choosing our service.</p>
<a href="https://jolbihongo.com/"><span style="color:black;">Go To</span> www.jolbihongo.com</a>
<p>Watch & Earn</p>
</body>
</html>

