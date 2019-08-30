<?php 
session_start();
$con = mysqli_connect('localhost','root','','jcit_ebpls');

if(isset($_POST['btnSubmit'])){
	$username = $_POST['username'];
	$password = $_POST['pass'];
	
    $sql = "SELECT * FROM jcit_owners where username_='".$username."' AND password_='".$password."'; " ;
    $login = mysqli_query($con,$sql);
    $loginvia = mysqli_fetch_assoc($login);
    $logins = mysqli_num_rows($login);
    
    // print_r($logins);

	if($logins>0){

    echo "<script>alert('Login approved! Welcome to the Online Payment.');window.location='payor.php';</script>";
    $_SESSION['owner_id']=$loginvia['owner_id'];
	}
    else{
        echo "<script>alert('Wrong username and password');window.location='index.php';</script>";
    }
}
?>
