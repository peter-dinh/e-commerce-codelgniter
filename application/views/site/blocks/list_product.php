<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Features Items</h2>
	<div class="row">
	<?php foreach($list_product as $item){ ?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<a href="<?php echo base_url().'product/view/'.$item->id; ?>"><img src="/upload/product/<?php echo $item->image_link; ?>" alt="<?php echo $item->name; ?>" /></a>
					<h3>
						<?php if($item->discount > 0) 
								echo number_format($item->price - $item->discount)." VNĐ"; 
							else
								echo number_format($item->price). " VNĐ";
						?>
					</h3>
					<h5 class="<?php if($item->discount > 0) echo "price_item"; else echo "price_hidden"; ?>">
						<?php if($item->discount > 0) 
								echo number_format($item->price)." VNĐ";
								else echo "giacu";
						?>
					</h5>
					<a href="<?php echo base_url().'product/view/'.$item->id; ?>"><p><?php echo $item->name; ?></p></a>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
					<li><a href="<?php echo base_url().'product/view/'.$item->id; ?>"><i class="fa fa-eye"></i>Xem ngay</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
	</div>
	<div class="row">
		<ul class="pagination">
			<?php echo $this->pagination->create_links()?>
		</ul>
	</div>
</div><!--features_items-->