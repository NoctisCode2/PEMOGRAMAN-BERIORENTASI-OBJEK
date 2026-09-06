<?php

class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;

    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->setWarna($warna);
        $this->setKecepatan($kecepatan);
    }

    // Getter merek
    public function getMerek() {
        return $this->merek;
    }

    // Getter warna
    public function getWarna() {
        return $this->warna;
    }

    // Getter kecepatan
    public function getKecepatan() {
        return $this->kecepatan;
    }

    // Setter warna dengan validasi
    public function setWarna($warna) {
        if (empty($warna)) {
            throw new Exception("Warna tidak boleh kosong!");
        }

        if (strlen($warna) < 3) {
            throw new Exception("Warna minimal 3 karakter!");
        }

        $this->warna = $warna;
    }

    // Setter kecepatan dengan validasi
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            throw new Exception("Kecepatan tidak boleh negatif!");
        }

        if ($kecepatan > 200) {
            throw new Exception("Kecepatan maksimal 200 km/jam!");
        }

        $this->kecepatan = $kecepatan;
    }

    public function getInfo() {
        return "Merek: " . $this->getMerek() . 
               ", Warna: " . $this->getWarna() . 
               ", Kecepatan: " . $this->getKecepatan() . " km/jam";
    }

    public function jalankan() {
        return "Mobil berjalan...";
    }

    public function berhenti() {
        return "Mobil berhenti";
    }
}

$mobil1 = new Mobil("Toyota", "Merah", 80);
$mobil2 = new Mobil("Honda", "Hitam", 100);
$mobil3 = new Mobil("Suzuki", "Putih", 60);

echo $mobil1->getInfo() . "<br>";
echo $mobil1->jalankan() . "<br>";
echo $mobil1->berhenti() . "<br><br>";

echo $mobil2->getInfo() . "<br>";
echo $mobil2->jalankan() . "<br>";
echo $mobil2->berhenti() . "<br><br>";

echo $mobil3->getInfo() . "<br>";
echo $mobil3->jalankan() . "<br>";
echo $mobil3->berhenti();

?>