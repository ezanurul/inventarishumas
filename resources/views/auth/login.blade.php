<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Inventaris Barang Humas</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b2447; /* Warna navy tua */
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container img {
            width: 100%;
            max-height: 140px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h2 {
            color: #0b2447;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            color: #1e1e1e;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #0b2447;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #091b34;
        }

        .error {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('images/kampus.png') }}" alt="Kampus UTDI">
        <h2>Login Inventaris Humas</h2>
        <form method="POST" action="/login">
            @csrf
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
    </div>
</body>
</html>
