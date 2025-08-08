<style>
    body {
        background-color: #886262ff;
    }
    /* Gaya untuk tabel */
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px Auto;
    }


    /* Gaya untuk judul tabel */
    th {
        background-color: #0735caff;
        /* Warna latar belakang hijau untuk judul */
        color: white;
        /* Warna teks putih */
        padding: 10px;
        text-align: left;
    }

    /* Gaya untuk data tabel */
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        /* Garis bawah pada setiap baris */
    }

    /* Warna selang-seling pada baris data */
    tr:nth-child(odd) {
        background-color: #f2f2f2;
        /* Warna abu-abu terang untuk baris ganjil */
    }

    tr:nth-child(even) {
        background-color: #ffffff;
        /* Warna putih untuk baris genap */
    }

    /* Gaya untuk tabel ketika disorot */
    tr:hover {
        background-color: #ddd;
        /* Warna latar belakang saat baris disorot */
    }

    
</style>

<?php
define('FILE_JSON', 'peserta.json');


function cekFileJson()
{
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);
    return json_decode($json, true);
}

$data_peserta = cekFileJson();
$total_data = count($data_peserta);
if ($total_data == 0) {
    echo "<table border='1'>
		  <th>No</th>
		  <th>Kode</th>
		  <th>Nama</th>
		  <th>Email</th>
		  <th>HP</th>
		  <th>Alamat</th>";
    echo "</table>";
    echo "<center><button onclick='window.location.href=\"FormData.html\";'>+</button></center>";
} else {
    echo "<table border='1'>
		  <th>No</th>
		  <th>Kode</th>
		  <th>Nama</th>
		  <th>Email</th>
		  <th>HP</th>
		  <th>Alamat</th>";

    for ($i = 0; $i < $total_data; $i++) {
        $peserta = $data_peserta[$i];

        // Menampilkan No
        echo "<tr><td>" . ($i + 1) . "</td>";

        // Menampilkan Kode peserta
        echo "<td>" . htmlspecialchars($peserta['kode']) . "</td>";

        // Menampilkan Nama peserta
        echo "<td>" . htmlspecialchars($peserta['nama']) . "</td>";

        // Menampilkan Email
        echo "<td>" . htmlspecialchars($peserta['email']) . "</td>";

        // Menampilkan nomer HP
        echo "<td>" . htmlspecialchars($peserta['hp']) . "</td>";

        // Menampilkan Alamat
        echo "<td>" . htmlspecialchars($peserta['alamat']) . "</td>";




        echo "</tr>";
    }
    echo "</table>";

    echo "<center><button onclick='window.location.href=\"FormData.html\";'>+</button></center>";
}

?>