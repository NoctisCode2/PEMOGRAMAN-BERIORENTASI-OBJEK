<?php
 
class Anggota {
    private $idAnggota;
    private $nama;
    private $alamat;
    private $noTelepon;
    private $daftarPeminjaman = [];
 
    public function __construct($idAnggota, $nama, $alamat, $noTelepon) {
        $this->idAnggota = $idAnggota;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->noTelepon = $noTelepon;
    }
 
    public function getDetailAnggota() {
        return $this->idAnggota . " - " . $this->nama . " (" . $this->alamat . ", " . $this->noTelepon . ")";
    }
 
    public function tambahPeminjaman($peminjaman) {
        $this->daftarPeminjaman[] = $peminjaman;
    }
 
    public function getDaftarPeminjaman() {
        return $this->daftarPeminjaman;
    }
 
    public function getNama() {
        return $this->nama;
    }
}
