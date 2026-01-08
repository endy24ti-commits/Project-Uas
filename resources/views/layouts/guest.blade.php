<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Guest</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #003973, #5f2c82);
            color: #fff;
        }

        .navbar {
            background: transparent;
        }

        /* Navbar login/register */
        .navbar .btn-sm {
            border-radius: 8px;
        }

        /* Wrapper untuk foto alat */
        .img-wrapper {
            height: 220px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .img-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        /* Harga */
        .price {
            font-size: 14px;
            color: #555;
        }

        .price span {
            font-weight: 600;
            color: #000;
        }

        /* Badge tersedia */
        .status-badge {
            display: inline-block;
            background: linear-gradient(135deg, #28a745, #5ddf85);
            color: #fff;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            width: fit-content;
        }

        /* Tombol booking */
        .btn-booking {
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
            border: none;
            color: #fff;
            padding: 10px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-booking:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(13, 110, 253, 0.4);
        }

        /* Search + Kategori modern */
        .search-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .search-container input[type="text"] {
            flex: 1;
            height: 45px;
            border-radius: 8px;
            padding-left: 40px;
        }

        .search-container input[type="text"]::placeholder {
            color: #888;
        }

        .search-container .bi-search {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 1.1rem;
        }

        .search-container select {
            height: 45px;
            border-radius: 8px;
            max-width: 180px;
        }

        /* Wrapper input + icon relative */
        .input-icon-wrapper {
            position: relative;
            flex: 1;
        }

        /* Responsive mobile */
        @media (max-width: 576px) {
            .search-container {
                flex-direction: column;
                gap: 10px;
            }

            .search-container input[type="text"],
            .search-container select {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <span class="navbar-brand fw-bold"></span>
            <div class="ms-auto">
                <a href="/login" class="btn btn-outline-light btn-sm me-2">Login</a>
                <a href="/register" class="btn btn-light btn-sm">Register</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>