<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Form Register</h1>

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Nama"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
