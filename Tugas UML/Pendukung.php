<?php
 
interface AturanDenda {
    public function hitung($hariTerlambat);
}
 
interface PenyimpananPeminjaman {
    public function simpan($peminjaman);
}
 
interface PembacaPeminjaman {
    public function semua();
}
 
class DendaMahasiswa implements AturanDenda {
    public function hitung($hariTerlambat) {
        return $hariTerlambat * 1000;
    }
}
 
class DendaDosen implements AturanDenda {
    public function hitung($hariTerlambat) {
        return $hariTerlambat * 500;
    }
}
 
class PenyimpananMemori implements PenyimpananPeminjaman, PembacaPeminjaman {
    private $data = [];
 
    public function simpan($peminjaman) {
        $this->data[$peminjaman->getIdPeminjaman()] = $peminjaman;
    }
 
    public function semua() {
        return array_values($this->data);
    }
}
 
class PerhitunganDenda {
    private $aturan;
 
    public function __construct(AturanDenda $aturan) {
        $this->aturan = $aturan;
    }
 
    public function hitung($peminjaman) {
        $kembali = $peminjaman->getTanggalPengembalian();
        if ($kembali === null) {
            return 0;
        }
 
        $lama = $peminjaman->getTanggalPeminjaman()->diff($kembali)->days;
        $terlambat = $lama - 7;
        if ($terlambat < 0) {
            $terlambat = 0;
        }
 
        return $this->aturan->hitung($terlambat);
    }
}
