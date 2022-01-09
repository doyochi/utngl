<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Pretest</p>
        </div>

        <div class="container">
            <?php
                if($pu->IMG_PRETEST != null){
                    echo '
                        <div class="w-full border b-radius-28 text-center my-5 pretest-img">
                            <img src="'.$pu->IMG_PRETEST.'">
                        </div>
                    ';
                }
            ?>
            

            <p class="fs-3 font-w-600 my-5">
                <?= $pu->NAMA_PRETEST?> Test
            </p>

            <article>
                <?= $pu->SOAL_PRETEST?>
            </article>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        Materials
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Comments
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-striped table-responsive my-3">
                        <tbody class="tbody-card">

                            <tr>
                                <td>Remaining Times</td>
                                <td>:</td>
                                <?php
                                    $currDate       = date_create(date('Y-m-d H:i:s'));
                                    $deadlinePU     = date_create($pu->DEADLINE_PU);
                                    if($pu->STAT_PU == "1"){
                                        $diff           = date_diff($deadlinePU, $currDate);
                                        $statusCollect  = $diff->format('%d days %h hours %i minutes');
                                    }else if($pu->STAT_PU == "2"){
                                        $submitedAt = date_create($pu->submited_at);
                                        if($submitedAt > $deadlinePU){
                                            $diff   = date_diff($submitedAt, $deadlinePU);

                                            $hari   = ($diff->format("%d") != "0" ? $diff->format("%d")." hari " : "");
                                            $jam    = ($diff->format("%h") != "0" ? $diff->format("%h")." jam " : "");
                                            $menit  = ($diff->format("%i") != "0" ? $diff->format("%i")." menit" : "");

                                            $statusCollect  = '
                                                <div class="bg-lighter-danger color-danger font-w-600 b-radius-6 p-3 py-2">
                                                    Overdue '.$hari.$jam.$menit.'
                                                </div>
                                            ';
                                        }else{
                                            $statusCollect  = '
                                                <div class="bg-lighter-success color-success font-w-600 b-radius-6 p-3 py-2">
                                                    Submitted at '.date_format($submitedAt, 'j M Y H:i').'
                                                </div>
                                            ';
                                        }
                                    }
                                    
                                ?>
                                <td><?= $statusCollect?></td>
                            </tr>
                            <tr>
                                <td>Submitted File</td>
                                <td>: </td>
                                <?php
                                    if($pu->JAWABAN_PU != null){
                                        echo '
                                            <td>
                                                <a href="'.$pu->JAWABAN_PU.'" class="course-pdf d-flex flex-wrap flex-col">
                                                    <button class="course-card-title option">
                                                        <img src="'.site_url().'assets/src/img/pdf.svg" width="24" height="24" class="me-2">
                                                        File Submit
                                                    </button>
                                                </a>
                                            </td>
                                        ';
                                    }else{
                                        echo '<td>-</td>';
                                    }
                                ?>
                            </tr>
                            <tr>
                                <td>Assessment Guidelines</td>
                                <td>: </td>
                                <td><?= $pu->FORMATPENGERJAAN_PRETEST ?></td>
                            </tr>
                            <tr>
                                <td>File Formats</td>
                                <td>: </td>
                                <td><?= str_replace('|', '/', $pu->FORMATFILE_PRETEST)?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                        if($pu->STAT_PU == "1"){
                            echo '
                                <div class="w-full d-flex">
                                    <a href="'.site_url("pretest/submit/".$pu->ID_PU) .'" class="auth-btn px-5 my-5 mx-auto w-auto">Submit</a>
                                </div>
                            ';
                        }
                    ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <article class="container p-5">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultrices sem id aliquet sed quis. Ipsum eget hac nunc, nunc enim. Neque, pellentesque arcu amet, et duis aliquet ultrices imperdiet nunc. Ac mattis eu, volutpat, amet mi. Enim ipsum enim sed leo commodo, sit ut tincidunt. Lectus sed sed risus donec tortor in vel vulputate. Sed nunc placerat aliquet felis. Felis mattis tristique a nulla lorem. Dis praesent egestas tempus, bibendum risus volutpat. In diam ultricies pellentesque tempor tempor felis vivamus vel nulla. Cras bibendum montes, mauris dui ultrices habitant diam libero facilisis.
                        </p>
                    </article>
                </div>
            </div>

        </div>

    </div>
</div>