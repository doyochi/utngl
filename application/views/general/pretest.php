<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Pretest</p>
        </div>

        <div class="container">
            <p class="fs-3 font-w-600 my-5">
                Pretest Rules
            </p>

            <article>
               <?= $pretest->PERATURAN_PRETEST?>
            </article>
            
            <div class="w-full d-flex">
                <?php
                    if($is_logged == true){
                        if($pretestUser != null){
                            $status = ($pretestUser[0]->STAT_PU == "1" ? "Lanjut" : "Selesai");
                            echo '
                                <a href="'.site_url('pretest/do/'.$pretestUser[0]->ID_PU).'" class="auth-btn px-5 my-5 mx-auto w-auto">'.$status.'</a>
                            ';
                        }else{
                            echo '
                                <a href="'.site_url('pretest/start/'.$pretest->ID_PRETEST).'" class="auth-btn px-5 my-5 mx-auto w-auto">Start</a>
                            ';
                        }
                    }else{
                        echo '
                            <a href="'.site_url('sign-in').'" class="auth-btn px-5 my-5 mx-auto w-auto">Masuk</a>
                        ';
                    }
                ?>
            </div>
        </div>

    </div>
</div>