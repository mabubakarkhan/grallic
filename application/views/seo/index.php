




<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="content">
				


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
			        	<?php foreach ($cats as $key => $q): ?>
			        		<tr>
			        			<td><?=$q['title']?></td>
			        			<td><?=$q['meta_title']?></td>
			        			<td><?=$q['meta_key']?></td>
			        			<td><?=$q['meta_desc']?></td>
			        			<td><a href="javascript://" class="edit-cat" data-id="<?=$q['category_id']?>">Edit</a></td>
			        		</tr>
			        	<?php endforeach ?>
			        </tbody>
			    </table>



			</div><!-- /content -->
		</div><!-- /12 -->
	</div><!-- /row -->
</div><!-- /container -->