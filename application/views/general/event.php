<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Event</p>
        </div>
        <div class="row my-5">
            <div class="col-12 col-lg-6 ps-5 ps-10 ps-md-0">
                <img class="course-image" src="<?= $event->IMG_EVENT?>">
                <!-- <div class="d-flex flex-row justify-content-start align-items-center mt-4">
                    <p class="font-w-600 mb-0">Share :</p>
                    <button class="border-0 bg-transparent"><span class="iconify fs-5 ms-3" data-icon="brandico:facebook"></span></button>
                    <button class="border-0 bg-transparent"><span class="iconify fs-5 ms-3" data-icon="brandico:twitter-bird"></span></button>
                    <button class="border-0 bg-transparent"><span class="iconify fs-4 ms-3" data-icon="ant-design:instagram-filled"></span></button>
                </div> -->
            </div>
            <div class="col-12 col-lg-6 pe-5 pt-5">
                <p><?= date_format(date_create($event->created_at), 'j F Y')?></p>
                <p class="fs-2 font-w-600 mt-3"><?= $event->NAMA_EVENT?></p>
                <div class="course-card-title collapsable">
                    <div class="head collapse-card active">
                        <span class="iconify minus" data-icon="akar-icons:minus"></span>
                        <span class="iconify plus" data-icon="akar-icons:minus"></span>
                        Description
                    </div>
                    <div class="body active">
                        <table class="table table-striped table-responsive">
                            <tbody class="tbody-card">
                                <tr>
                                    <!-- tr jangan di hapus -->
                                </tr>
                                <tr>
                                    <td>Place</td>
                                    <td>:</td>
                                    <td><?= $event->LOKASI_EVENT?></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>: </td>
                                    <td><?= date_format(date_create($event->TGL_EVENT) , 'j F Y')?></td>
                                </tr>
                                <tr>
                                    <td>Organizer</td>
                                    <td>: </td>
                                    <td><?= $event->PENYELENGGARA_EVENT?></td>
                                </tr>
                                <tr>
                                    <td>Contact Person</td>
                                    <td>: </td>
                                    <td><?= $event->NARAHUBUNG_EVENT?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="course-card-title collapsable">
                    <div class="head collapse-card">
                        <span class="iconify minus" data-icon="akar-icons:minus"></span>
                        <span class="iconify plus" data-icon="akar-icons:minus"></span>
                        Description
                    </div>
                    <div class="body">
                        <p class="mb-0">
                            <?= $event->DESKRIPSI_EVENT?>
                        </p>
                    </div>
                </div>
                <?php
                    if($event->LINK_EVENT != ""){
                        echo '
                            <div class="course-card-title collapsable">
                                <div class="head collapse-card">
                                    <span class="iconify minus" data-icon="akar-icons:minus"></span>
                                    <span class="iconify plus" data-icon="akar-icons:minus"></span>
                                    Link Video Conference
                                </div>
                                <div class="body">
                                    <a href="#" class="text-decoration-underline text-primary">
                                        '.$event->LINK_EVENT.'
                                    </a>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">More Events</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4  mt-5">
            <?php
                foreach ($events as $item) {
                    echo '
                        <div class="col">
                            <div class="event-card">
                                <a href="'.site_url('event/'.$item->ID_EVENT).'">
                                    <div class="event-img-container">
                                        <img src="'.$item->IMG_EVENT.'" onerror="$(this).hide();" alt="" class="event-card-preview">
                                    </div>
            
                                    <div class="px-2">
                                        <p class="event-date">'.date_format(date_create($item->TGL_EVENT), 'j F Y').'</p>
                                        <p class="event-title">'.$item->NAMA_EVENT.'</p>
                                    </div>
                                </a>
                            </div>
                        </div>        
                    ';
                }
            ?>
            <!-- CARD -->
            
            <!-- END OF CARD -->


        </div>
    </div>
</div>