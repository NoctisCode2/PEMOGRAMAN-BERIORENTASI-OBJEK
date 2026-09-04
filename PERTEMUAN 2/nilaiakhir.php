<?php

function hitungNilaiAkhir($uts, $uas, $tugas)
{
    return ($uts * 0.30) + ($uas * 0.40) + ($tugas * 0.30);
}

$uts = 80;
$uas = 90;
$tugas = 85;

$nilaiAkhir = hitungNilaiAkhir($uts, $uas, $tugas);

echo "Nilai UTS = " . $uts . "<br>";
echo "Nilai UAS = " . $uas . "<br>";
echo "Nilai Tugas = " . $tugas . "<br>";
echo "Nilai Akhir = " . $nilaiAkhir;

?>