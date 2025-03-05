<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistem Tabungan Mahasiswa</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <nav>
        <h1>Sistem Tabungan Mahasiswa</h1>
        <a href="index.php?url=home">Home</a>
    </nav>
    <main>
        <h2>Login</h2>
        <form method="POST" action="index.php?url=login">
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php?url=register">Register</a></p>
    </main>
</body>
</html>