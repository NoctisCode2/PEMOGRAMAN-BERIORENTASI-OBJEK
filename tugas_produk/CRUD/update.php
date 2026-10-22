<?php
require_once '../Product.php';

$id = 1;
$produkData = Product::findById($id);

if ($produkData) {
    $produk = new Product();
    $produk->setNama($produkData['nama'] . ' (Diperbarui)')
           ->setHarga($produkData['harga'])
           ->setStok($produkData['stok']);

    if ($produk->update($id)) {
        echo "Produk {$id} berhasil diperbarui";
    } else {
        echo "Gagal memperbarui produk";
    }
}