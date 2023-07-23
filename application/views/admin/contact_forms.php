<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title" style="text-transform: uppercase;"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>admin/dashboard">Dashboard</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
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
                <h3 class="panel-title">Orders</h3>
            </header>
            <div class="panel-body">
                
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($forms) > 0) {
                            foreach ($forms as $q): ?>
                                <tr>
                                    <td><?=$q['contact_form_id']?></td>
                                    <td><?=$q['name']?></td>
                                    <td><?=$q['phone']?></td>
                                    <td><?=$q['msg']?></td>
                                    <td>
                                        <?=$q['status']?><br>
                                        <select name="status" class="form-control" data-id="<?=$q['contact_form_id']?>">
                                            <option value="">Change Status</option>
                                            <option value="new">New</option>
                                            <option value="seen">Seen</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Contact Form found in the database
                                </td>
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
            $.post('<?=BASEURL."admin/change-contact-form-status"?>', {status: $status, id: $id}, function(resp) {
                resp = JSON.parse(resp);
                alert(resp.msg);
            });
        }
    });


});//onload
</script>

