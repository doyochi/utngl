<section class="container-xxl px-md-5 pe-lg-0">
    <div class="row w-100 p-0 m-0">
        <div class="col-12 col-lg-4 pt-5 pe-4">
            <?php
                $no = 1;
                foreach ($materials as $item) {
                    $status  = "";
                    $data       = 'data-id="'.$item->ID_MU.'" data-no="'.$no.'"';
                    $btnCard    = "btnCard";
                    if($item->STAT_MU == "1"){
                        $status     = 'current';
                    }else if($item->STAT_MU == "2"){
                        $status     = 'active';
                    }else{
                        $data       = "";
                        $btnCard    = "color-secondary-dark";
                    }

                    echo '
                        <button '.$data.' class=" course-card-title '.$btnCard.' '.$status.'">
                            Materi '.$no.' : '.$item->NAMA_MATERIAL.'
                        </button>        
                    ';
                    $no++;
                }
            ?>
        </div>
        <div class="col-12 col-lg-8 py-5 bg-light-grey5">
            <div class="px-3 pe-lg-5"">
            
                <?php
                $this->load->view('_components/course/course_chapter');
                ?>

            </div>
        </div>
    </div>
</section>