
<!DOCTYPE html>
<html lang="en">
<head>
  
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"
    type="fba300a1f1403a543a50634b-text/javascript"></script>

  
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php include 'sigupnav.php';?>


<link rel="stylesheet" href="form.css">
<center>
<h1>Verify Email</h1>
<form action="" method="post">

  <div class="container" >
  
  <label for="email" style="text-align: center;"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" id="email" name="email"  required><br><br>
    <input type="button"  name="ressub" id="otp" value="Generate otp"><br><br>
  
  <div class="varemail" id="varemail">
  <label for="recotp" style="text-align: center;"><b>Verify</b></label>
    <input type="number" id="recotp" placeholder="Verify Here" name="recotp" required><br>
<br>
    <input type="button" name="verify" id="verify" value="Verify" type="button"  >

  </div>
</div>

</form> 
</center>

<?php include 'footer.php';?>
  
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  
  $("#otp").click(function()
		{

        var email = $("#email").val();
				$.ajax(
					{
						url:'calculate.php',
						type:'POST',
						data: {email:email},
						success:function(data)
						{
              $("#varemail").removeClass('varemail');
						}
					});
				
        });
        $("#verify").click(function(e)
		{

     
      var recotp = $("#recotp").val();
				$.ajax(
					{
						url:'checkotp.php',
						type:'POST',
						data: {recotp:recotp},
						success:function(data)
						{

            if(data==1){
              $(location).attr('href', 'mobileform.php');
            }
            else{
              alert("wrong otp");
            }
                        
						}
					});
					
    });
      
         
  
		
</script>

<style> 
.varemail{
  display: none;
} </style>


</html>