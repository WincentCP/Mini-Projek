<!DOCTYPE html>
<html>
<head>
    <title>Home - Sistem Tabungan Mahasiswa</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <nav>
        <h1>Sistem Tabungan Mahasiswa</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
        <div>
            Welcome, <?php echo $_SESSION['user_name']; ?>
            <?php if($_SESSION['user_role'] === 'admin'): ?>
            <a href="index.php?url=admin">Admin Dashboard</a>
            <?php endif; ?>
            <a href="index.php?url=save">Save</a>
            <a href="index.php?url=logout">Logout</a>
        </div>
        <?php else: ?>
        <div>
            <a href="index.php?url=login">Login</a>
            <a href="index.php?url=register">Register</a>
        </div>
        <?php endif; ?>
    </nav>
    <main>
        <!-- Ringkasan total tabungan pengguna -->
        <h2>Your Savings Summary</h2>
        <div class="summary-card">
            <h3>Total Savings</h3>
            <p>Rp<?php echo number_format($totalSavings); ?></p>
        </div>
        
        <!-- Riwayat tabungan pengguna -->
        <h2>Your Savings History</h2>
        <?php if(count($userSavings) > 0): ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($userSavings as $saving): ?>
                <tr>
                    <!-- Menampilkan data riwayat tabungan -->
                    <td><?php echo $saving['created_at']; ?></td>
                    <td>Rp<?php echo number_format($saving['amount']); ?></td>
                    <td><?php echo htmlspecialchars($saving['message']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>You don't have any savings yet. <a href="index.php?url=save">Start saving now!</a></p>
        <?php endif; ?>
    </main>
</body>
</html>