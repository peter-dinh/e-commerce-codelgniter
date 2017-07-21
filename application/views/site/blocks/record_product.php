<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<?php foreach ($record_product1 as $item) { ?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="/upload/product/<?php echo $item->image_link; ?>" alt="<?php echo $item->name; ?>" />
							<h4>
								<?php if($item->discount > 0) 
										echo number_format($item->price - $item->discount)." VNĐ"; 
									else
										echo number_format($item->price). " VNĐ";
								?>
							</h4>
							<h5 class="<?php if($item->discount == 0) echo "price_hidden"; else echo "price_item"; ?>">
								<?php if($item->discount > 0) 
										echo number_format($item->price)." VNĐ";
										else echo "giacu";
								?>
							</h5>
							<p><?php echo $item->name; ?></p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="item">	
				<?php foreach ($record_product2 as $item) { ?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="/upload/product/<?php echo $item->image_link; ?>" alt="<?php echo $item->name; ?>" />
							<h4>
								<?php if($item->discount > 0) 
										echo number_format($item->price - $item->discount)." VNĐ"; 
									else
										echo number_format($item->price). " VNĐ";
								?>
							</h4>
							<h5 class="<?php if($item->discount == 0) echo "price_hidden"; else echo "price_item"; ?>">
								<?php if($item->discount > 0) 
										echo number_format($item->price)." VNĐ";
										else echo "giacu";
								?>
							</h5>
							<p><?php echo $item->name; ?></p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->