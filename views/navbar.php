<style>
        .navbar {
            background-color: #8d9c8c;
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
            background-color: #3e4a3b;
            color: white;
            border-radius: 15px;
        }
        .navbar .login {
            background-color: #3e4a3b;
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
            background-color: #ddd;
        }
</style>
        <div class="navbar">
    <div>
        <img src="/disperdagin/assets/image/logo.png" >
    </div>
        <a href="<?php echo site_url('home'); ?>">Home</a>
        <a href="<?php echo site_url('daftar'); ?>">Daftar Perusahaan</a>
        <a href="<?php echo site_url('about'); ?>">About Us</a>
        <a class="login" href="<?php echo site_url('login'); ?>">Login</a>
    </div>