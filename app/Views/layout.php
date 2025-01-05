<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malnutrition Record System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
            font-size: 16px; /* Base font size */
            line-height: 1.5;
            padding-top: 75px; /* To avoid overlap from fixed navbar */
        }

        /* Navbar Styling */
        .navbar {
            background-color: #1abc9c;
            padding: 0.5rem 1rem;
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            font-size: 18px; /* Consistent navbar font size */
            text-decoration: none; /* No underline for links */
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #d4f1f4 !important;
        }

        .nav-link.active {
            color: #d4f1f4 !important;
            font-weight: bold;
            text-decoration: underline; /* Underline only active links */
        }

        .dropdown-menu {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            font-size: 15px; /* Dropdown menu font size */
        }

        /* Content Styling */
        h1, h2, h3, h5 {
            font-weight: bold;
        }

        h1 {
            font-size: 28px; /* Heading size from high-risk.php */
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 20px;
        }

        h5 {
            font-size: 18px;
        }

        p {
            font-size: 16px; /* Paragraph size consistent with body font size */
        }

        .fs-4 {
            font-size: 22px; /* Matches the large statistics text in high-risk.php */
            font-weight: bold;
        }

        /* Footer Styling */
        footer {
            background-color: #1abc9c;
            color: #ffffff;
            font-size: 16px; /* Footer font size */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Malnutrition Record System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/children') ? 'active' : '' ?>" href="/children">Child List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/children/dashboard') ? 'active' : '' ?>" href="/children/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/children/high-risk') ? 'active' : '' ?>" href="/children/high-risk">High Risk</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> <?= session()->get('username') ?: 'Guest' ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> Profile
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="/login">Login</a></li>
                                <li><a class="dropdown-item" href="/register">Register</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <footer class="text-center py-4 mt-5">
        <p>&copy; <?= date('Y') ?> Malnutrition Record System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
