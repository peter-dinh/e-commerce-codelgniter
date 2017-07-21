<h2>Danh mục sản phẩm</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	<?php 
	foreach ($catalog_list as $key => $row) { ?>
	<div class="panel panel-default">
    	<div class="panel-heading">
    		<h4 class="panel-title">
    			<a href="#<?php if(count($row->sub) > 0) echo $key; ?>" <?php if(count($row->sub) > 0) echo "data-toggle=\"collapse\" data-parent=\"#accordian\"" ?>>
    			<?php if(count($row->sub) > 0) echo "<span class=\"badge pull-right\"><i class=\"fa fa-plus\"></i></span>" ?>
    				<?php echo $row->name; ?>
    			</a>
    		</h4>
    	</div>
    	<?php if(count($row->sub) > 0) { ?>
    	<div id="<?php echo $key; ?>" class="panel-collapse collapse">
			<div class="panel-body">
				<ul>
					<?php foreach ($row->sub as $value) { ?>
					<li><a href="<?php echo base_url().'catalog/index/'.$value->id; ?>"><?php echo $value->name; ?></a></li>	
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
    </div>
	<?php } ?>
</div><!--/category-products-->