<?php

//definisikan nama file json yaitu peserta json
define('FILE_JSON','peserta.json');

function cekFileJson(): void {
    if (!file_exists ( FILE_JSON)) { //tanda ! itu bisa dibilang jika tidak ada atau tidak
        file_put_contents (FILE_JSON,  json_encode(value: []));
    }
}

function bacaDataJson(): mixed {
    //dibawah ini untuk mengenal data json yang ada tipe data array, lalu di konversi melalui json_code dan dikembalikan hasil konversi ke fungsi dengan perintah "return"
    return json_decode( file_get_contents (FILE_JSON),  true); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    cekFileJson();

    //dibawah ini mengambil variable dan taro indeks.html
    $kode = $_POST['kode'];   
    $nama = $_POST['nama'];   
    $email = $_POST['email'];   
    $hp = $_POST['hp'];   
    $alamat = $_POST['alamat']; 

    //dibawah ini fungsinya memanggil bacadatajson()
    $data_peserta = bacaDataJson();


//cek apakah data peserta sudah ada
for ($i = 0; $i < count($data_peserta); $i++) {
    if ($data_peserta[$i]['kode'] === $kode) {
        //tampilan pesan peserta sudah ada
         echo "<script>alert('Data dengan kode $kode sudah ada!');</script>";
        //setelah tombol ok di klik pd pesan, alihkan halaman ke indeks.html
        echo "<script>window.location.href='FormData.html';</script>";
        exit;
    }
}

$data_peserta[] = [
    'kode' => $kode,
    'nama' => $nama,
    'email'=> $email, 
    'hp'=> $hp, 
    'alamat'=> $alamat
];
    file_put_contents (FILE_JSON, json_encode( $data_peserta,  JSON_PRETTY_PRINT));
    echo "<script>alert('Data Berhasil ditambahkan!');</script>";

    echo "<script>window.location.href='FormData.html';</script>";
}
?>