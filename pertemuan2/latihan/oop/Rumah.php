<?php

class rumah {

    public $warna;
    public $jumlahKamar;
    public $alamat;

    public function __construct($warna, $alamat) {
        $this->warna =$warna;
        $this->alamat =$alamat;
    }

   
}

function pasanglistrik( Rumah $dataRumah ) {
    return "Listrik sedang dipasang di rumah" . $dataRumah -> warna . 
    "yang beralamat di " . $dataRumah->alamat;
}

$rumahSaya = new Rumah ("Merah", "Jln. Merdeka 10");



echo pasanglistrik($rumahSaya);

echo"<br>";

$teksBiasa = "ini cuman String";

?>