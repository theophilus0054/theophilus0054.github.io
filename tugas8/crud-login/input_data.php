<?php       
session_start();
if($_SESSION["level"]!="2")
{
  include "logout.php";
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
   <div class="card-header bg-dark text-white"><h6>INPUT BIODATA</h6></div>
     <div class="card-body ml-3">
     <form action="input.php" method="post" class="ml-5">
      <div class="row">    
        <div class="col-lg-2"></div>  
       <div class="col-lg-7">      
		<div class="form-group">
			<label>NPM :</label>
			<input type="text" class="form-control" name="npm">
		</div>
		<div class="form-group">
			<label>NAMA :</label>
			<input type="text" class="form-control" name="nama">
		</div>
        <div class="form-group">
			<label>Alamat :</label>
            <textarea class="form-control" rows="3" name="alamat"></textarea>
		</div>
        <div class="form-group">
			<label>Jenis Kelamin :</label><br/>
			<label class="radio-inline"><input type="radio" name="jk" value="L"> Laki-Laki</label>
            <label class="radio-inline"><input type="radio" name="jk" value="P"> Perempuan</label>
		</div> 
        <div class="form-group"> <!-- Date input -->
        <label>Tanggal Lahir :</label>
        <input class="form-control datepicker"  name="tgl_lhr" placeholder="DD-MM-YYYY" type="text">
       </div>
        <div class="form-group">
			<label>ALAMAT EMAIL :</label>
			<input type="text" class="form-control" name="email">
		</div>   
           
          <hr> 
           <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        </div>    
       </div> 
	  </form>		  
   
</div> 
</div>
</div>  
    
<script type="text/javascript">
    
     
 $(function(){
  $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>    
</body>
</html>