<?php

abstract class ProdukOptik {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getHargaDasar() { return $this->hargaDasar; }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

class Kacamata extends ProdukOptik {
    private $minus;

    public function __construct($id, $nama, $hargaDasar, $minus) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->minus = $minus;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (30000 * $this->minus);
    }

    public function getJenis() {
        return "Kacamata";
    }

    public function cetakDetail() {
        return "Kacamata dengan ukuran minus {$this->minus}";
    }
}

class LensaKontak extends ProdukOptik {
    private $pasang;

    public function __construct($id, $nama, $hargaDasar, $pasang) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->pasang = $pasang;
    }

    public function hitungTotal() {
        $total = $this->hargaDasar * $this->pasang;
        if ($this->pasang > 2) {
            $total = $total - ($total * 0.15); 
        }
        return $total;
    }

    public function getJenis() {
        return "Lensa Kontak";
    }

    public function cetakDetail() {
        return "Lensa kontak {$this->pasang} pasang";
    }
}

class Aksesoris extends ProdukOptik {
    private $pcs;

    public function __construct($id, $nama, $hargaDasar, $pcs) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->pcs = $pcs;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (10000 * $this->pcs);
    }

    public function getJenis() {
        return "Aksesoris";
    }

    public function cetakDetail() {
        return "Aksesoris pelengkap sebanyak {$this->pcs} pcs";
    }
}

$pelanggan1 = new Kacamata("P1", "Maulana malik ibrahim", 200000, 2);
$pelanggan2 = new LensaKontak("P2", "roby", 100000, 3);
$pelanggan3 = new Aksesoris("P3", "chattama", 50000, 4);
$pelanggan4 = new Kacamata("P4", "rizqi", 250000, 1.5);
$pelanggan5 = new LensaKontak("P5", "iqbal", 120000, 1);

echo "<h3>Daftar Transaksi Pelanggan:</h3>";
echo "1. " . $pelanggan1->getNama() . " | " . $pelanggan1->getJenis() . " | " . $pelanggan1->cetakDetail() . " | Biaya: Rp " . number_format($pelanggan1->hitungTotal(), 0, ',', '.') . "<br>";
echo "2. " . $pelanggan2->getNama() . " | " . $pelanggan2->getJenis() . " | " . $pelanggan2->cetakDetail() . " | Biaya: Rp " . number_format($pelanggan2->hitungTotal(), 0, ',', '.') . "<br>";
echo "3. " . $pelanggan3->getNama() . " | " . $pelanggan3->getJenis() . " | " . $pelanggan3->cetakDetail() . " | Biaya: Rp " . number_format($pelanggan3->hitungTotal(), 0, ',', '.') . "<br>";
echo "4. " . $pelanggan4->getNama() . " | " . $pelanggan4->getJenis() . " | " . $pelanggan4->cetakDetail() . " | Biaya: Rp " . number_format($pelanggan4->hitungTotal(), 0, ',', '.') . "<br>";
echo "5. " . $pelanggan5->getNama() . " | " . $pelanggan5->getJenis() . " | " . $pelanggan5->cetakDetail() . " | Biaya: Rp " . number_format($pelanggan5->hitungTotal(), 0, ',', '.') . "<br><br>";

$totalKeseluruhan = $pelanggan1->hitungTotal() + 
                    $pelanggan2->hitungTotal() + 
                    $pelanggan3->hitungTotal() + 
                    $pelanggan4->hitungTotal() + 
                    $pelanggan5->hitungTotal();

echo "<h3>Total Pemasukan Keseluruhan: Rp " . number_format($totalKeseluruhan, 0, ',', '.') . "</h3>";
?>