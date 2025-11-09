<?php
require_once 'Produk.php';
require_once 'Komik.php';


class Game extends Produk {
    public $waktuMain;

    public function __construct( $judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent ::__construct( $judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    //cara mengakses harga dari child class
    public function getHarga(){
        return $this ->harga;
    }
    public function getInfoProduk() {
        $infoParent = parent::getInfoProduk();
        return "Game : {$infoParent} - {$this->waktuMain} Jam.";
    }
    
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sonny Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

//Sudah tidak bisa mengakses dan mengubah harga 
// $produk1 -> harga = 12000;
// echo $produk1-> harga;

//Cara memanggil harga yang benar menggunakan method dari child class
echo $produk2->getHarga();
?>