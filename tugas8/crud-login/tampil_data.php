<?php
session_start();
include "koneksi.php"; 
$npm=$_SESSION["npm"];
$level=$_SESSION["level"];

if($level=="")
{
  header("location:index.php");
}
elseif($level=="1")
{
  $sql="select * from identitas where npm='$npm'";
}
elseif($level=="2")
{
  $sql="select * from identitas";
}


?>





<html>
<head>
	<title>DAFTAR MAHASISWA</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> 
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.min.js"></script>    
     <script src="vendor/bootstrap/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
     <link href="vendor/bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>     
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">DATA MAHASISWA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="btn btn-warning" onClick="document.location.href='<?php echo "logout.php";?>'">LOGOUT</button>
    </div>
  </nav>
<div class="container"> 
  <div class="card mt-5">
   <div class="card-header bg-dark text-white"><h6>DAFTAR MAHASISWA</h6></div>
     <div class="card-body ml-3">
    <?php
         
    //tampilkan data  
     //$sql = "SELECT * FROM identitas";
    $result = $conn->query($sql);
   ?>     
    <tbody>       
    <table class="mt-3 table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>NPM</th>
				<th>NAMA</th>
                <th>ALAMAT</th>
                <th>JK</th>
                <th>TGL LAHIR</th>
                <th>EMAIL</th>
                <?php
                if($level=="2"):
                ?>
                <th>AKSI</th>
                <?php
                endif;
                ?> 
			</tr>
		</thead>
		<tbody>
         <?php 
          if ($result->num_rows > 0) {
             // output data of each row
             $no=0;
             while($row = $result->fetch_assoc()) {
             	$no++;
                 $tgl = date('d-m-Y',strtotime($row['tgl_lhr']));
                 ?>
                     <tr>
                        
         				<td><?php echo $no;?></td>
         				<td><?php echo $row["npm"];?></td>
         				<td><?php echo $row["nama"];?></td>
                <td><?php echo $row["alamat"];?></td>
                <td><?php echo $row["jk"];?></td> 
                <td><?php echo $tgl;?></td> 
                <td><?php echo $row["email"];?></td> 
                        <?php
                        if($level=="2"):
                        ?>
                        <td><button class="btn-xs btn-success" onClick="document.location.href='<?php echo "edit.php?id=".$row["npm"];?>'">Edit</button>
                             
                        
                        
                        <button class="btn-xs btn-danger" onClick="document.location.href='<?php echo "hapus.php?id=".$row["npm"];?>'">Hapus</button>
                       <?php
                        endif;
                      ?>   
                      
                      </td>
         			</tr>
             <?php        
             }
         } else {
             echo "0 results";
         }
         
         $conn->close();
         ?>
             </tbody>
             </table>
            <?php
            if($level=="2")
            {
            ?>
             <button class="btn btn-primary" onClick="document.location.href='<?php echo "input_data.php";?>'">Input Data</button>
             <?php
            }
             
             ?> 
             
            </div>      
  
      </div>
    </div>    
  
</body>
</html>

