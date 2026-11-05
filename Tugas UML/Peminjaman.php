<?php
 
class Peminjaman {
    private $idPeminjaman;
    private $tanggalPeminjaman;
    private $tanggalPengembalian;
    private $statusPeminjaman;
    private $anggota;
    private $buku;
    private $penyimpanan;
 
    public function __construct($idPeminjaman, $tanggalPeminjaman, $anggota, $buku, PenyimpananPeminjaman $penyimpanan) {
        $this->idPeminjaman = $idPeminjaman;
        $this->tanggalPeminjaman = $tanggalPeminjaman;
        $this->tanggalPengembalian = null;
        $this->statusPeminjaman = "Belum dicatat";
        $this->anggota = $anggota;
        $this->buku = $buku;
        $this->penyimpanan = $penyimpanan;
 
        $anggota->tambahPeminjaman($this);
        $buku->tambahPeminjaman($this);
    }
 
    public function catatPeminjaman() {
        $this->perbaruiStatus("Dipinjam");
    }
 
    public function catatPengembalian($tanggalKembali) {
        $this->tanggalPengembalian = $tanggalKembali;
        $this->perbaruiStatus("Dikembalikan");
    }
 
    public function perbaruiStatus($statusBaru) {
        $this->statusPeminjaman = $statusBaru;
        $this->penyimpanan->simpan($this);
    }
 
    public function getIdPeminjaman() {
        return $this->idPeminjaman;
    }
 
    public function getTanggalPeminjaman() {
        return $this->tanggalPeminjaman;
    }
 
    public function getTanggalPengembalian() {
        return $this->tanggalPengembalian;
    }
 
    public function getStatusPeminjaman() {
        return $this->statusPeminjaman;
    }
 
    public function getAnggota() {
        return $this->anggota;
    }
 
    public function getBuku() {
        return $this->buku;
    }
}
