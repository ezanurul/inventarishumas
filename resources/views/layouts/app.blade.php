<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inventaris Humas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            display: flex;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
        }
        nav {
            width: 220px;
            height: 100vh;
            background-color: #0a2a52;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
        }
        nav h4 {
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 20px;
        }
        nav a, nav form button {
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            text-align: left;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            width: 100%;
            font-size: 16px;
            transition: background 0.2s ease-in-out;
        }
        nav a:hover, nav form button:hover {
            background-color: #103a6d;
            cursor: pointer;
        }
        nav a i, nav form button i {
            margin-right: 10px;
        }
        .content {
            flex: 1;
            padding: 30px;
        }
    </style>
</head>
<body>

    <nav>
        <h4><i class="bi bi-box-seam"></i> Inventaris Humas</h4>
        <a href="/barang"><i class="bi bi-archive"></i> Stock Barang</a>
        <a href="/masuk"><i class="bi bi-box-arrow-in-down"></i> Barang Masuk</a>
        <a href="/keluar"><i class="bi bi-box-arrow-up"></i> Barang Keluar</a>
        <a href="/log"><i class="bi bi-clock-history"></i> Log Aktivitas</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
    </nav>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
