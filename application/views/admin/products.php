<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title" style="text-transform: uppercase;"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>admin/dashboard">Dashboard</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-success btn-round" href="<?=BASEURL.'admin/add-product'?>">
                <i class="icon md-plus" aria-hidden="true"></i>
                <span class="hidden-xs">Add Product</span>
            </a>
            <a class="btn btn-sm btn-primary btn-round" href="<?=BASEURL?>" target="_blank">
                <i class="icon md-link" aria-hidden="true"></i>
                <span class="hidden-xs">Website</span>
            </a>
        </div><!-- /page-header-actions -->
    </div><!-- /page-header -->
    <?php if ($msg_code): ?>
    <div class="bg-success well">
        <p><?=$msg_code?></p>
    </div>
    <?php endif;?>
    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions"></div>
                <h3 class="panel-title">Companies</h3>
            </header>
            <div class="panel-body">
                
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Deal</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Deal</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($data) > 0) {
                            foreach ($data as $q): ?>
                                <tr>
                                    <td><?=$q['product_id']?></td>
                                    <td><?=$q['title']?></td>
                                    <td><?=$q['Category']?></td>
                                    <td><?=$q['deal']?></td>
                                    <td><?=$q['price']?></td>
                                    <td>
                                        <?=$q['status']?><br>
                                        <select name="status" class="form-control" data-id="<?=$q['product_id']?>">
                                            <option value="">Change Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </td>
                                    <td><a href="<?=BASEURL?>admin/edit-product/?id=<?=$q['product_id']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Products found in the database
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        }?>
                    </tbody>
                </table>
            </div><!-- /panel-body -->
        </div><!-- /panel -->
      <!-- End Panel Basic -->
    </div><!-- /page-content -->
</div><!-- /page/animsition -->



<script>
$(function(){


    $(document).on('change', 'select[name="status"]', function(event) {
        event.preventDefault();
        $status = $(this).val();
        $id = $(this).attr('data-id');
        if ($status.length > 0) {
            $.post('<?=BASEURL."admin/change-product-status"?>', {status: $status, id: $id}, function(resp) {
                resp = JSON.parse(resp);
                alert(resp.msg);
            });
        }
    });


});//onload
</script>