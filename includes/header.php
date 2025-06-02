<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Kantinku</title>
    <style>
        /* ================ VARIABLES ================ */
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --primary-dark: #3a0ca3;
            --secondary: #f72585;
            --dark: #14213d;
            --light: #f8f9fa;
            --gray: #adb5bd;
            --white: #ffffff;
            --black: #000000;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
            --border-radius: 12px;
            --navbar-height: 80px;
        }

        /* ================ BASE STYLES ================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.7;
            color: var(--dark);
            background-color: var(--light);
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* ================ HEADER & NAVIGATION ================ */
        .header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }

        .header__container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav__menu {
            display: flex;
            gap: 1.5rem;
        }

        .nav__link {
            font-weight: 500;
            color: var(--dark);
            transition: var(--transition);
            padding: 0.5rem 0;
            position: relative;
        }

        .nav__link:hover {
            color: var(--primary);
        }

        .nav__link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--primary);
            transition: var(--transition);
        }

        .nav__link:hover::after {
            width: 100%;
        }

        /* ================ HERO SECTION ================ */
        .hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            text-align: center;
            padding: 6rem 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            background-color: var(--white);
            color: var(--primary);
            padding: 0.75rem 1.875rem;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* ================ FEATURES SECTION ================ */
        .features {
            padding: 5rem 0;
        }

        .features .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature {
            background: var(--white);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .feature h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.4rem;
        }

        /* ================ HOW TO BUY SECTION ================ */
        #buy {
            padding: 5rem 0;
        }

        .buy-container {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .form-container {
            flex: 1;
            background: var(--white);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .menu-select {
            margin-bottom: 1.5rem;
        }

        .menu-select select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--gray);
            border-radius: 5px;
            margin-top: 0.5rem;
        }

        .total-box {
            background: var(--light);
            padding: 1rem;
            border-radius: 5px;
            margin: 1.5rem 0;
            font-weight: 600;
        }

        .pay-button {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
        }

        .pay-button:hover {
            background: var(--primary-dark);
        }

        .qr-container {
            flex: 1;
            background: var(--white);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
        }

        .qr-code {
            margin: 1.5rem 0;
        }

        /* ================ CAFETARIA LIST ================ */
        #cafetaria {
            padding: 5rem 0;
        }

        .kantin-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .kantin-box {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .kantin-title {
            background: var(--primary);
            color: var(--white);
            padding: 1rem;
            font-size: 1.3rem;
        }

        .kantin-content {
            padding: 1.5rem;
        }

        .kantin-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .menu-list {
            margin-top: 1rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light);
        }

        .menu-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        /* ================ ABOUT SECTION ================ */
        #about {
            padding: 5rem 0;
        }

        .media-container {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .media-container img, 
        .media-container video {
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        /* ================ FOOTER ================ */
        .footer {
            background: var(--dark);
            color: var(--white);
            padding: 3rem 0 1.5rem;
            margin-top: 3rem;
        }

        .footer .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer h3 {
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .contact__list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .footer__copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* ================ RESPONSIVE STYLES ================ */
        @media (max-width: 768px) {
            .hero {
                padding: 4rem 0;
            }
            
            .buy-container {
                flex-direction: column;
            }
            
            .media-container {
                flex-direction: column;
            }
            
            .media-container img,
            .media-container video {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="index.php" class="logo">Kantinku</a>
            <nav class="nav">
                <ul class="nav__menu">
                    <li><a href="index.php" class="nav__link <?php echo $page_title == 'Home' ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="cafeteria.php" class="nav__link <?php echo $page_title == 'Cafetaria List' ? 'active' : ''; ?>">Menu</a></li>
                    <li><a href="howtobuy.php" class="nav__link <?php echo $page_title == 'How to Buy' ? 'active' : ''; ?>">Cara Pesan</a></li>
                    <li><a href="about.php" class="nav__link <?php echo $page_title == 'About Kantin' ? 'active' : ''; ?>">Tentang</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main-content">