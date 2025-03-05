<!DOCTYPE html>
<html>
<head>
    <title>Save - Sistem Tabungan Mahasiswa</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <nav>
        <h1>Sistem Tabungan Mahasiswa</h1>
        <a href="index.php?url=home">Home</a>
    </nav>
    <main>
        <h2>Make a Saving</h2>
        <form method="POST" action="index.php?url=save">
            <div>
                <label>Amount (Rp)</label>
                <input type="number" name="amount" required>
            </div>
            <div>
                <label>Message</label>
                <textarea name="message" required></textarea>
            </div>
            <button type="submit">Save</button>
        </form>
    </main>
</body>
</html>