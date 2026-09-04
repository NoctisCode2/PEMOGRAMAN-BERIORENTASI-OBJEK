<?php
class persegipanjang{
    public $panjang;
    public $lebar;

    public function luas() {
        return $this->panjang * $this->lebar;
    }
}
$kotak = new persegipanjang();
$kotak->panjang = 10;
$kotak->lebar = 5;

$kotak2 = new persegipanjang();
$kotak2->panjang = 15;
$kotak2->lebar = 5;

echo "kotak1 = ".$kotak->luas()."<br>";
echo "kotak2 = ".$kotak2->luas();
?>