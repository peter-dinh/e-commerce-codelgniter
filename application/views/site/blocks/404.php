<div class="container text-center">
	<div class="logo-404">
		<a href="<?php echo base_url(); ?>"><img src="/public/images/home/logo.png" alt="logo" /></a>
	</div>
	<div class="content-404">
		<img src="/public/images/404/404.png" class="img-responsive" alt="404" />
		<h2><b>OPPS!</b> Chúng tôi không thể tìm thấy trang bạn đã chọn</h2>
		<p>
		<?php 
			$thongbao = $this->session->flashdata('thongbao');
			if(isset($thongbao) && $thongbao) 
				echo $this->session->flashdata('thongbao');
		?>
		</p>
		<h3><a href="<?php echo base_url(); ?>">Trở lại trang chủ</a></h3>
	</div>
</div>