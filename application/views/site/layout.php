<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('site/head'); ?>
    </head>
    <body>
        <header id="header">
            <?php $this->load->view('site/blocks/header_top'); ?>
            
            <?php $this->load->view('site/blocks/header_mid'); ?>
            
            <?php $this->load->view('site/blocks/header_bottom', $this->data); ?>
        </header>
        
        <?php $this->load->view('site/blocks/slide'); ?>
        <section>
            <div class="container">
			     <div class="row">
			         <div class="col-sm-3">
			             <div class="left-sidebar">
			                 <?php $this->load->view('site/blocks/category'); ?>
			                 
			                 <?php $this->load->view('site/blocks/brands'); ?>
			                 
			                 <?php $this->load->view('site/blocks/price_range'); ?>
			                 
			                 <?php $this->load->view('site/blocks/advertisement'); ?>
			                 
			             </div>
			         </div>
			         <div class="col-sm-9 padding-right">
			             
			             <?php $this->load->view($content,$this->data); ?>
			             
			         </div>
			     </div>
			</div>
        </section>
        <footer id="footer" >
            <?php $this->load->view('site/blocks/footer'); ?>
        </footer>
    </body>
</html>