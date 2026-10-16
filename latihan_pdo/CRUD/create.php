<?php
require_once '../Catatan.php';
$c = new Catatan();
$hasil = $c->setJudul("Keempat")
    ->setIsi("Belajar si sistem informasi mantap")
    ->save();
echo $hasil ? "Berhasil disimpan" : "Gagal";
