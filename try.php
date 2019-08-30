<!DOCTYPE html>
<html lang="en">
<head>
	<title>ePayment Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
	.input100{
		height:50px;
	}

</style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form method="POST" action="pay.php">
					<span class="login100-form-title p-b-15">
						LANDBANK ePayment Portal
					</span>

					<div class="p-t-21 p-b-9">
						<span class="txt1">
                        Merchant Code
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "MerchantCode is required">
                        <input type="text" name="MerchantCode" id="MerchantCode" class="input100 numeric" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
                        Merchant Reference No
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Reference No is required">
                        <input type="text" name="MerchantRefNo" id="MerchantRefNo" class="input100 numeric" required>
						<span class="focus-input100"></span>
                    </div>
             
                   
					<div class="p-t-13 p-b-9">
						<span class="txt1">
                        Transaction for paying
						</span>
					</div>
					<div class="wrap-input100 validate-input">
                        <select class="input100" name="transacttype" id="transacttype">
							<option value="#">--Select here--</option>
							<option value="erpts">Real Property Tax</option>
							<option value="ebpls">Business Permit</option>
						</select>
						<span class="focus-input100"></span>
                    </div>
                     <div class="p-t-13 p-b-9">
						<span class="txt1">
                        Payor's Name
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "PayorName is required">
                        <input type="text" name="PayorName" id="PayorName" class="input100" required>
						<span class="focus-input100"></span>
                    </div>
                    <div class="p-t-13 p-b-9">
						<span class="txt1">
                        Payor's Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "PayorEmail is required">
 					<input type="text" name="PayorEmail" class="input100" required>
				
						<span class="focus-input100"></span>
                    </div>
                    <div class="p-t-13 p-b-9">
						<span class="txt1">
                        Amount To Pay
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Amount is required">
                        <input type="text" name="Amounttopay" id="Amounttopay" class="input100 numeric" required>
						<span class="focus-input100"></span>
                    </div>
					
					<!-- HIDDEN FOR POSTING -->
					<input type="hidden" name="Particulars" id="Particulars"  class="input100" >
							<input type="number" name="Hash" id="Hash" class="input100" hidden>

					<div class="container-login100-form-btn m-t-25">
						<button class="login100-form-btn" type="submit" name="btnSubmit">
							Click to Pay
						</button>
					</div>
              <br>
					<!-- <div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Sign up now
						</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.numeric.js"></script>
	<script>
		$(document).ready(function(){
  			 $(".numeric").numeric();
		});
	</script>

	<script>
	
		$("#PayorName").keyup(function(){
			$("#Particulars").val('transaction_type='+$("#transacttype").val()+';Desc='+$("#transacttype").val()+';Name='+$(this).val()+';');
		 });
		$("#transacttype").click(function(){
			$("#Particulars").val('transaction_type='+$(this).val()+';Desc='+$("#transacttype").val()+';Name='+$("#PayorName").val()+';');
		 }); 
		$("#MerchantCode").keyup(function(){
			$("#Hash").val($(this).val()+''+$("#MerchantRefNo").val()+$("#Amounttopay").val());
		 });
		 $("#MerchantRefNo").keyup(function(){
			$("#Hash").val($("#MerchantCode").val()+''+$(this).val()+$("#Amounttopay").val());
		 });
		 $("#Amounttopay").keyup(function(){
			$("#Hash").val($("#MerchantCode").val()+''+$("#MerchantRefNo").val()+$(this).val());
		 });

	</script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>