<?php 

// $mahasiswa = [
//     [
//         "nama" => "Nur Aminah",
//         "nim" => "2217020069",
//         "email" => "amina020103@gmail.com"
//     ],
//     [
//         "nama" => "Anita",
//         "nim" => "2217020046",
//         "email" => "anitavaa@gmail.com"
//     ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=rest iap', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;

?>