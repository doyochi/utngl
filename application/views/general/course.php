<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5 pb-md-0">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Course</p>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-lg-6 pe-5">
                <div class="d-flex flex-row justify-content-between">
                    <?php
                        if($course->STAT_CU == "2"){
                            echo '
                                <p class="fs-5 font-w-600">Done<span class="iconify ms-2 fs-3 color-success" data-icon="fluent:checkmark-circle-12-filled"></span></p>
                            ';        
                        }else{
                            echo '
                                <p class="fs-5 font-w-600">Progress: '.$course->PROGRESS_CU.'%</p>
                            ';
                        }
                    ?>
                    
                    <p><span class="font-w-600">Categories :</span> <?= $course->NAMA_KATCOU?></p>
                </div>
                <p class="fs-2 font-w-600 mt-3"><?= $course->NAMA_COURSE?></p>
                <div class="desc-text-container mb-5">

                    <p class="color-secondary-dark">
                        <?= $course->DESKRIPSI_COURSE?>
                    </p>
                    <div class="gradient-decor d-flex justify-content-center align-items-end">
                        <button class="border-0 outline-none bg-transparent fs-5 font-w-500 d-flex align-items-center" id="toggleSee">
                            <span class="see-more">View More <span class="iconify ms-3" data-icon="akar-icons:chevron-down"></span></span>
                            <span class="see-less">View Less <span class="iconify ms-3" data-icon="akar-icons:chevron-up"></span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img class="course-image" src="<?= $course->IMG_COURSE?>">
                <div class="d-flex flex-row justify-content-end align-items-center mt-4">
                    <!-- <p class="font-w-600 mb-0">Share :</p>
                    <button class="border-0 bg-transparent"><span class="iconify fs-5 ms-3" data-icon="brandico:facebook"></span></button>   
                    <button class="border-0 bg-transparent"><span class="iconify fs-5 ms-3" data-icon="brandico:twitter-bird"></span></button>   
                    <button class="border-0 bg-transparent"><span class="iconify fs-4 ms-3" data-icon="ant-design:instagram-filled"></span></button>    -->
                </div>
            </div>
        </div>

        <div class="border-bottom w-100 pt-3 mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        Learning Materials
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Announcement
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php
            $this->load->view('_components/course/course');
            ?>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <article class="container p-5">
                <?php
                    if($course->PENGUMUMAN_COURSE != null || $course->PENGUMUMAN_COURSE != ""){
                        echo $course->PENGUMUMAN_COURSE;
                    }else{
                        echo '<div class="text-center"><img src="'.site_url('assets/src/img/tidakadadata.svg').'" style="max-width: 400px;" /></div>';
                    }
                ?>
            </article>
        </div>
    </div>
</div>
<!-- NEXT MATERIAL MODAL -->
<div class="modal fade" id="nextMaterialModal" tabindex="-1" aria-labelledby="nextMaterialModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="<?= base_url('assets/src/img/icon-materi.svg')?>" style="width: 300px;" alt="material">
        <p class="my-3" style="font-weight: 600;">Have you understood this chapter and ready to move on to the next chapter?</p>
      </div>
      <div class="modal-footer border-top-0">
        <form id="formMateri" action="<?= site_url('course/next-materi')?>" method="post">
          <input type="hidden" id="idMateri" name="id" value="<?= $materials[$course->STEP_CU]->ID_MU?>" />
          <input type="hidden" id="idMateri" name="idcu" value="<?= $course->ID_CU?>" />
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Learn More</button>
          <button type="submit" class="btn btn-warning text-white">Next Chapter</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END NEXT MATERIAL MODAL -->
<!-- FINISH MATERIAL MODAL -->
<div class="modal fade" id="finishMaterialModal" tabindex="-1" aria-labelledby="finishMaterialModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="<?= base_url('assets/src/img/icon-materi.svg')?>" style="width: 300px;" alt="material">
        <p class="my-3" style="font-weight: 600;">Have you understood all of the chapters and want to complete this course?</p>
      </div>
      <div class="modal-footer border-top-0">
        <form id="formMateri" action="<?= site_url('course/finish-materi')?>" method="post">
          <input type="hidden" id="idMateri" name="id" value="<?= $materials[$course->STEP_CU]->ID_MU?>" />
          <input type="hidden" id="idMateri" name="idcu" value="<?= $course->ID_CU?>" />
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Learn More</button>
          <button type="submit" class="btn btn-warning text-white">Finish</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END FINISH MATERIAL MODAL -->
<script>
    $('.btnCard').click(function(){
        const id = $(this).data('id')
        const no = $(this).data('no')
        $.ajax({
            url: "<?= site_url('course/ajxGetMU')?>",
            method: "POST",
            data: {id: id },
            success: function(res){
                const htmlDone = `<span class="iconify fs-3 color-success" data-icon="fluent:checkmark-circle-12-filled"></span>`;

                res = JSON.parse(res)
                $('#title').html(`${res.STAT_MU == "2" ? htmlDone : ""} Materi ${no} : ${res.NAMA_MATERIAL}`);
                $('#desc').html(`${res.DESKRIPSI_MATERIAL}`);
                $('#content').attr('src', res.CONTENT_MATERIAL);
                $('#idMateri').val(id);

                let htmlBtn = ``;
                if(res.STAT_MU != "2"){
                    const countMaterial = "<?= count($materials)?>";
                    if(countMaterial == no){
                        htmlBtn += `<a href="#" data-bs-toggle="modal" data-bs-target="#finishMaterialModal" class="auth-btn">Finish</a>`;
                    }else{
                        htmlBtn = `<a href="#" data-bs-toggle="modal" data-bs-target="#nextMaterialModal" class="auth-btn">Next Chapter</a>`;
                    }
                }
                $('#btnSubmit').html(htmlBtn);

                let html = "";
                const resources = res.RESOURCE_MATERIAL.split(';');
                for(const item of resources){
                    baseUrl = "<?= site_url()?>"
                    html += `
                        <a href="${item}" class="course-pdf d-flex flex-wrap flex-col py-3">
                            <button class="course-card-title option">
                                <img src="${baseUrl}assets/src/img/pdf.svg" width="24" height="24" class="me-2">
                                Additional Materials
                            </button>
                        </a>
                    `;
                }
                $('#resources').html(html);

                
            }
        })
    })
</script>