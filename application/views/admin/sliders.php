<script type="text/javascript">
function del_q(id) {
    cnfr = confirm("Wait a min. Are you really going to delete the Slide ?");
    if (cnfr) {
        document.location = "<?=BASEURL?>admin/delete-slider/"+id;
    }
}
</script>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title" style="text-transform: uppercase;"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>admin/dashboard">Dashboard</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-success btn-round" href="<?=BASEURL.'admin/add-slider'?>">
                <i class="icon md-plus" aria-hidden="true"></i>
                <span class="hidden-xs">Add Slide</span>
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
                <h3 class="panel-title">Slides</h3>
            </header>
            <div class="panel-body">
                
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Slide</th>
                            <th>Product</th>
                            <th>Link</th>
                            <th>Platform</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Slide</th>
                            <th>Product</th>
                            <th>Link</th>
                            <th>Platform</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($data) > 0) {
                            foreach ($data as $q): ?>
                                <tr>
                                    <td><?=$q['slider_id']?></td>
                                    <td>
                                        <img src="<?=UPLOADS.$q['img']?>" width="200">
                                    </td>
                                    <td><?=$q['product']?></td>
                                    <td>
                                        <?php if ($q['product_id'] > 0): ?>
                                            <a href="<?=BASEURL.'product/'.str_replace(' ', '-', $q['product']).'-'.$q['product_id'].'/'?>" target="_blank">LINK</a>
                                        <?php else: ?>
                                            <a href="<?=$q['link']?>" target="_blank">LINK</a>
                                        <?php endif ?>
                                    </td>
                                    <td><?=$q['platform']?></td>
                                    <td>
                                         <a href="<?=BASEURL?>admin/edit-slider/?id=<?=$q['slider_id']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:del_q('<?=$q['slider_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><i class="icon md-delete" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Slide found in the database
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
            $.post('<?=BASEURL."admin/change-cat-status"?>', {status: $status, id: $id}, function(resp) {
                resp = JSON.parse(resp);
                alert(resp.msg);
            });
        }
    });


});//onload
</script>