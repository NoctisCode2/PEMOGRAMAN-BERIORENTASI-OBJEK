<?php

class Product {
    public $nama;
    public $harga;
    public $kategori;

    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfo() {
        return "Nama: $this->nama, Harga: Rp $this->harga, Kategori: $this->kategori";
    }

    public function applyDiskon($persen) {
        $diskon = $this->harga * $persen / 100;
        $this->harga = $this->harga - $diskon;
    }
}

$produk1 = new Product("Laptop", 10000000, "Elektronik");
$produk2 = new Product("Mouse", 200000, "Aksesoris");

echo $produk1->getInfo() . "<br>";
$produk1->applyDiskon(10);
echo "Setelah diskon: " . $produk1->getInfo() . "<br><br>";

echo $produk2->getInfo() . "<br>";
$produk2->applyDiskon(20);
echo "Setelah diskon: " . $produk2->getInfo();

?>