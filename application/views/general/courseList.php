<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Course</p>
        </div>

        <p class="fs-3 font-w-600 my-5">
            <?= $kategori->NAMA_KATCOU ?>
        </p>

        <!-- CARD -->
        <?php
        if ($courses != null) {
            echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            foreach ($courses as $item) {
                $progress = "";
                if ($is_logged == true) {
                    foreach ($accstatus as $item2) {
                        if ($item2->STATUS_USER == 'Subscribed') {
                            if ($item->STAT_CU == "0") {
                                $progress   = "Progress " . $item->PROGRESS_CU . "%";
                                $btn        = '<a href="' . site_url('course/' . $item->ID_CU) . '" class="auth-btn">Start</a>';
                            } else if ($item->STAT_CU == "1") {
                                $progress   = "Progress " . $item->PROGRESS_CU . "%";
                                $btn        = '<a href="' . site_url('course/' . $item->ID_CU) . '" class="auth-btn">Continue</a>';
                            } else if ($item->STAT_CU == "2") {
                                $progress   = '
                                        Done
                                    <span class="iconify ms-2 fs-3 color-success" data-icon="fluent:checkmark-circle-12-filled"></span>
                                ';
                                $btn        = '<a href="' . site_url('course/' . $item->ID_CU) . '" class="auth-btn">Selesai</a>';
                            }
                        } else {
                            $btn = '<a href="' . site_url('upgrade') . '" class="auth-btn">Upgrade</a>';
                        }
                    }
                } else {
                    $btn = '<a href="' . site_url('sign-in') . '" class="auth-btn">Sign In</a>';
                }

                $deskripsi = explode("</p>", $item->DESKRIPSI_COURSE);
                $deskripsi = str_replace("<p>", " ", $deskripsi[0]);
                echo '
                            <div class="col">
                                <div class="event-card">
                
                                    <div class="event-img-container">
                                        <img src="' . $item->IMG_COURSE . '" onerror="$(this).hide();" alt="" class="event-card-preview">
                                    </div>
                
                                    <div class="px-2">
                                        <p class="event-title">' . $item->NAMA_COURSE . '</p>
                                        <p class="paragraph">' . $deskripsi . '</p>
                
                                        <div class="d-flex justify-content-between align-items-center mb-3 mt-auto">
                                            <div class="d-flex flex-row mini-photo-container">
                                                <img class="mini-photo" src="' . site_url() . 'assets/src/img/cat.jpg" alt="">
                                                <img class="mini-photo" src="' . site_url() . 'assets/src/img/sus.jpg" alt="">
                                                <img class="mini-photo" src="' . site_url() . 'assets/src/img/no.jpg" alt="">
                                                <img class="mini-photo" src="' . site_url() . 'assets/src/img/beluga.jpg" alt="">
                                            </div>
                                            <p class="fs-5 font-w-600 mb-0">
                                                ' . $progress . '
                                            </p>
                                        </div>
                                        ' . $btn . '
                                    </div>
                                </div>
                            </div>        
                        ';
            }
            echo '</div>';
        } else {
            echo '<div class="text-center"><img src="' . site_url('assets/src/img/tidakadadata.svg') . '" style="max-width: 400px;" /></div>';
        }
        ?>
        <!-- END OF CARD -->
    </div>
</div>
</div>