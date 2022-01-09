<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Payment</p>
        </div>

        <div class="container">
            

            <p class="fs-3 font-w-600 mt-5 mb-0">
                Submit Payment Proof
            </p>
            <p class="color-secondary-dark">
                Upload image of payment proof with 2MB maximum size
            </p>
            <?php
            if ($this->session->flashdata('err_msg')) {
                echo '
                        <div class="mb-4">
                            <div class="mb-3 bg-lighter-danger color-danger font-w-600 b-radius-6 p-3 py-2">
                                ' . $this->session->flashdata('err_msg') . '
                            </div>
                        </div>
                    ';
            }
            ?>
            <form action="<?= site_url('upgrade/bukti') ?>" enctype="multipart/form-data" method="post" id="formSubmitPretest">
                <div class="input-file">
                    <span class="course-card-title button-file mb-0" id="buttonSubmit">
                        Browse
                        <input type="file" accept=".jpg,.png,.jpeg,.bmp" id="submit" name="bukti">
                    </span>
                    <div id="labelSubmit">
                        <div>
                            <span class="iconify color-success fs-4" data-icon="akar-icons:circle-check-fill"></span>
                            <i></i>
                        </div>
                        <div class="text-center mt-3">
                            <span class="me-2 text-danger fw-bold c-pointer" id="deleteSubmit">Delete File</span>
                            <label for="submit" class="ms-2 fw-bold c-pointer">Replace File</label>
                        </div>
                    </div>
                </div>

                <div class="w-full d-flex">
                    
                    <!-- <a type="button" data-bs-toggle="modal" data-bs-target="#finishPretestModal" class="auth-btn px-5 my-5 mx-auto w-auto">Kumpulkan</a> -->
                    <button type="submit" class="auth-btn px-5 my-5 mx-auto w-auto">Submit</button>
                </div>
            </form>

        </div>

    </div>
</div>
<script>
    $(document).ready() {
        $('#btnSubmit').click(function() {
            alert('ilham')
            $("#formSubmitPretest").submit();
        })
    }
</script>