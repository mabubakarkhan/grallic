




<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="content">
				
				<?php if ((isset($_GET['error'])) && ($_GET['error'] == 'false')): ?>
					<p class="alert alert-success"><?=$_GET['msg']?></p>
				<?php endif ?>
				<?php if ((isset($_GET['error'])) && ($_GET['error'] == 'true')): ?>
					<p class="alert alert-danger"><?=$_GET['msg']?></p>
				<?php endif ?>

				<a class="btn btn-primary" data-toggle="modal" href='#modal-add-blog' style="margin-bottom: 10px;">+ Add New</a>

				<table id="table-data" class="celled table">
			        <thead>
			            <tr>
			                <th>Title</th>
			                <th>Meta Title</th>
			                <th>Meta Keywords</th>
			                <th>Meta Description</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tfoot>
			            <tr>
			                <th>Title</th>
			                <th>Meta Title</th>
			                <th>Meta Keywords</th>
			                <th>Meta Description</th>
			                <th>Action</th>
			            </tr>
			        </tfoot>
			        <tbody>
			        	<?php foreach ($blog as $key => $q): ?>
			        		<tr>
			        			<td><?=$q['title']?></td>
			        			<td><?=$q['meta_title']?></td>
			        			<td><?=$q['meta_key']?></td>
			        			<td><?=$q['meta_desc']?></td>
			        			<td><a href="javascript://" class="edit-blog" data-id="<?=$q['blog_id']?>">Edit</a></td>
			        		</tr>
			        	<?php endforeach ?>
			        </tbody>
			    </table>



			</div><!-- /content -->
		</div><!-- /12 -->
	</div><!-- /row -->
</div><!-- /container -->