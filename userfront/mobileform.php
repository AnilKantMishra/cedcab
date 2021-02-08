<html>
<head>

</head>
<link rel="stylesheet" href="form.css">
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
<?php include 'sigupnav.php';?>
<center>
    <h1>Verify Mobile</h1>
    <form action="" method="POST">
 
  <div class="container" >
  <input type="text" id="number" name="number" placeholder="Enter Mobile Number Here" required="required" ><br><br>

  
<input type="button"  name="otp" id="otp" value="Generate Otp">


<br><br>
<div class="varemail" id="varemail">
    <label for="recotp" style="text-align: center;"><b>Verify</b></label>
    <input type="number" id="recotp" placeholder="Verify Here" name="recotp" required><br>
<br>
    <input type="button" name="verify" id="verify" value="Verify" type="button">
  
  </div>

  
</form> 
</center>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$("#otp").click(function(e)
		{
      var number = $("#number").val();   
				$.ajax(
					{
						url:'messagesend.php',
						type:'POST',
						data: {number:number},
						success:function(data)
						{
              console.log(data);
              $("#varemail").removeClass('varemail');
             
             
						}
					});
					
    });
    $("#verify").click(function(e)
		{
      var recotp = $("#recotp").val();
				$.ajax(
					{
						url:'messagesendverify.php',
						type:'POST',
						data: {recotp:recotp},
						success:function(data)
						{
              console.log(data);
                        
              if(data==1){

            $(location).attr('href', 'signupfull.php');
            }
            else{
            alert("wrong otp");
            }  
						}
					});				
    });

</script>
<?php include 'footer.php';?>
<style> 
.varemail{
  display: none;
} </style>
</html>
