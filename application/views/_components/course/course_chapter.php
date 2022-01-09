<div class="">
    <?php
        $statMU = $materials[$course->STEP_CU]->STAT_MU == "2" ? '<span class="iconify fs-3 color-success" data-icon="fluent:checkmark-circle-12-filled"></span>' : '';
    ?>
    <p class="fs-4 font-w-600" id="title"><?= $statMU?> Materi <?= $course->STEP_CU+1 ?> : <?= $materials[$course->STEP_CU]->NAMA_MATERIAL?></p>

    <div class="course-video">
        <iframe width="100%" height="100%" id="content" src="<?= $materials[$course->STEP_CU]->CONTENT_MATERIAL?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="px-2">
        <p class="font-w-600 mt-4">Deskripsi :</p>
        <p id="desc"><?= $materials[$course->STEP_CU]->DESKRIPSI_MATERIAL?></p>
    </div>

    <div id="resources">
        <?php
            $resources = $materials[$course->STEP_CU]->RESOURCE_MATERIAL;
            $resources = explode(';', $resources);
            foreach ($resources as $item) {
                echo '
                    <a href="'.$item.'" class="course-pdf d-flex flex-wrap flex-col py-3">
                        <button class="course-card-title option">
                            <img src="'.site_url().'assets/src/img/pdf.svg" width="24" height="24" class="me-2">
                            Materi Tambahan
                        </button>
                    </a>
                ';
            }
        ?>
    </div>

    <div class="px-2">
        <!-- <p class="font-w-600 mt-5"> Kuis: </p>

        <div class="question-wrapper">

            <div class="course-card-title question">
                1. &emsp;
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elementum fermentum risus eu eu sapien pharetra, praesent pharetra.
            </div>
            <div class="d-flex flex-wrap mt-4">
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="html" name="question1" value="HTML">
                    <label for="html">HTML</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="css" name="question1" value="CSS">
                    <label for="css">CSS</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="php" name="question1" value="PHP">
                    <label for="php">PHP</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="vue" name="question1" value="Vue">
                    <label for="vue">Vue.Js</label>
                </div>
            </div>
        </div>
        <div class="question-wrapper">

            <div class="course-card-title question">
                2. &emsp;
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elementum fermentum risus eu eu sapien pharetra, praesent pharetra.
            </div>
            <div class="d-flex flex-wrap mt-4">
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="asd" name="question2" value="HTML">
                    <label for="asd">ASD</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="qwe" name="question2" value="HTML">
                    <label for="qwe">QWE</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="zxc" name="question2" value="HTML">
                    <label for="zxc">ZXC</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="wer" name="question2" value="HTML">
                    <label for="wer">Vue.Js</label>
                </div>
            </div>
        </div>
        <div class="question-wrapper">

            <div class="course-card-title question">
                3. &emsp;
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elementum fermentum risus eu eu sapien pharetra, praesent pharetra.
            </div>
            <div class="d-flex flex-wrap mt-4">
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="123" name="question3" value="HTML">
                    <label for="123">123 Roger 1234566</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="234" name="question3" value="HTML">
                    <label for="234">1sampai9</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="345" name="question3" value="HTML">
                    <label for="345">345</label>
                </div>
                <div class="course-card-title option multiple-choice-wrapper">
                    <input type="radio" id="456" name="question3" value="HTML">
                    <label for="456">456.Js</label>
                </div>
            </div>
        </div> -->
        <div id="btnSubmit">
            <?php
                if($materials[$course->STEP_CU]->STAT_MU != "2"){
                    if(count($materials) == ($course->STEP_CU+1)){
                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#finishMaterialModal" class="auth-btn">Selesai</a>';
                    }else{
                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#nextMaterialModal" class="auth-btn">Materi Selanjutnya</a>';
                    } 
                }
            ?>
        </div>
    </div>

</div>