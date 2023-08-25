<?php
 
// DB table to use
$table = 'tb_bup';
 
// Table's primary key
$primaryKey = 'id_bup';
 

// Array kolom basisdata akan dikirim kembali ke DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// 'db' mewakili parameter kolom database
// 'dt' adalah parameter yang akan ditampilkan di database pada index.php

$columns = array(
    array(  'db' => 'nama_penerima', 'dt' => 'nama_penerima' ),
    array(  'db' => 'usia',  'dt' => 'usia' ),
    array(  'db' => 'thn_skr',   'dt' => 'thn_skr' ),
    array(  'db' => 'kota',   'dt' => 'kota' )

);
 
//melakukan koneksi ke database
$sql_details = array(
    'user' => 'u1486468_db_bws',
    'pass' => 'PARagraph220123_',
    'db'   => 'u1486468_db_bws',
    'host' => 'localhost'
);

//code di bawah tidak perlu diedit

require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);