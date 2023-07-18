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
                            <th>Time</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Items</th>
                            <th>Platform</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Items</th>
                            <th>Platform</th>
                            <th>Details</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($data) > 0) {
                            foreach ($data as $q): ?>
                                <tr>
                                    <td><?=$q['order_id']?></td>
                                    <td>
                                        <?=get_time_difference_php($q['at'])?><br>
                                        <?=$q['at']?>
                                    </td>
                                    <td>
                                        <?=$q['status']?><br>
                                        <select name="status" class="form-control" data-id="<?=$q['order_id']?>">
                                            <option value="">Change Status</option>
                                            <option value="new">New</option>
                                            <option value="process">Process</option>
                                            <option value="done">Done</option>
                                            <option value="cancel">Cancel</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?=$q['name']?><br>
                                        <?=$q['phone']?><br>
                                        <?=$q['email']?><br>
                                        <?=$q['area']?><br>
                                        <?=$q['address']?>
                                    </td>
                                    <td>
                                        <strong>Sub Total: </strong><?=$q['sub_total']?><br>
                                        <strong>Delivery Charges: </strong><?=$q['delivery_charges']?><br>
                                        <strong>Total: <span style="color: red;"><?=number_format($q['total'])?></span></strong>
                                    </td>
                                    <td><?=$q['items']?></td>
                                    <td><?=$q['platform']?></td>
                                    <td><a href="<?=BASEURL?>admin/order-detail/<?=$q['order_id']?>" target="_blank" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Order Items"><i class="icon md-eye" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Order found in the database
                                </td>
                                <td></td>
                                <td></td>
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
            $.post('<?=BASEURL."admin/change-order-status"?>', {status: $status, id: $id}, function(resp) {
                resp = JSON.parse(resp);
                alert(resp.msg);
            });
        }
    });


});//onload
</script>



<?php
function get_time_difference_php($created_time)
{
    $timezone = (DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, "PK"));
    date_default_timezone_set($timezone[0]); //Change as per your default time
    $str = strtotime($created_time);
    $today = strtotime(date('Y-m-d H:i:s'));

    // It returns the time difference in Seconds...
    $time_differnce = $today-$str;

    // To Calculate the time difference in Years...
    $years = 60*60*24*365;

    // To Calculate the time difference in Months...
    $months = 60*60*24*30;

    // To Calculate the time difference in Days...
    $days = 60*60*24;

    // To Calculate the time difference in Hours...
    $hours = 60*60;

    // To Calculate the time difference in Minutes...
    $minutes = 60;

    if(intval($time_differnce/$years) > 1)
    {
        return intval($time_differnce/$years)." years ago";
    }else if(intval($time_differnce/$years) > 0)
    {
        return intval($time_differnce/$years)." year ago";
    }else if(intval($time_differnce/$months) > 1)
    {
        return intval($time_differnce/$months)." months ago";
    }else if(intval(($time_differnce/$months)) > 0)
    {
        return intval(($time_differnce/$months))." month ago";
    }else if(intval(($time_differnce/$days)) > 1)
    {
        return intval(($time_differnce/$days))." days ago";
    }else if (intval(($time_differnce/$days)) > 0) 
    {
        return intval(($time_differnce/$days))." day ago";
    }else if (intval(($time_differnce/$hours)) > 1) 
    {
        return intval(($time_differnce/$hours))." hours ago";
    }else if (intval(($time_differnce/$hours)) > 0) 
    {
        return intval(($time_differnce/$hours))." hour ago";
    }else if (intval(($time_differnce/$minutes)) > 1) 
    {
        return intval(($time_differnce/$minutes))." minutes ago";
    }else if (intval(($time_differnce/$minutes)) > 0) 
    {
        return intval(($time_differnce/$minutes))." minute ago";
    }else if (intval(($time_differnce)) > 1) 
    {
        return intval(($time_differnce))." seconds ago";
    }else
    {
        // return "few seconds ago";
        return "Just Now";
    }
}
?>