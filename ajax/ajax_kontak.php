<?php 
require_once '../koneksi.php';

if($_GET['action'] == "table_data"){


		$columns = array( 
	                            0 =>'id_mrtl', 
	                            1 =>'nama',
	                            2=> 'nama_bagian',
	                            3=> 'wilayah_kerja',
	                            4=> 'no_telp',
	                            5=> 'id_mrtl',
	                        );

		$querycount = $mysqli->query("SELECT count(id_mrtl) as jumlah FROM tb_mrtl");
		$datacount = $querycount->fetch_array();
	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
            
        if(empty($_POST['search']['value']))
        {            
        	$query = $mysqli->query("SELECT id_mrtl,nama,nama_bagian,wilayah_kerja,no_telp FROM tb_mrtl natural join tb_bagian order by $order $dir 
        																LIMIT $limit 
        																OFFSET $start");
        }
        else {
            $search = $_POST['search']['value']; 
            $query = $mysqli->query("SELECT id_mrtl,nama,nama_bagian,wilayah_kerja,no_telp FROM tb_mrtl natural join tb_bagian WHERE nama LIKE '%$search%' 
            															or wilayah_kerja LIKE '%$search%' 
            															order by $order $dir 
            															LIMIT $limit 
            															OFFSET $start");


           $querycount = $mysqli->query("SELECT count(id_mrtl) as jumlah FROM tb_mrtl WHERE nama LIKE '%$search%' 
       																						or wilayah_kerja LIKE '%$search%'");
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
                $nestedData['nama'] = $r['nama'];
                $nestedData['nama_bagian'] = $r['nama_bagian'];
                $nestedData['wilayah_kerja'] = $r['wilayah_kerja'];
                $nestedData['no_telp'] = $r['no_telp'];
                $nestedData['aksi'] = "<a href='#' class='btn btn-warning'>Ubah</a>&nbsp; <a href='#' class='btn btn-danger '>Hapus</a>";
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