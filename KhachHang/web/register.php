<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<style>
	.mid-grid-left {
		display: none;
	}
</style>
<?php

include("Layout_KhachHang_Header.php");
if (isset($_SESSION['email'])) {
	header('location: index.php'); //điều hướng đến trang này
}
?>


<!----//End-bottom-header---->
<!---//End-header---->
<!--- start-content---->
<div class="content login-box">
	<div class="login-main">
		<div class="wrap">
			<h1>CREATE AN ACCOUNT</h1>
			<div class="register-grids">
				<form action="user_registration_script.php" method="post">
					<div class="register-top-grid">
						<h3>PERSONAL INFORMATION</h3>
						<div>
							<span>First Name<label>*</label></span>
							<input type="text" name="firstname" required="true">
						</div>
						<div>
							<span>Last Name<label>*</label></span>
							<input type="text" name="lastname" required="true">
						</div>
						<div>
							<span>Email Address<label>*</label></span>
							<input type="email" name="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						</div>
						<div class="clear"> </div>
						<a class="news-letter" href="#">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
						</a>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
					<div class="register-bottom-grid">
						<h3>LOGIN INFORMATION</h3>
						<div>
							<span>Password<label>*</label></span>
							<input type="password" name="password" required="true" pattern=".{6,}"> <!-- password > 6 ký tự -->
						</div>
						<div>
							<span>Confirm Password<label>*</label></span>
							<input type="password" name="ConfirmPassword" required="true" pattern=".{6,}"> <!-- password > 6 ký tự -->
						</div>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
					<input type="submit" value="submit" name="submit" />
				</form>
			</div>
		</div>
	</div>
</div>
<!---- start-bottom-grids---->
<?php include("Layout_KhachHang_Footer.php"); ?>
<!---//End-footer---->
<!---//End-wrap---->
</body>

</html>