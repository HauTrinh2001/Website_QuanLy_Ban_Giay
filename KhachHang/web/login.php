<style>
	.mid-grid-left {
		display: none;
	}
</style>
<?php include("Layout_KhachHang_Header.php") ?>
<!----//End-bottom-header---->
<!---//End-header---->
<!--- start-content---->
<div class="content login-box">
	<div class="login-main">
		<div class="wrap">
			<h1>LOGIN OR CREATE AN ACCOUNT</h1>
			<div class="login-left">
				<h3>NEW CUSTOMERS</h3>
				<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				<a class="acount-btn" href="register.php">Creat an Account</a>
			</div>
			<div class="login-right">
				<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form method="post" action="login_submit.php">
					<div>
						<span>Email Address<label>*</label></span>
						<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
					</div>
					<div>
						<span>Password<label>*</label></span>
						<input type="password" name="password" pattern=".{6,}" required>
					</div>
					<a class="forgot" href="#">Forgot Your Password?</a>
					<input type="submit" value="login" />
				</form>
			</div>
			<div class="clear"> </div>
		</div>
	</div>
</div>
<!---- start-bottom-grids---->

<!---- //End-bottom-grids---->
<!--- //End-content---->
<!---start-footer---->

<?php include("Layout_KhachHang_Footer.php"); ?>
<!---//End-footer---->
<!---//End-wrap---->
</body>

</html>