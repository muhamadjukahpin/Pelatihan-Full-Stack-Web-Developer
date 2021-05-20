<?php

// Class, Object, Property & Method

class Product
{
    private $nama,
        $kategori,
        $harga,
        $qty;

    public function setNama(String $nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setKategori(String $kategori)
    {
        $this->kategori = $kategori;
    }

    public function getKategori()
    {
        return $this->kategori;
    }

    public function setHarga(Int $harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function setQty(Int $qty)
    {
        $this->qty = $qty;
    }

    public function getQty()
    {
        return $this->qty;
    }
}

$produk1 = new Product();
$produk1->setNama("Matematika");
$produk1->setKategori("Buku");
$produk1->setHarga(10000);
$produk1->setQty(5);

echo $produk1->getNama() . "<br>";
echo $produk1->getKategori() . "<br>";
echo $produk1->getHarga() . "<br>";
echo $produk1->getQty();
