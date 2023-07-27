<div class="page animsition">
	<div class="page-header">
      	<h1 class="page-title">
  			<?=$page_title?>
	</h1>
  	<ol class="breadcrumb">
		<li><a href="<?=BASEURL?>admin/index">Dashboard</a></li>
		<li><?=$page_title?></li>
  	</ol>
  	<div class="page-header-actions">
		<a class="btn btn-sm btn-primary btn-round" href="<?=BASEURL?>" target="_blank">
			<i class="icon md-link" aria-hidden="true"></i>
			<span class="hidden-xs">Website</span>
		</a>
  	</div><!-- /page-header-actions -->
	</div><!-- /page-header -->
	<?php if (isset($_GET['msg'])):?>
	<div class="bg-success well">
		<p><?=$_GET['msg']?></p>
	</div>
	<?php endif;?>
	<?php if (isset($_GET['error'])):?>
		<div class="bg-danger well">
			<p><?=$_GET['message']?></p>
		</div>
	<?php endif;?>
	<div class="bg-danger well ajax-error" style="display: none;"></div>
	<div class="page-content container-fluid">
      	<div class="panel">
        	<div class="panel-body">
        		<a href="javascript://" class="btn btn-primary add-item">Add Item</a>
	          	<form id="exampleFullForm" class="make-admission-form" autocomplete="off" enctype="multipart/form-data" method="post" action="<?=BASEURL.'admin/post-deal-item/'.$deal['deal_id']?>">
		  			<div class="form-inner">
			  			<?php if ($items): ?>
			  				<?php foreach ($items as $key => $q): ?>
			  					<div class="row row-lg" style="background: #eee;margin: 20px;padding: 20px;position: relative;">
				  					<input type="hidden" name="deal_id[]" value="<?=$deal['deal_id']?>">
									<div class="col-lg-12 form-horizontal">
					                	<div class="example-wrap">
											<div class="form-group form-material">
												<label class="col-lg-12 col-sm-3 control-label">Quantity <span class="required">*</span></label>
												<div class=" col-lg-12 col-sm-9">
													<input type="text" name="qty[]" placeholder="Quantity" class="form-control" value="<?=$q['qty']?>" required>
												</div><!-- /12 -->
											</div><!-- /form-group -->
										</div><!-- /example-wrap -->
				              		</div><!-- /6/form-horizontal -->

				              		<div class="col-lg-12 form-horizontal">
					                	<div class="example-wrap">
											<div class="form-group form-material">
												<label class="col-lg-12 col-sm-3 control-label">Title</label>
												<div class=" col-lg-12 col-sm-9">
													<textarea class="form-control" placeholder="Title" name="title[]" rows="5" required><?=$q['title']?></textarea>
												</div><!-- /12 -->
											</div><!-- /form-group -->
										</div><!-- /example-wrap -->
				              		</div><!-- /12/form-horizontal -->

				              		<div class="col-lg-12 form-horizontal">
					                	<div class="example-wrap">
											<div class="form-group form-material">
												<label class="col-lg-12 col-sm-3 control-label">Title French</label>
												<div class=" col-lg-12 col-sm-9">
													<textarea class="form-control" placeholder="Title" name="title_fr[]" rows="5" required><?=$q['title_fr']?></textarea>
												</div><!-- /12 -->
											</div><!-- /form-group -->
										</div><!-- /example-wrap -->
				              		</div><!-- /12/form-horizontal -->
				              		<button type="button" class="btn btn-danger delete-item">Delete</button>
					           	</div><!-- /row -->	
			  				<?php endforeach ?>
			  			<?php else: ?>
			  				<div class="row row-lg" style="background: #eee;margin: 20px;padding: 20px;position: relative;">
			  					<input type="hidden" name="deal_id[]" value="<?=$deal['deal_id']?>">
								<div class="col-lg-12 form-horizontal">
				                	<div class="example-wrap">
										<div class="form-group form-material">
											<label class="col-lg-12 col-sm-3 control-label">Quantity <span class="required">*</span></label>
											<div class=" col-lg-12 col-sm-9">
												<input type="text" name="qty[]" placeholder="Quantity" class="form-control" value="<?=$q['qty']?>" required>
											</div><!-- /12 -->
										</div><!-- /form-group -->
									</div><!-- /example-wrap -->
			              		</div><!-- /6/form-horizontal -->

			              		<div class="col-lg-12 form-horizontal">
				                	<div class="example-wrap">
										<div class="form-group form-material">
											<label class="col-lg-12 col-sm-3 control-label">Title</label>
											<div class=" col-lg-12 col-sm-9">
												<textarea class="form-control" placeholder="Title" name="title[]" rows="5" required><?=$q['title']?></textarea>
											</div><!-- /12 -->
										</div><!-- /form-group -->
									</div><!-- /example-wrap -->
			              		</div><!-- /12/form-horizontal -->

			              		<div class="col-lg-12 form-horizontal">
				                	<div class="example-wrap">
										<div class="form-group form-material">
											<label class="col-lg-12 col-sm-3 control-label">Title French</label>
											<div class=" col-lg-12 col-sm-9">
												<textarea class="form-control" placeholder="Title" name="title_fr[]" rows="5" required><?=$q['title_fr']?></textarea>
											</div><!-- /12 -->
										</div><!-- /form-group -->
									</div><!-- /example-wrap -->
			              		</div><!-- /12/form-horizontal -->
			              		<button type="button" class="btn btn-danger delete-item">Delete</button>
				           	</div><!-- /row -->
			  			<?php endif ?>
		  			</div><!-- /form-inner -->
    	
					<div class="row row-lg">

		              	<div class="form-group form-material col-lg-12 text-right padding-top-m">
        					<a href="javascript://" class="btn btn-primary add-item">Add Item</a> <button type="submit" class="btn btn-success" id="validateButton1">Submit</button> <a class="btn btn-danger waves-effect waves-light" href="<?=BASEURL.'admin/deals/'.$deal['status']?>" class="cancel">Cancel</a>
		              	</div><!-- /form-group -->

            		</div><!-- /row/row-lg -->
	          	</form>
        	</div><!-- /panel-body -->
      	</div><!-- /panel -->
   	</div><!-- /page-content -->
