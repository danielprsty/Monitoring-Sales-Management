<?php 
require_once '../koneksi.php';

if($_GET['action'] == "table_data"){


		$columns = array( 
	                          0 =>'id_pensiunan', 
	                            1 =>'nama_penerima',
	                            2=> 'usia',
	                            3=> 'thn_skr',
	                            4=> 'kota',
	                            5=> 'tgl_lahir_penerima',
	                            6 =>'alamat_peserta', 
	                            7 =>'penpok',
	                            8=> 'thp',
	                            9=> 'kecamatan',
	                            10=> 'kelurahan',
	                            11=> 'nmkanbyr',
	                            12 =>'tmtpensiun', 
	                            13 =>'nomor_skep',
	                            14=> 'telepon',
	                            15=> 'awal_flag',
	                            16=> 'akhir_flag',
	                        );

		$querycount = $mysqli->query("SELECT count(id_pensiunan) as jumlah FROM tb_pensiunan");
		$datacount = $querycount->fetch_array();
	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
            
        if(empty($_POST['search']['value']))
        {            
        	$query = $mysqli->query("SELECT id_pensiunan,nama_penerima,usia,thn_skr,kota,tgl_lahir_penerima,alamat_peserta,penpok,thp,kecamatan,kelurahan,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag FROM tb_pensiunan order by $order $dir 
        																LIMIT $limit 
        																OFFSET $start");
        }
        else {
            $search = $_POST['search']['value']; 
            $query = $mysqli->query("SELECT id_pensiunan,nama_penerima,usia,thn_skr,kota,tgl_lahir_penerima,alamat_peserta,penpok,thp,kecamatan,kelurahan,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag FROM tb_pensiunan WHERE nama_penerima LIKE '%$search%'
            															order by $order $dir 
            															LIMIT $limit 
            															OFFSET $start");


           $querycount = $mysqli->query("SELECT count(id_pensiunan) as jumlah FROM tb_pensiunan WHERE nama_penerima LIKE '%$search%' ");
		   $datacount = $querycount->fetch_array();
           $totalFiltered = $datacount['jumlah'];
        }

        $data = array();
        if(!empty($query))
        {
            $no = $start + 1;
            while ($r = $query->fetch_array())
            {
                $nestedData['no'] = $no;
                 $nestedData['nama_penerima'] = $r['nama_penerima'];
                $nestedData['usia'] = $r['usia'];
                $nestedData['thn_skr'] = $r['thn_skr'];
                $nestedData['kota'] = $r['kota'];
                $nestedData['tgl_lahir_penerima'] = $r['tgl_lahir_penerima'];
                $nestedData['alamat_peserta'] = $r['alamat_peserta'];
                $nestedData['penpok'] = $r['penpok'];
                $nestedData['thp'] = $r['thp'];
                $nestedData['kecamatan'] = $r['kecamatan'];
                $nestedData['kelurahan'] = $r['kelurahan'];
                $nestedData['nmkanbyr'] = $r['nmkanbyr'];
                $nestedData['tmtpensiun'] = $r['tmtpensiun'];
                $nestedData['nomor_skep'] = $r['nomor_skep'];
                $nestedData['telepon'] = $r['telepon'];
                $nestedData['awal_flag'] = $r['awal_flag'];
                $nestedData['akhir_flag'] = $r['akhir_flag'];
                
                
                $data[] = $nestedData;
                $no++;
            }
        }
          
        $json_data = array(
                    "draw"            => intval($_POST['draw']),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 

}