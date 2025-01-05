<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Malnutrition Record System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #1ABC9C;
            margin: 0;
            font-family: 'Arial', sans-serif;
            overflow: hidden; /* Prevent scrollbars */
         
        }

        .login-form {
            width: 350px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 2; /* Ensure the form stays above the animations */
        }
       

        .login-form h2 {
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .tagline {
            color: #777;
            font-size: 0.9em;
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid #333;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #1ABC9C;
            border: none;
            width: 100%;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #17A085;
        }

        .login-links {
            margin-top: 15px;
            font-weight: bold;
        }

        .login-links a {
            color: #1ABC9C;
            text-decoration: none;
        }

        .login-links a:hover {
            text-decoration: underline;
        }

        .footer-note {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .floating {
            position: absolute;
            animation: float 4s ease-in-out infinite;
            opacity: 0.8;
        }

        /* Fruits styling */
        .fruit-1 { top: 5%; left: 10%; width: 50px; animation-delay: 0s; }
        .fruit-2 { top: 15%; right: 15%; width: 40px; animation-delay: 1s; }
        .fruit-3 { top: 35%; left: 5%; width: 45px; animation-delay: 1.5s; }
        .fruit-4 { top: 50%; right: 20%; width: 50px; animation-delay: 2s; }
        .fruit-5 { bottom: 10%; left: 20%; width: 40px; animation-delay: 2.5s; }
        .fruit-6 { bottom: 15%; right: 30%; width: 45px; animation-delay: 3s; }
        .fruit-7 { top: 60%; left: 15%; width: 50px; animation-delay: 3.5s; }
        .fruit-8 { bottom: 30%; right: 40%; width: 50px; animation-delay: 4s; }
        .fruit-9 { top: 75%; left: 75%; width: 40px; animation-delay: 4.5s; }
        .fruit-10 { bottom: 5%; right: 5%; width: 50px; animation-delay: 5s; }
        .fruit-11 { top: 10%; left: 70%; width: 45px; animation-delay: 0.5s; }
        .fruit-12 { bottom: 20%; right: 60%; width: 40px; animation-delay: 2.5s; }
        .fruit-13 { top: 25%; left: 30%; width: 50px; animation-delay: 1s; }
        .fruit-14 { bottom: 40%; right: 5%; width: 45px; animation-delay: 3.5s; }
        .fruit-15 { top: 70%; left: 20%; width: 40px; animation-delay: 4s; }
        .fruit-16 { bottom: 15%; left: 50%; width: 50px; animation-delay: 5s; }
        .fruit-17 { top: 40%; right: 10%; width: 45px; animation-delay: 2s; }
        .fruit-18 { bottom: 5%; left: 10%; width: 50px; animation-delay: 3.8s; }
        .fruit-19 { top: 20%; right: 30%; width: 40px; animation-delay: 4.2s; }
        .fruit-20 { bottom: 50%; left: 40%; width: 50px; animation-delay: 2.8s; }
        .fruit-21 { top: 5%; right: 50%; width: 50px; animation-delay: 1.2s; }
        .fruit-22 { bottom: 5%; left: 35%; width: 45px; animation-delay: 3s; }
        .fruit-23 { top: 55%; left: 60%; width: 50px; animation-delay: 2.5s; }
        .fruit-24 { bottom: 60%; right: 15%; width: 50px; animation-delay: 1.8s; }
        .fruit-25 { top: 45%; left: 25%; width: 40px; animation-delay: 3.5s; }
        .fruit-26 { bottom: 45%; right: 25%; width: 40px; animation-delay: 4.5s; }
        .fruit-27 { top: 35%; left: 15%; width: 40px; animation-delay: 2.5s; }
        .fruit-28 { bottom: 25%; right: 5%; width: 45px; animation-delay: 5s; }
        .fruit-29 { top: 10%; left: 45%; width: 50px; animation-delay: 3.8s; }
        .fruit-30 { bottom: 75%; right: 20%; width: 50px; animation-delay: 4.5s; }
        .fruit-31 { top: 50%; left: 55%; width: 40px; animation-delay: 4s; }
        .fruit-32 { bottom: 25%; left: 15%; width: 45px; animation-delay: 1.5s; }
        .fruit-33 { top: 15%; right: 5%; width: 45px; animation-delay: 3s; }
        .fruit-34 { bottom: 10%; left: 5%; width: 50px; animation-delay: 3.5s; }
        .fruit-35 { top: 20%; right: 25%; width: 50px; animation-delay: 4.5s; }
    </style>
</head>
<body>
    <!-- Floating Graphics -->
    <!-- Repeat fruits from apple, carrot, banana, broccoli -->
    <img src="/images/apple.png" alt="Apple" class="floating fruit-1">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-2">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-3">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-4">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-5">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-6">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-7">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-8">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-9">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-10">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-11">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-12">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-13">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-14">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-15">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-16">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-17">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-18">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-19">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-20">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-21">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-22">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-23">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-24">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-25">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-26">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-27">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-28">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-29">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-30">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-31">
    <img src="/images/brocolli.png" alt="Broccoli" class="floating fruit-32">
    <img src="/images/apple.png" alt="Apple" class="floating fruit-33">
    <img src="/images/carrot.png" alt="Carrot" class="floating fruit-34">
    <img src="/images/banana.png" alt="Banana" class="floating fruit-35">

    <div class="login-form">
        <h2>Welcome Back!</h2>
        <p class="tagline">Track and improve children's nutritional health with ease.</p>

        <form action="/login" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

            <div class="login-links mt-3">
                <a href="/register">Create an account</a>
            </div>
        </form>

        <div class="footer-note">
            <p>Your data-driven solution for a healthier future.</p>
        </div>
    </div>
   
</body>
</html>
