<?php
 
class Buku {
    private $kodeBuku;
    private $judul;
    private $penulis;
    private $tahunTerbit;
    private $daftarPeminjaman = [];
 
    public function __construct($kodeBuku, $judul, $penulis, $tahunTerbit) {
        $this->kodeBuku = $kodeBuku;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }
 
    public function getDetailBuku() {
        return $this->kodeBuku . " - " . $this->judul . " oleh " . $this->penulis . " (" . $this->tahunTerbit . ")";
    }
 
    public function tambahPeminjaman($peminjaman) {
        $this->daftarPeminjaman[] = $peminjaman;
    }
 
    public function getDaftarPeminjaman() {
        return $this->daftarPeminjaman;
    }
 
    public function getJudul() {
        return $this->judul;
    }
}
