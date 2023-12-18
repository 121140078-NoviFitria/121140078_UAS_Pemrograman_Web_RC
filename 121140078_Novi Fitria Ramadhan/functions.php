<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","dbtk");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [] ;
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    //ambil data dari tiap elemen
    $nama= htmlspecialchars($data["nama"]) ;
    $nik= htmlspecialchars( $data["nik"]);
    $alamat= htmlspecialchars($data["alamat"]) ;
    $gender = htmlspecialchars($data["gender"]);
    $daftar = htmlspecialchars($data["daftar"]);

    //query insert data
    $query = "INSERT INTO siswa VALUES ('','$nama','$nik','$alamat','$gender','$daftar') ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);

}


function ubah($data){
    global $conn;
    //ambil data dari tiap elemen
    $id =  $data["id"];
    $nama= htmlspecialchars($data["nama"]) ;
    $nik= htmlspecialchars( $data["nik"]);
    $alamat= htmlspecialchars($data["alamat"]) ;
    $gender= htmlspecialchars($data["gender"]) ;
    $daftar= htmlspecialchars($data["daftar"]) ;

    //query insert data
    $query = "UPDATE siswa SET
                nama = '$nama',
                nik = '$nik',
                alamat = '$alamat',
                gender = '$gender',
                daftar = '$daftar'
            WHERE id = $id
            ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari($keyword) {
    $query = "SELECT * FROM siswa
                WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%'OR
            gender LIKE '%$keyword%'OR
            daftar LIKE '%$keyword%'
        ";
    return query($query);
}

