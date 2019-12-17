<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_ssip");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM mahasiswa";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table table-striped table-hover table-sm table-bordered">
   <thead class="thead-dark">
        <tr>  
          <th><center>ID</center></th>
          <th><center>NIM</center></th>
          <th><center>NAMA MAHASISWA</center></th>
          <th><center>TEMPAT LAHIR</center></th>
          <th><center>TANGGAL LAHIR</center></th>
          <th><center>JENIS KELAMIN</center></th>
          <th><center>JURUSAN</center></th>
          <th><center>BATCH</center></th>
          <th><center>EMAIL</center></th>
          <th><center>ADDRESS</center></th>
          <th><center>MOBILE</center></th>
          <th><center>AKSI</center></th>
        </tr>
    </thead>
  ';
  while($data = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
          <td>'.$data['id'].'</td>
          <td>'.$data['nim'].'</td>
          <td>'.$data['nama'].'</td>
          <td>'.$data['tempat_lahir'].'</td>
          <td>'.$data['tanggal_lahir'].'</td>
          <td>'.$data['jenis_kelamin'].'</td>
          <td>'.$data['jurusan'].'</td>
          <td>'.$data['batch'].'</td>
          <td>'.$data['email'].'</td>
          <td>'.$data['address'].'</td>
          <td>'.$data['handphone'].'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/vnd-ms-xls');
  header('Content-Disposition: attachment; filename=Report Data Mahasiswa.xls');
  echo $output;
 }
}
?>