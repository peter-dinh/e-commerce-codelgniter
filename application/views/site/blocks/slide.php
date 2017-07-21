<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php foreach ($slide as $key => $row) { ?>
						<li data-target="#slider-carousel" data-slide-to="<?php echo $key; ?>" <?php if($key == 0) echo "class=\"active\""; ?> ></li>
						<?php } ?>
					</ol>
					
					<div class="carousel-inner">
						<?php foreach ($slide as $key => $value) { ?>
						<div class="item <?php if($key == 0) echo "active"; ?>">
							<div class="col-sm-6">
								<h1><span>NORA</span>-SHOP</h1>
								<h2><?php echo $value->name; ?></h2>
								<p> <?php echo $value->info; ?> </p>
								<button type="button" class="btn btn-default get">Xem ngay</button>
							</div>
							<div class="col-sm-6">
								<img src="/upload/slide/<?php echo $value->image_link; ?>" class="girl img-responsive" alt="<?php echo $value->name; ?>" />
							</div>
						</div>
						<?php } ?>
						
						
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->