<?php


interface Bentuk {
    public function hitungLuas();
    
    public function getDeskripsi(); 
}


class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }

    public function getDeskripsi() {
        return "Luas Persegi (sisi=" . $this->sisi . ")";
    }
}


class Lingkaran implements Bentuk {
    private $radius;
    
    const PHI = 3.14; 

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function hitungLuas() {
        return self::PHI * $this->radius * $this->radius;
    }

    public function getDeskripsi() {
        return "Luas Lingkaran (radius=" . $this->radius . ")";
    }
}


$kumpulanBentuk = [
    new Persegi(5),
    new Lingkaran(7)
];


foreach ($kumpulanBentuk as $bentuk) {
    echo $bentuk->getDeskripsi() . ": " . $bentuk->hitungLuas() . "<br>\n";
}

?>