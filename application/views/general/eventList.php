<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Event</p>
        </div>

        <div class="search-input-container">
            <div class="d-flex position-relative w-100">
                <input type="text" class="search-input" placeholder="Find event ">
                <div class="search-icon">
                    <span class="spacer me-3"></span>
                    <span class="iconify fs-3" data-icon="fluent:search-24-filled"></span>
                </div>
            </div>
        </div>

    
            <?php
                if($events != null){
                    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-5">';
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
                    echo '</div>';
                }else{
                    echo '<div class="text-center"><img src="'.site_url('assets/src/img/tidakadadata.svg').'" style="max-width: 400px;" /></div>';
                }
            ?>
    </div>
</div>