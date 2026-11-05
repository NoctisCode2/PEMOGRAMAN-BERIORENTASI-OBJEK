<?php

class Produk {
    protected $merek;
    protected $harga;

    public function __construct($merek, $harga) {
        if ($harga < 0) {
            $this->harga = 0;
        } else {
            $this->harga = $harga;
        }

        $this->merek = $merek;
    }

    public function getInfo() {
        return "Merek: $this->merek, Harga: Rp " .
               number_format($this->harga, 0, ',', '.');
    }
}

class Makanan extends Produk {
    private $nama;
    private $tanggalKadaluarsa;

    public function __construct($nama, $merek, $harga, $tanggalKadaluarsa) {
        parent::__construct($merek, $harga);

        $this->nama = $nama;
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    public function getInfo() {
        return "Produk: Makanan - $this->nama<br>" .
               "Merek: $this->merek<br>" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>" .
               "Tanggal Kadaluarsa: $this->tanggalKadaluarsa<br>" .
               "Status: Segar";
    }
}

class Elektronik extends Produk {
    private $nama;
    private $garansi;

    public function __construct($nama, $merek, $harga, $garansi) {
        parent::__construct($merek, $harga);

        $this->nama = $nama;
        $this->garansi = $garansi;
    }

    public function getInfo() {
        return "Produk: Elektronik - $this->nama<br>" .
               "Merek: $this->merek<br>" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>" .
               "Garansi: $this->garansi bulan";
    }
}

$makanan = new Makanan(
    "Mie Instan",
    "Indomie",
    3500,
    "2025-06-30"
);

$elektronik = new Elektronik(
    "Smart TV",
    "Samsung",
    5000000,
    12
);

echo $makanan->getInfo();
echo "<br><br>";

echo $elektronik->getInfo();

?>