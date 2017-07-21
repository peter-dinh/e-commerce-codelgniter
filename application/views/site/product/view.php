<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="/upload/product/<?php echo $product->image_link; ?>" alt="<?php echo $product->name; ?>" />
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
			  <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			        <?php 
			            $x = 0;
			            $y = 0;
			            $count = count($image_list);
			            while($x < $count)
			            {
			        ?>
			        <div class="item <?php if($y == 0) echo "active"; ?>">
			        <?php 
			            $dem = 0;
			            while($dem < 3 && $y < $count){
			         ?>
					  <a href=""><img class="image_detail_product " src="<?php echo base_url() ?>/upload/product/<?php echo $image_list[$y]; ?>" alt="<?php echo $product->name."(".($y+1).")"; ?>"></a>
                    <?php 
                        $dem = $dem + 1;
                        $y = $y + 1;
                    } 
                    ?>
					</div>
			        
			        <?php 
			            $x = $x + 3;
			        } 
			        ?>
					
					
				</div>
                <?php if($count > 3) { ?>
			  <!-- Controls -->
			  <a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>
			  <?php } ?>
		</div>

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2><?php echo $product->name; ?></h2>
			<p>Web ID: <?php echo $product->id; ?></p>
			<img src="<?php echo base_url() ?>/public/images/product-details/rating.png" alt="" />
			<span>
				<span>US $59</span>
				<button type="button" class="btn btn-fefault cart">
					<i class="fa fa-shopping-cart"></i>
					Thêm vào giỏ hàng
				</button>
			</span>
			<p><b>Availability:</b> In Stock</p>
			<p><b>Condition:</b> New</p>
			<p><b>Thương hiệu:</b> E-SHOPPER</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li><a href="#details" data-toggle="tab">Thông tin chi tiết</a></li>
			<li><a href="#tag" data-toggle="tab">Từ khóa</a></li>
			<li class="active"><a href="#reviews" data-toggle="tab">Phản hồi (<?php echo $total_comment; ?>)</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade" id="details" >
			
		</div>
		
		<div class="tab-pane fade" id="tag" >
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="images/home/gallery1.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="images/home/gallery2.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="images/home/gallery3.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="images/home/gallery4.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tab-pane fade active in" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
					<?php if($login_user == 1){ ?>
					<button type="submit" name="submit" class="btn btn-default pull-right">
						Gửi
					</button>
					<?php } else { ?>
					<a href="#" class="btn btn-default pull-right">
						Đăng nhập
					</a>
					<?php } ?>
				</form>
			</div>
		</div>
		
	</div>
</div><!--/category-tab-->

<style type="text/css">
    .image_detail_product
    {
        height: 84px;
        width: 84px;
    }
</style>