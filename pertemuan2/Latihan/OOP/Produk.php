<?php

class Produk {
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;

    // Konstruktor yang benar menggunakan dua underscore
    public function __construct($judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
}

// Contoh penggunaan:
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
echo $produk1->getLabel(); // Output: Masashi Kishimoto, Shonen Jump

?>