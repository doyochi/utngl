<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit | <?= $user->NAMA_USER?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning mb-2">Edit</h6>
            </div>
        </div>
        <div class="card-body">
            <?php
                if(!empty($this->session->flashdata('err_msg'))){
                    echo '
                        <div class="alert alert-danger" role="alert">
                           '.$this->session->flashdata('err_msg').'
                        </div>
                    ';        
                }
            ?>
            <form action="<?= site_url('admin/paymentApprove')?>" enctype='multipart/form-data' method="post">
                <div class="form-row">
                    <div class="form-group col">
                        <label>Nama</label>
                        <input class="form-control" type="text" value="<?= $user->NAMA_USER?>" id="" disabled>
                    </div>
                    <div class="form-group col">
                        <label>Email</label>
                        <input class="form-control" type="text" value="<?= $user->EMAIL_USER?>" id="" disabled>
                        <input class="form-control" type="hidden" value="<?= $user->EMAIL_USER?>" name="email" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Account Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Unsubscribed">Unsubscribed</option>
                            <option value="Subscribed">Subscribed</option>
                        </select>
                    </div>
                </div>
                <button style="float: right;" type="submit" class="btn btn-sm btn-warning">Save</button>
            </form>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#boxImg").click(function(){
        $('#imgPoster').click();
    });

    $("#imgPoster").change(function(){
        readURL(this);
    });
</script>
