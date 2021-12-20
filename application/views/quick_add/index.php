<br>
<a type="button" class="btn btn-primary" href="<?php echo site_url();?>">Home</a>
<br>
<br>
<?php

foreach ($quick_add as $r) {
  echo "<button class='btn btn-info' data-btn='btn_quick_add' ";
  echo " data-name='".$r->name."'";
  echo " data-price='".$r->price."'";
  echo " data-account_id='".$r->account_id."'";
  echo " data-subaccount_id='".$r->subaccount_id."'";
  echo "data-toggle='modal' data-target='#quick_add_modal' >";
  echo $r->shortname . "</button> ";
}
?>

<script src="<?php echo base_url() ?>assets/apps/js/quick_add.js" charset="utf-8"></script>



<div class="modal fade" id="quick_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><label id='txt_name'></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="price"><br>
                        <input type="hidden" class="form-control" id="name">

                        <input type="hidden" class="form-control" id="account_id">
                        <input type="hidden" class="form-control" id="subaccount_id">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">note:</label>
                        <textarea class="form-control" id="note"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>