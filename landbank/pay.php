<?php 
$con = mysqli_connect('localhost','root','','epayment_landbank');

if(isset($_POST['btnSubmit'])){
	$MerchantCode = $_POST['MerchantCode'];
	$MerchantRefNo = $_POST['MerchantRefNo'];
	$transacttype = $_POST['transacttype'];
	$PayorName = $_POST['PayorName'];
	$PayorEmail = $_POST['PayorEmail'];
	$Amounttopay = $_POST['Amounttopay'];
	$Hash = $_POST['Hash'];
		
	
	// $forHASH = md5($MerchantCode.$MerchantRefNo.str_replace(array('.'), '' , $Amounttopay));
	
	$forHASH = md5(str_replace(array('.'), '' , $Hash));
    
    $sql = "INSERT INTO landbank_info(MerchantCode,MerchantRefNo,Particulars,Amount,PayorName,PayorEmail,Hash) 
    values('$MerchantCode','$MerchantRefNo','transaction_type=$transacttype;Desc=$transacttype;Name=$PayorName','$Amounttopay','$PayorName','$PayorEmail','$forHASH')";

	if($transacttype=="#"){
	echo "<script>alert('Please choose the transaction type');window.location='payor.php';</script>";
	}
    else{
		mysqli_query($con,$sql);
        echo "<script>alert('Transaction Successful');window.location='payor.php';</script>";
    }
}
?>
