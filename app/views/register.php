<!DOCTYPE html>
<html>
<head>
    <title>Register - Sistem Tabungan Mahasiswa</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <nav>
        <h1>Sistem Tabungan Mahasiswa</h1>
        <a href="index.php?url=home">Home</a>
    </nav>
    <main>
        <h2>Register</h2>
        <form method="POST" action="index.php?url=register">
            <div>
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="index.php?url=login">Login</a></p>
    </main>
</body>
</html>