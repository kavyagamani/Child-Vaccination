<?php
session_start();
 $a=md5($_POST['new_password']);
   	$b=md5($_POST['confirm_password']);
	
		include('../dbconnect/dbconnect.php');

 $sql = "select * from login where username ='".$_SESSION['uname']."' and password='".md5($_POST['old_password'])."'";
		 $res=mysqli_query($conn,$sql);
	if($a==$b)
	{
		if(mysqli_num_rows($res)>0)
		{
			 $sql1 = "update login set password = '".md5($_POST['new_password'])."' where username  ='".$_SESSION['uname']."'";
			$res1 = mysqli_query($conn,$sql1);
			?>
				<script>
				alert('Successfully updated your password');
			document.location="Change_Password.php";
				</script>
			<?php
		} else
		{
			?>
				<script>
					alert('Failed to update your password');
					document.location="Change_Password.php";
				</script>
			<?php
		}
	}else
		{
			?>
				<script>
					alert('New Password and Retype Password do not match');
					document.location="Change_Password.php";
				</script>
			<?php
		}
		
?>
