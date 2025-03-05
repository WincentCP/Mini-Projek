<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Sistem Tabungan Mahasiswa</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <nav>
        <h1>Sistem Tabungan Mahasiswa - Admin Dashboard</h1>
        <div>
            <a href="index.php?url=home">Home</a>
            <a href="index.php?url=logout">Logout</a>
        </div>
    </nav>
    <main>
        <h2>Users</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <!-- Menampilkan data pengguna dengan sanitasi untuk keamanan -->
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Tabel untuk menampilkan semua data tabungan -->
        <h2>All Savings</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($savings as $saving): ?>
                <tr>
                    <td><?php echo $saving['id']; ?></td>
                    <td><?php echo htmlspecialchars($saving['name']); ?></td>
                    <td>Rp<?php echo number_format($saving['amount']); ?></td>
                    <td><?php echo htmlspecialchars($saving['message']); ?></td>
                    <td><?php echo $saving['created_at']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>