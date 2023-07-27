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
		  		if($mode != edit)echo BASEURL."admin/update-page/".$q['page_id']."/";
			  	else echo BASEURL."admin/update-page/".$q['page_id']."/";
		  		?>">

					<div class="row row-lg">
						<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Title <span class="required">*</span></label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="title" placeholder="Title" class="form-control" value="<?=$q['title']?>" required>
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Tag Line</label>
									<div class=" col-lg-12 col-sm-9">
										<input type="text" name="tag_line" placeholder="Tag Line" class="form-control" value="<?=$q['tag_line']?>">
									</div><!-- /12 -->
								</div><!-- /form-group -->
							</div><!-- /example-wrap -->
	              		</div><!-- /12/form-horizontal -->

	              		<div class="col-lg-12 form-horizontal">
		                	<div class="example-wrap">
								<div class="form-group form-material">
									<label class="col-lg-12 col-sm-3 control-label">Detail</label>
									<div class=" col-lg-12 col-sm-9">
										<textarea class="form-control summernote" data-plugin="summernote" placeholder="Detail" name="detail"><?=$q['detail']?></textarea>
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

		              	<div class="form-group form-material col-lg-12 text-right padding-top-m">
	                		<button type="submit" class="btn btn-primary" id="validateButton1">Submit</button> <a class="btn btn-danger waves-effect waves-light" href="<?=BASEURL?>admin/pages" class="cancel">Cancel</a>
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


});//onload
</script>