<?php
require_once 'Product.php';

$pesan = '';
$edit = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aksi = $_POST['aksi'];

    if ($aksi === 'simpan') {
        $p = new Product();
        $p->setNama($_POST['nama'])
          ->setHarga($_POST['harga'])
          ->setStok($_POST['stok'])
          ->save();
        $pesan = "Data berhasil ditambah";
    }

    if ($aksi === 'update') {
        $p = new Product();
        $p->setNama($_POST['nama'])
          ->setHarga($_POST['harga'])
          ->setStok($_POST['stok'])
          ->update($_POST['id']);
        $pesan = "Data berhasil diubah";
    }

    if ($aksi === 'hapus') {
        Product::delete($_POST['id']);
        $pesan = "Data berhasil dihapus";
    }
}

if (isset($_GET['edit'])) {
    $edit = Product::findById($_GET['edit']);
}

$data = Product::findAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body { font-family: Arial, sans-serif; background: #e8f5e9; margin: 0; padding: 20px; }
        .box { max-width: 700px; margin: auto; background: white; padding: 20px; }
        h2 { background: #bbdefb; padding: 10px; margin-top: 0; }
        input { padding: 6px; margin-bottom: 10px; width: 100%; box-sizing: border-box; }
        button, .tombol { background: #bbdefb; border: 1px solid #90caf9; padding: 6px 12px; cursor: pointer; text-decoration: none; color: black; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #bbdefb; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .pesan { background: #c8e6c9; padding: 8px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Data Produk</h2>

    <?php if ($pesan): ?>
        <div class="pesan"><?= $pesan ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="aksi" value="<?= $edit ? 'update' : 'simpan' ?>">
        <?php if ($edit): ?>
            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
        <?php endif; ?>

        Nama
        <input type="text" name="nama" value="<?= $edit ? htmlspecialchars($edit['nama']) : '' ?>" required>

        Harga
        <input type="number" name="harga" value="<?= $edit ? $edit['harga'] : '' ?>" required>

        Stok
        <input type="number" name="stok" value="<?= $edit ? $edit['stok'] : '' ?>" required>

        <button type="submit"><?= $edit ? 'Update' : 'Simpan' ?></button>
        <?php if ($edit): ?>
            <a href="index.php" class="tombol">Batal</a>
        <?php endif; ?>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['nama']) ?></td>
            <td><?= $item['harga'] ?></td>
            <td><?= $item['stok'] ?></td>
            <td>
                <a href="index.php?edit=<?= $item['id'] ?>" class="tombol">Edit</a>
                <form method="post" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="aksi" value="hapus">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit" style="width:auto">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>