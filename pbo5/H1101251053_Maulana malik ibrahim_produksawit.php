<?php

class ProdukSawit {
    
    private $jenis; 
    private $kualitas;
    private $beratTon;
    private $hargaPerKg;

    // Getter
    public function getJenis() {
        return $this->jenis;
    }

    public function getKualitas() {
        return $this->kualitas;
    }

    public function getBeratTon() {
        return $this->beratTon;
    }

    public function getHargaPerKg() {
        return $this->hargaPerKg;
    }
    
    // Setter dengan Validasi
    public function setJenis($jenis) {
        if (trim($jenis) == "") {
            echo "Error: Jenis sawit tidak boleh kosong!<br>";
        } else {
            $this->jenis = $jenis;
        }
    }

    public function setKualitas($kualitas) {
        $this->kualitas = $kualitas;
    }

    public function setBeratTon($beratTon) {
        if ($beratTon <= 0) {
            echo "Error: Berat harus lebih dari 0 Ton!<br>";
        } else {
            $this->beratTon = $beratTon;
        }
    }

    public function setHargaPerKg($hargaPerKg) {
        if ($hargaPerKg < 0) {
            echo "Error: Harga tidak valid!<br>";
        } else {
            $this->hargaPerKg = $hargaPerKg;
        }
    }
}

// Instansiasi Object
$sawit = new ProdukSawit();

// Set Data Produk
$sawit->setJenis("Tandan Buah Segar (TBS)");
$sawit->setKualitas("Grade A");
$sawit->setBeratTon(25); 
$sawit->setHargaPerKg(2300); 

// Tampilkan Data
echo "<h3>Data Produk Kelapa Sawit</h3>";
echo "Jenis Produk: " . $sawit->getJenis() . "<br>";
echo "Kualitas: " . $sawit->getKualitas() . "<br>";
echo "Total Berat: " . $sawit->getBeratTon() . " Ton<br>";
echo "Harga per Kg: Rp " . $sawit->getHargaPerKg() . "<br>";

?>