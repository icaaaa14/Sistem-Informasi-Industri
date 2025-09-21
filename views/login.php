<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *, html, body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
        }
        .navbar {
            background-color: #5cb281;
            overflow: hidden;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .navbar img {
            width: 80px;
            height: auto;
            position: absolute;
            left: 20px;
            bottom: 1px;
        }
        .navbar .menu {
            display: flex;
            align-items: center;
        }
        .navbar a {
            margin-left: 15px;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-family: Arial, sans-serif;
        }
        .navbar a:hover {
            background-color: #4a9b6e;
            color: white;
            border-radius: 15px;
        }
        .navbar .login {
            background-color: #4a9b6e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            right: 20px;
        }
        .navbar .login:hover {
            background-color: #6dbd86;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background: #f1f1f1;
            background-image: url('/disperdagin/assets/image/bglogin5.png');
            background-size: cover;
            background-position: center;
        }
        .login-form {
            background: rgba(92, 178, 129, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .login-form h1 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            align-items: center;
            text-align: left;
            font-family: Arial, sans-serif;
        }
        .form-group label {
            width: 100%; /* Lebar label sesuai dengan kontainer */
            margin-bottom: 5px;
            text-align: left;
            font-weight: bold;
            color: #333;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%; /* Lebar input sesuai dengan kontainer */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }
        .login-form input[type="submit"] {
            background: #ffffff;
            color: #333333;
            padding: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 50%;
            font-size: 16px;
            margin-top: 10px;
            font-family: Arial, sans-serif;
        }
        .login-form input[type="submit"]:hover {
            background: #f0f0f0;
        }
        .login-form p {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <img src="/disperdagin/assets/image/logo.png" >
        </div>
            <a href="<?php echo site_url('home'); ?>">Home</a>
            <a href="<?php echo site_url('daftar'); ?>">Daftar Industri</a>
            <a href="<?php echo site_url('about'); ?>">About Us</a>
            <a class="login" href="<?php echo site_url('login'); ?>">Login</a>
        </div>
    <div class="container">
        <div class="login-form">
            <h1>Login</h1>
            <form action="<?php echo site_url('login'); ?>" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="submit" name="login" value="Login">
            </form>
            <?php if($error): ?>
                <p><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
 