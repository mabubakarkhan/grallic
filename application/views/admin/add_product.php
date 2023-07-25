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
	          	<form id="exampleFullForm" class="make-admission-form" autocomplete="off" enctype="multipart/form-data" method="post" action="
	          	<?php
		  		if($mode != edit)echo BASEURL."admin/post-product/";
			  	else echo BASEURL."admin/update-product/";
		  		?>">
			  		<?php
					$required_string = "required";
					if(isset($mode) && $mode=="edit") {?>
						<input type="hidden" name="mode" value="edit" />
						<input type="hidden" name="aid" value="<?=$_GET['id']?>" />
						<input type="hidden" name="security" value="1ee344ecee344e778694777eb3323a" />
					<?php $required_string = '';
					}?>

					<div class="row row-lg">

						<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Category <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<select name="category_id" class="form-control" required="required">
											<option value="">Select Category</option>
											<?php foreach ($cats as $key => $cat): ?>
												<?php if ($q['category_id'] == $cat['category_id']): ?>
													<option value="<?=$cat['category_id']?>" selected="selected"><?=$cat['title']?></option>
												<?php else: ?>
													<option value="<?=$cat['category_id']?>"><?=$cat['title']?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
			            </div><!-- /12/form-horizontal -->

						<div class="col-lg-6 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Title <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="title" placeholder="Title" class="form-control" value="<?=$q['title']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /6/form-horizontal -->

	              		<div class="col-lg-6 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Title french</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="title_fr" placeholder="Title French" class="form-control" value="<?=$q['title_fr']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /6/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">URL Slug <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="slug" placeholder="URL Slug" class="form-control" value="<?=$q['slug']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-6 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Recipe</label>
									<div class=" col-lg-12 col-sm-9">
										<textarea class="form-control" class="form-control" placeholder="Recipe" name="recipe" row="10"><?=$q['recipe']?></textarea>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /6/form-horizontal -->

	              		<div class="col-lg-6 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Recipe French</label>
									<div class=" col-lg-12 col-sm-9">
										<textarea class="form-control" class="form-control" placeholder="Recipe French" name="recipe_fr" row="10"><?=$q['recipe_fr']?></textarea>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /6/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Detail <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<textarea class="form-control summernote" data-plugin="summernote" placeholder="Detail" name="detail" required><?=$q['detail']?></textarea>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Detail Mobile App<span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<textarea class="form-control" placeholder="Detail" name="detail_m" rows="10" required><?=$q['detail_m']?></textarea>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->


	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Price <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="price" placeholder="Price" class="form-control" value="<?=$q['price']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Small (Price)</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="small" placeholder="Small Price" class="form-control" value="<?=$q['small']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Medium (Price)</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="medium" placeholder="Medium Price" class="form-control" value="<?=$q['medium']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Large (Price)</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="large" placeholder="Large Price" class="form-control" value="<?=$q['large']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Family (Price)</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="family" placeholder="Family Price" class="form-control" value="<?=$q['family']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Meta Title <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="meta_title" placeholder="Meta Title" class="form-control" value="<?=$q['meta_title']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Meta Keywords <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="meta_key" placeholder="Meta Keywords" class="form-control" value="<?=$q['meta_key']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Meta Description <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="meta_desc" placeholder="Meta Description" class="form-control" value="<?=$q['meta_desc']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

		           	</div><!-- /row -->


		           	<div class="row row-lg">	
		              	<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<h4 class="example-title">Image</h4>
								<div class="example">
									<input type="file" id="input-file-now" data-plugin="dropify" data-default-file="<?=UPLOADS.$q['image']?>"/>
									<input type="text" name="image" value="<?=$q['image']?>" hidden>
								</div><!-- /example -->
							</div><!-- /example-wrap -->
		              	</div><!-- /12/form-horizontal -->
		           	</div><!-- /row -->

		           	<div class="row row-lg">	
		              	<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<h4 class="example-title">Image Mobile App</h4>
								<div class="example">
									<input type="file" id="input-file-now-2" data-plugin="dropify" data-default-file="<?=UPLOADS.$q['image_m']?>"/>
									<input type="text" name="image_m" value="<?=$q['image_m']?>" hidden>
								</div><!-- /example -->
							</div><!-- /example-wrap -->
		              	</div><!-- /12/form-horizontal -->
		           	</div><!-- /row -->

		           	<div class="row row-lg">

						<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Status <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<?php if ($q['status'] == 'inactive'): ?>
											<div class="radio-custom radio-primary">
												<input type="radio" value="active" name="status">
												<label>Active</label>
											</div><!-- /radio-custom -->
											<div class="radio-custom radio-primary">
												<input type="radio" value="inactive" name="status" checked="checked">
												<label>Inactive</label>
											</div><!-- /radio-custom -->
										<?php else: ?>
											<div class="radio-custom radio-primary">
												<input type="radio" value="active" name="status" checked="checked">
												<label>Active</label>
											</div><!-- /radio-custom -->
											<div class="radio-custom radio-primary">
												<input type="radio" value="inactive" name="status">
												<label>Inactive</label>
											</div><!-- /radio-custom -->
										<?php endif ?>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
			            </div><!-- /12/form-horizontal -->

			            <div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Show On Home Page Above Footer ? <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<?php if ($q['show_home'] == 'no'): ?>
											<div class="radio-custom radio-primary">
												<input type="radio" value="no" name="show_home" checked="checked">
												<label>NO</label>
											</div><!-- /radio-custom -->
											<div class="radio-custom radio-primary">
												<input type="radio" value="yes" name="show_home">
												<label>YES</label>
											</div><!-- /radio-custom -->
										<?php else: ?>
											<div class="radio-custom radio-primary">
												<input type="radio" value="no" name="show_home">
												<label>NO</label>
											</div><!-- /radio-custom -->
											<div class="radio-custom radio-primary">
												<input type="radio" value="yes" name="show_home" checked="checked">
												<label>YES</label>
											</div><!-- /radio-custom -->
										<?php endif ?>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
			            </div><!-- /12/form-horizontal -->

		           	</div><!-- /row -->

		           	<div class="row row-lg">	
						<div class="col-lg-12 form-horizontal">
		              		<h3>Fill incase its a deal</h3>
		              		<button class="btn btn-primary add-deal-product-btn">Add Deal Product</button>
		              		<br><br>
			            </div><!-- /12/form-horizontal -->

			            <?php if (1==2): ?>
				            <div class="col-lg-12 form-horizontal">
								<label class="col-lg-12 col-sm-3 control-label">Select Product</label>
								<div class=" col-lg-12 col-sm-9">
									<select name="deal_cat" class="form-control">
										<option value="">Select Product</option>
										<?php foreach ($cats as $key => $Cat): ?>
											<?php if ($Cat['deal'] == 'no'): ?>
												<?php if ($q['deal_cat'] == $Cat['category_id']): ?>
													<option value="<?=$Cat['category_id']?>" selected="selected"><?=$Cat['title']?></option>
												<?php else: ?>
													<option value="<?=$Cat['category_id']?>"><?=$Cat['title']?></option>
												<?php endif ?>
											<?php endif ?>
										<?php endforeach ?>
									</select>
								</div><!-- /12 -->
		              		</div><!-- /12/form-horizontal -->

							<div class="col-lg-12 form-horizontal">
								<label class="col-lg-12 col-sm-3 control-label">Product Size</label>
								<div class=" col-lg-12 col-sm-9">
									<select name="deal_piza_size" class="form-control">
										<option value="">Select Size</option>
										<?php if ($q['deal_piza_size'] == 'medium'): ?>
											<option value="small">Small</option>
											<option value="medium" selected="selected">Medium</option>
											<option value="large">Large</option>
											<option value="family">Family</option>
										<?php elseif ($q['deal_piza_size'] == 'large'): ?>
											<option value="small">Small</option>
											<option value="medium">Medium</option>
											<option value="large" selected="selected">Large</option>
											<option value="family">Family</option>
										<?php elseif ($q['deal_piza_size'] == 'family'): ?>
											<option value="small">Small</option>
											<option value="medium">Medium</option>
											<option value="large">Large</option>
											<option value="family" selected="selected">Family</option>
										<?php else: ?>
											<option value="small" selected="selected">Small</option>
											<option value="medium">Medium</option>
											<option value="large">Large</option>
											<option value="family">Family</option>
										<?php endif ?>
									</select>
								</div><!-- /12 -->
		              		</div><!-- /12/form-horizontal -->

							<div class="col-lg-12 form-horizontal">
			                	<div class="example-wrap">
									<div class="form-group form-material">
										<label class="col-lg-12 col-sm-3 control-label">Number Of product(s)</label>
										<div class=" col-lg-12 col-sm-9">
											<input type="number" name="deal_piza_count" placeholder="Number of Piza(s)" class="form-control" value="<?=$q['deal_piza_count']?>">
										</div><!-- /12 -->
									</div><!-- /form-group -->
								</div><!-- /example-wrap -->
		              		</div><!-- /12/form-horizontal -->
			            <?php endif ?>

			            <?php if (!(isset($mode) && $mode == 'edit')): ?>

			            	<div class="col-lg-12 form-horizontal deal-detail-block">
				            	<div class="deal-block" style="margin-bottom: 10px;border: 1px solid #eee;padding: 35px;background: #f5f5f5;">
				            		<div class="form-group">
				            			<label>Select Product</label>
				            			<select name="deal_cat_id[]" class="form-control first-category-id">
											<option value="">Select Product</option>
											<?php foreach ($cats as $key => $Cat): ?>
												<?php if ($Cat['deal'] == 'no'): ?>
													<option value="<?=$Cat['category_id']?>"><?=$Cat['title']?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
				            		</div><!-- /form-group -->
				            		<div class="form-group">
				            			<label>Product Size</label>
				            			<select name="size[]" class="form-control">
											<option value="false" selected="selected">No Size</option>
											<option value="small">Small</option>
											<option value="medium">Medium</option>
											<option value="large">Large</option>
											<option value="family">Family</option>
										</select>
				            		</div><!-- /form-group -->
				            		<div class="form-group">
				            			<label>Number Of Products</label>
				            			<input type="number" name="count[]" class="form-control" value="1">
				            		</div><!-- /form-group -->
				            	</div><!-- /deal-block -->
				            	<div class="befor-deal-detail"></div>
			            	</div><!-- /12/form-horizontal -->

			            <?php else: ?>

			            	<?php if ($deals): ?>
			            		<div class="col-lg-12 form-horizontal deal-detail-block">
				            		<?php foreach ($deals as $key => $deal): ?>
				            			<div class="deal-block" style="margin-bottom: 10px;border: 1px solid #eee;padding: 35px;background: #f5f5f5;">
						            		<div class="form-group">
						            			<label>Select Product</label>
						            			<select class="form-control">
													<option value="">Select Product</option>
													<?php foreach ($cats as $key => $Cat): ?>
														<?php if ($Cat['deal'] == 'no'): ?>
															<?php if ($Cat['category_id'] == $deal['category_id']): ?>
																<option value="<?=$Cat['category_id']?>" selected="selected"><?=$Cat['title']?></option>
															<?php else: ?>
																<option value="<?=$Cat['category_id']?>"><?=$Cat['title']?></option>
															<?php endif ?>
														<?php endif ?>
													<?php endforeach ?>
												</select>
						            		</div><!-- /form-group -->
						            		<div class="form-group">
						            			<label>Product Size</label>
						            			<select class="form-control">
													<option value="false" <?=($deal['size'] == 'false') ? 'selected="selected"' : ''?>>No Size</option>
													<option value="small" <?=($deal['size'] == 'small') ? 'selected="selected"' : ''?>>Small</option>
													<option value="medium" <?=($deal['size'] == 'medium') ? 'selected="selected"' : ''?>>Medium</option>
													<option value="large" <?=($deal['size'] == 'large') ? 'selected="selected"' : ''?>>Large</option>
													<option value="family" <?=($deal['size'] == 'family') ? 'selected="selected"' : ''?>>Family</option>
												</select>
						            		</div><!-- /form-group -->
						            		<div class="form-group">
						            			<label>Number Of Products</label>
						            			<input type="number" class="form-control" value="<?=$deal['count']?>">
						            		</div><!-- /form-group -->
						            	</div><!-- /deal-block -->
				            		<?php endforeach ?>
			            		</div><!-- /12/form-horizontal -->
			            	<?php endif ?>

			            <?php endif ?>

						<div class="col-lg-12 form-horizontal">
							<label class="col-lg-12 col-sm-3 control-label">Drink Size</label>
							<div class=" col-lg-12 col-sm-9">
								<select name="deal_drink_size" class="form-control">
									<option value="">Select Piza Size</option>
									<?php if ($q['deal_drink_size'] == 'half litter'): ?>
										<option value="regular">Regular</option>
										<option value="half litter" selected="selected">Half Litter</option>
										<option value="1 litter">1 Litter</option>
										<option value="1.5 litter">1.5 Litter</option>
										<option value="2.25 litter">2.25 Litter</option>
									<?php elseif ($q['deal_drink_size'] == '1 litter'): ?>
										<option value="regular">Regular</option>
										<option value="half litter">Half Litter</option>
										<option value="1 litter" selected="selected">1 Litter</option>
										<option value="1.5 litter">1.5 Litter</option>
										<option value="2.25 litter">2.25 Litter</option>
									<?php elseif ($q['deal_drink_size'] == '1.5 litter'): ?>
										<option value="regular">Regular</option>
										<option value="half litter">Half Litter</option>
										<option value="1 litter">1 Litter</option>
										<option value="1.5 litter" selected="selected">1.5 Litter</option>
										<option value="2.25 litter">2.25 Litter</option>
									<?php elseif ($q['deal_drink_size'] == '2.25 litter'): ?>
										<option value="regular">Regular</option>
										<option value="half litter">Half Litter</option>
										<option value="1 litter">1 Litter</option>
										<option value="1.5 litter">1.5 Litter</option>
										<option value="2.25 litter" selected="selected">2.25 Litter</option>
									<?php else: ?>
										<option value="regular" selected="selected">Regular</option>
										<option value="half litter">Half Litter</option>
										<option value="1 litter">1 Litter</option>
										<option value="1.5 litter">1.5 Litter</option>
										<option value="2.25 litter">2.25 Litter</option>
									<?php endif ?>
								</select>
							</div><!-- /12 -->
	              		</div><!-- /12/form-horizontal -->

						<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Number Of drink(s)</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="number" name="deal_drink_count" placeholder="Number of Drink(s)" class="form-control" value="<?=$q['deal_drink_count']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

		           	</div><!-- /row -->

					<div class="row row-lg">

		              	<div class="form-group form-material col-lg-12 text-right padding-top-m">
	                		<button type="submit" class="btn btn-primary" id="validateButton1">Submit</button> <a class="btn btn-danger waves-effect waves-light" href="<?=BASEURL?>admin/products" class="cancel">Cancel</a>
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
	$("#input-file-now").on('change',function(){
		$("#validateButton1").text('Wait File Is Uploading');
		var data = new FormData();
		data.append('img', $(this).prop('files')[0]);
		$.ajax({
			type: 'POST',
			processData: false,
			contentType: false,
			data: data,
			url: '<?=BASEURL?>admin/post-photo-ajax/',
			dataType : 'json',
			success: function(resp){
				// resp = $.parseJSON(resp);
				// console.log(resp);
				if (resp.status == true)
				{
					$("#validateButton1").removeAttr('disabled');
					$("#validateButton1").text('Submit');
					$("input[name='image']").val(resp.data);
				}
				else
				{
					alert(resp.msg)
					$("#validateButton1").text('Upload An Image First');
				}
			}
		});
	})//input-file-now

	$("#input-file-now-2").on('change',function(){
		$("#validateButton1").text('Wait File Is Uploading');
		var data = new FormData();
		data.append('img', $(this).prop('files')[0]);
		$.ajax({
			type: 'POST',
			processData: false,
			contentType: false,
			data: data,
			url: '<?=BASEURL?>admin/post-photo-ajax/',
			dataType : 'json',
			success: function(resp){
				if (resp.status == true)
				{
					$("#validateButton1").removeAttr('disabled');
					$("#validateButton1").text('Submit');
					$("input[name='image_m']").val(resp.data);
				}
				else
				{
					alert(resp.msg)
					$("#validateButton1").text('Upload An Image First');
				}
			}
		});
	})//input-file-now


	$(document).on('click', '.add-deal-product-btn', function(event) {
		event.preventDefault();
		$html = $(".copy-deal-html").html();
		//$block = $(".deal-detail-block").html();
		$(".befor-deal-detail").before($html);
	});
	$(document).on('click', '.remove-deal-detail-box', function(event) {
		event.preventDefault();
		$(this).parent('div').remove();
	});


});//onload
</script>




<div class="copy-deal-html" style="display: none;">
	<div class="deal-block" style="margin-bottom: 10px;border: 1px solid #eee;padding: 35px;background: #f5f5f5;">
		<div class="form-group">
			<label>Select Product</label>
			<select name="deal_cat_id[]" class="form-control first-category-id">
				<option value="">Select Product</option>
				<?php foreach ($cats as $key => $Cat): ?>
					<?php if ($Cat['deal'] == 'no'): ?>
						<option value="<?=$Cat['category_id']?>"><?=$Cat['title']?></option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
		</div><!-- /form-group -->
		<div class="form-group">
			<label>Product Size</label>
			<select name="size[]" class="form-control">
				<option value="false" selected="selected">No Size</option>
				<option value="small">Small</option>
				<option value="medium">Medium</option>
				<option value="large">Large</option>
				<option value="family">Family</option>
			</select>
		</div><!-- /form-group -->
		<div class="form-group">
			<label>Number Of Products</label>
			<input type="number" name="count[]" class="form-control" value="1">
		</div><!-- /form-group -->
		<button class="btn btn-danger remove-deal-detail-box">Remove</button>
	</div><!-- /deal-block -->
</div><!-- /copy-deal-html -->