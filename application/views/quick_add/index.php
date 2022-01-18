<br>
<a type="button" class="btn btn-primary" href="<?php echo site_url();?>">Home</a>
<br>

<?php
echo "<table class='table '>";
$n=1;$font_size=160;
echo "<tr>";
$bg_colors = array("#29b6f6","#73e8ff","#4db6ac","#82e9de","#00867d","#66bb6a","#98ee99","#e6ceff","#f8bbd0","#ffeeff","#c48b9f");
foreach ($quick_add as $r) 
    {
        $n_color = $bg_colors[Rand(0,10)];
        if($font_size>=60){
            $font_size = $font_size-5;
        }
        if($n % 3==1){echo "<tr>";}
        echo "<td bgcolor='".$n_color."' data-btn='btn_quick_add' data-id='".$r->id."' data-name='".$r->name."' 
        data-price='".$r->price."' data-account_id='".$r->account_id."' data-subaccount_id='".$r->subaccount_id."'
        data-toggle='modal' data-target='#quick_add_modal' ><span style='font-size:".$font_size."%'>".$r->name."</span></td>";
        if($n % 3==0){echo "</tr>";}
        $n++;
    }
    echo "</table>";
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
                        <input type="hidden" class="form-control" id="id">
                        <label for="recipient-name" class="col-form-label">รายการ:</label>
                        <input type="text" class="form-control" id="name">
                        <label for="recipient-name" class="col-form-label">ราคา:</label>
                        <input type="text" class="form-control" id="price"><br>


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