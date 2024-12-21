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
    </div>
  </nav>
<div class="container"> 
  <div class="card mt-5">
   <div class="card-header bg-dark text-white"><h6>LOGIN</h6></div>
     <div class="card-body ml-3">
     <form action="login.php" method="post" class="ml-5">
      <div class="row">    
        <div class="col-lg-3"></div>  
       <div class="col-lg-5">      
		<div class="form-group">
			<label>USERNAME :</label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
			<label>PASSWORD :</label>
			<input type="password" class="form-control" name="pass">
		</div>
       
           <input type="submit" class="btn btn-primary" value="LOG IN" name="login">
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