</div><!-- /page/animsition -->
<?php $menu = $page_active; ?>


<script>
$(function(){
	$(document).on('click', '.add-item', function(event) {
		event.preventDefault();
		$('.form-inner').append($(".sample-hide").html());
	});
	$(document).on('click', '.delete-item', function(event) {
		event.preventDefault();
		$(this).parent('div').remove();
	});
})
</script>

<style>
.delete-item{
	position: absolute;
	top: 5px;
	right: 10px;
}
</style>


<div class="sample-hide" style="display: none;">
	<div class="row row-lg" style="background: #eee;margin: 20px;padding: 20px;position: relative;">
		<input type="hidden" name="deal_id[]" value="<?=$deal['deal_id']?>">
		<div class="col-lg-12 form-horizontal">
			<div class="example-wrap">
				<div class="form-group form-material">
					<label class="col-lg-12 col-sm-3 control-label">Quantity <span class="required">*</span></label>
					<div class=" col-lg-12 col-sm-9">
						<input type="text" name="qty[]" placeholder="Quantity" class="form-control" value="<?=$q['qty']?>" required>
					</div><!-- /12 -->
				</div><!-- /form-group -->
			</div><!-- /example-wrap -->
		</div><!-- /6/form-horizontal -->

		<div class="col-lg-12 form-horizontal">
			<div class="example-wrap">
				<div class="form-group form-material">
					<label class="col-lg-12 col-sm-3 control-label">Title</label>
					<div class=" col-lg-12 col-sm-9">
						<textarea class="form-control" placeholder="Title" name="title[]" rows="5" required><?=$q['title']?></textarea>
					</div><!-- /12 -->
				</div><!-- /form-group -->
			</div><!-- /example-wrap -->
		</div><!-- /12/form-horizontal -->

		<div class="col-lg-12 form-horizontal">
			<div class="example-wrap">
				<div class="form-group form-material">
					<label class="col-lg-12 col-sm-3 control-label">Title French</label>
					<div class=" col-lg-12 col-sm-9">
						<textarea class="form-control" placeholder="Title" name="title_fr[]" rows="5" required><?=$q['title_fr']?></textarea>
					</div><!-- /12 -->
				</div><!-- /form-group -->
			</div><!-- /example-wrap -->
		</div><!-- /12/form-horizontal -->
		<button type="button" class="btn btn-danger delete-item">Delete</button>
	</div><!-- /row -->
</div>