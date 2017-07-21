<div class="row">
	<div class="col-sm-6">
		<div class="login-form"><!--login form-->
			<h2 class="text-center">Đăng nhập</h2>
			<form action="<?php echo base_url().'/customer/login' ?>" method="post" >
				<input type="email" name="email" placeholder="Email" />
				<input type="password" name="password" placeholder="Mật khẩu" />
				<span>
					<input type="checkbox" class="checkbox"> 
					Ghi nhớ
				</span>
				<button type="submit" class="btn btn-default">Đăng nhập</button>
			</form>
		</div><!--/login form-->
	</div>
	<div class="col-sm-1">
	    <h2 class="or text-center">Hoặc</h2>
	</div>
	<div class="col-sm-5">
		<div class="order-message">
			<p class="text-center">Mạng xã hội</p>
			<div class="social-auth-links text-center">
                <a href="#" class="btn btn-info btn-social btn-facebook btn-flat social_input"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
                <a href="#" class="btn btn-danger btn-social btn-google btn-flat social_input"><i class="fa fa-google-plus"></i> Đăng nhập bằng Google+</a>
            </div>
		</div>	
	</div>	
</div>
<style type="text/css">
	.social_input
	{
		margin-top: 25px;
	}
</style>