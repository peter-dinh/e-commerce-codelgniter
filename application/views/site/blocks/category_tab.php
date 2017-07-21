<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#new" data-toggle="tab">Mới nhất</a></li>
			<li><a href="#popular" data-toggle="tab">Bán chạy</a></li>
			<li><a href="#rating" data-toggle="tab">Đáng giá</a></li>
			<li><a href="#gifts" data-toggle="tab">Quà tặng</a></li>
			<li><a href="#sale" data-toggle="tab">Giảm giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="new" >
			<?php foreach ($new_product as $item) { ?>
			
			<div class="col-sm-3">
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
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
						</div>
						
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		
		<div class="tab-pane fade" id="popular" >
			<?php foreach ($popular_product as $item) { ?>
			<div class="col-sm-3">
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
		
		<div class="tab-pane fade" id="rating" >
			<?php foreach ($rating_product as $item) { ?>
			<div class="col-sm-3">
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
		
		<div class="tab-pane fade" id="gifts" >
			<?php foreach ($gifts_product as $item) { ?>
			<div class="col-sm-3">
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
		
		<div class="tab-pane fade" id="sale" >
			<?php foreach ($sale_product as $item) { ?>
			<div class="col-sm-3">
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
</div><!--/category-tab-->