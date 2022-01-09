<header class="header px-5 py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
    <a href="<?= site_url() ?>home" class="brand mr-auto">UTNGL</a>
    <div class="d-flex flex-column flex-md-row align-items-center h-100">
        <!-- <a href="<?= site_url() ?>home/pretest" class="links <?= uri_string() == 'pretest' ? 'active' : '' ?>">Pretest</a> -->
        <button class="links border-0 bg-transparent position-relative nav-sublink">
            Pretest <span class="iconify ms-3" data-icon="akar-icons:chevron-down"></span>

            <nav class="sub-nav p-2 position-absolute d-flex flex-column align-items-start">
                <?php
                    $pretests = $this->Pretest->get(['ISPUBLISHED_PRETEST' => '1', 'orderBy' => 'NAMA_PRETEST ASC']);
                    foreach ($pretests as $item) {
                        echo '
                            <span class="sub-link"><a href="'.site_url('pretest/'.$item->ID_PRETEST).'">'.$item->NAMA_PRETEST.'</a></span>        
                        ';
                    }
                ?>
            </nav>
        </button>
        <button class="links border-0 bg-transparent position-relative nav-sublink">
            Became a <span class="iconify ms-3" data-icon="akar-icons:chevron-down"></span>

            <nav class="sub-nav p-2 position-absolute d-flex flex-column align-items-start">

                <?php
                $kategoris = $this->KategoriCourse->get(['ISPUBLISHED_KATCOU' => '1', 'orderBy' => 'NAMA_KATCOU ASC']);
                foreach ($kategoris as $item) {
                    echo '
                            <span class="sub-link"><a href="' . site_url('course-list/' . $item->ID_KATCOU) . '">' . $item->NAMA_KATCOU . '</a></span>
                        ';
                }
                ?>
            </nav>
        </button>
        <a href="<?= site_url() ?>event-list" class="links <?= uri_string() == 'home/eventList' ? 'active' : '' ?>">Event</a>
        <a href="<?= site_url() ?>home/about" class="links <?= uri_string() == 'home/about' ? 'active' : '' ?>">About</a>
    </div>

    <!-- IF LOGGED IN -->
    <?php if ($this->session->userdata('is_logged')) { ?>
        <div class="d-flex ms-n5 flex-row align-items-center h-100">
            <a href="#" class="links circle font-w-600"><span class="badge"></span><img class="icon" src="<?= site_url() ?>assets/src/img/bell-icon.svg" alt=""></a>
            <a class="links mx-1 circle-photo font-w-600"><img class="icon" src="<?= site_url() ?>assets/src/img/cat.jpg" alt=""></a>
            <a class="links username mx-2 font-w-600"><?= strtok($this->session->userdata('nama'), " ") ?></a>
            <div class="nav-sublink c-pointer">
                <button class="border-0 bg-transparent ms-3"><span class="iconify fs-4" data-icon="bi:three-dots-vertical"></span></button>

                <nav class="sub-nav profile p-2 position-absolute d-flex flex-column align-items-start">

                    <!-- Tambah parameter di link nya  -->
                    <span class="sub-link"><a href="<?= site_url() ?>profile">Profile</a></span>
                    <span class="sub-link"><a href="<?= site_url() ?>home/#">Help</a></span>
                    <span class="sub-link text-danger c-pointer"><a data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></span>
                </nav>
            </div>
        </div>
        <!-- IF NOT LOGGED IN -->
    <?php } else { ?>
        <div class="d-flex flex-row align-items-center h-100">
            <a href="<?= site_url('sign-up') ?>" class="links font-w-600 <?= uri_string() == 'register' ? 'active' : '' ?>">Register</a>
            <span class="spacer"></span>
            <a href="<?= site_url('sign-in') ?>" class="links font-w-600 <?= uri_string() == 'login' ? 'active' : '' ?>">Sign In</a>
        </div>
        <!-- <div class="d-flex ms-n5 flex-row align-items-center h-100">
            <a href="<?= site_url('sign-in') ?>" class="auth-btn px-3">Masuk</a>
        </div> -->
    <?php } ?>
</header>