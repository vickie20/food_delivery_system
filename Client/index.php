<?php
// Start the session (if needed for future functionalities)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshBites - Food Delivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-color: #8e44ad;
            --secondary-color: #2c3e50;
            --text-dark: #ecf0f1;
            --text-light: #ffffff;
            --btn-hover: #9b59b6;
        }

        body {
            background: linear-gradient(to right, #1a1a2e, #16213e);
            color: var(--text-dark);
        }

        .navbar {
            padding: 1.5rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.8);
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            border-bottom: 2px solid var(--primary-color);
            position: relative;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            margin-left: 2rem;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-button {
            padding: 10px 20px;
            margin-left: 15px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .signup {
            background: var(--primary-color);
            color: var(--text-light);
            box-shadow: 0 4px 10px rgba(168, 85, 247, 0.3);
        }

        .signup:hover {
            background: var(--btn-hover);
            transform: scale(1.05);
        }

        .login {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .login:hover {
            background: var(--primary-color);
            color: var(--text-light);
        }

        .menu-toggle {
            display: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--text-light);
        }

        .hero {
            height: 90vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            padding: 0 8%;
            text-align: center;
        }

        .hero-content {
            max-width: 600px;
            color: var(--text-light);
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            animation: fadeIn 1.5s ease-in-out;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeIn 2s ease-in-out;
        }

        .cta-button {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            background: var(--primary-color);
            color: var(--text-light);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            background: var(--btn-hover);
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.9);
                padding: 1rem 0;
                text-align: center;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a {
                margin: 1rem 0;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">FreshBites</div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <div class="nav-links">
            <!--a href="#home">Home</a>
            <a href="#menu">Menu</a>
            <a href="#about">About</a-->
            <button class="nav-button signup" onclick="window.location.href='php/authentication/signup.php'">Sign Up</button>
<button class="nav-button login" onclick="window.location.href='php/authentication/login.php'">Login</button>

        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Craving Something Delicious?</h1>
            <p>Get your favorite meals delivered fast from top restaurants in your area. Order now and enjoy fresh food in minutes!</p>
            <button class="cta-button" onclick="window.location.href='php/authentication/login.php'">Order Now →</button>

        </div>
    </section>

    <script>
        function toggleMenu() {
            document.querySelector('.nav-links').classList.toggle('active');
        }
    </script>
</body>
</html>
