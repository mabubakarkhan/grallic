<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Are you sure you want to delete this Discount Code");
        if (cnfr) {
            document.location = "<?=BASEURL?>admin/delete-discount/"+id+"/";
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
            <a class="btn btn-sm btn-success btn-round" data-toggle="modal" href='#modal-add'>
                <i class="icon md-plus" aria-hidden="true"></i>
                <span class="hidden-xs">Add Code</span>
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
                <h3 class="panel-title">Codes</h3>
            </header>
            <div class="panel-body">
                
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($data) > 0) {
                            foreach ($data as $q): ?>
                                <tr>
                                    <td><?=$q['code']?></td>
                                    <td><?=$q['discount']?></td>
                                    <td class="actions">
                                        <a href="javascript:del_q('<?=$q['discount_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon md-delete" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Code found in the database
                                </td>
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


<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Discount Code</h4>
            </div>
            <div class="modal-body">
                
                <form action="<?=BASEURL.'admin/post-discount'?>" method="post">
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" name="code" class="form-control" required="required">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="text" name="discount" class="form-control" required="required">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div><!-- /form-group -->
                </form>


            </div><!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>