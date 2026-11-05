<?php
require_once 'Anggota.php';
require_once 'Buku.php';
require_once 'Pendukung.php';
require_once 'Peminjaman.php';
 
$budi = new Anggota("A001", "Budi Santoso", "Jl. Ahmad Yani No. 10", "081234567890");
$siti = new Anggota("A002", "Siti Aminah", "Jl. Gajah Mada No. 5", "082198765432");
$buku1 = new Buku("B001", "Pemrograman PHP", "Andi Wijaya", 2020);
$buku2 = new Buku("B002", "Basis Data", "Rina Lestari", 2019);
 
echo "== Data Anggota dan Buku ==" . PHP_EOL;
echo $budi->getDetailAnggota() . PHP_EOL;
echo $siti->getDetailAnggota() . PHP_EOL;
echo $buku1->getDetailBuku() . PHP_EOL;
echo $buku2->getDetailBuku() . PHP_EOL;
 
$penyimpanan = new PenyimpananMemori();
 
$p1 = new Peminjaman("P001", new DateTime("2026-10-01"), $budi, $buku1, $penyimpanan);
$p1->catatPeminjaman();
$p2 = new Peminjaman("P002", new DateTime("2026-10-05"), $budi, $buku2, $penyimpanan);
$p2->catatPeminjaman();
$p3 = new Peminjaman("P003", new DateTime("2026-10-06"), $siti, $buku1, $penyimpanan);
$p3->catatPeminjaman();
 
echo PHP_EOL . "== Relasi ==" . PHP_EOL;
echo "Budi melakukan " . count($budi->getDaftarPeminjaman()) . " peminjaman" . PHP_EOL;
echo "Siti melakukan " . count($siti->getDaftarPeminjaman()) . " peminjaman" . PHP_EOL;
echo "Buku " . $buku1->getJudul() . " dicatat di " . count($buku1->getDaftarPeminjaman()) . " peminjaman" . PHP_EOL;
 
$p1->catatPengembalian(new DateTime("2026-10-12"));
$p2->catatPengembalian(new DateTime("2026-10-10"));
$p3->perbaruiStatus("Hilang");
 
$dendaMahasiswa = new PerhitunganDenda(new DendaMahasiswa());
$dendaDosen = new PerhitunganDenda(new DendaDosen());
 
echo PHP_EOL . "== Denda ==" . PHP_EOL;
echo "Denda P001 (aturan mahasiswa): Rp" . $dendaMahasiswa->hitung($p1) . PHP_EOL;
echo "Denda P001 (aturan dosen): Rp" . $dendaDosen->hitung($p1) . PHP_EOL;
echo "Denda P002 (aturan mahasiswa): Rp" . $dendaMahasiswa->hitung($p2) . PHP_EOL;
 
echo PHP_EOL . "== Daftar Peminjaman ==" . PHP_EOL;
foreach ($penyimpanan->semua() as $p) {
    echo $p->getIdPeminjaman() . " | " . $p->getAnggota()->getNama() . " | " . $p->getBuku()->getJudul() . " | " . $p->getStatusPeminjaman() . PHP_EOL;
}
