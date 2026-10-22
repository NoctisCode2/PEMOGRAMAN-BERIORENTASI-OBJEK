<?php
require_once '../Product.php';

$p = new Product();
$hasil = $p->setNama("Pensil 2B")
           ->setHarga(3000)
           ->setStok(100)
           ->save();

echo $hasil ? "Berhasil disimpan" : "Gagal";