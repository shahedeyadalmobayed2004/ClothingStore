<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clothing Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Custom style -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #eef2f3, #fdfbfb);
            color: #333;
        }

        main {
            flex: 1;
        }

        /* Navbar with glass effect */
        .navbar {
            background: rgba(30, 60, 114, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.75rem;
            color: #ffffff !important;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link {
            color: #e0e0e0 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
        }

        footer {
            background: #ffffff;
            color: #6c757d;
            padding: 1.2rem 0;
            font-size: 0.95rem;
            border-top: 1px solid #dee2e6;
            box-shadow: 0 -1px 8px rgba(0, 0, 0, 0.03);
        }

        .btn-primary {
            background-color: #2a5298;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1e3c72;
            box-shadow: 0 4px 12px rgba(30, 60, 114, 0.3);
        }

        .shadow-sm {
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08) !important;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">👕 Clothing Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            Categories
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Clothing Store App. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
