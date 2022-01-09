<div class="min-vh-100 p-head">
    <div class="container-xxl home-header px-5 mb-5">
        <img src="<?= site_url() ?>assets/src/img/homehands.png" alt="home" class="homehands">
        <div class="d-flex flex-column position-absolute top-50 ps-7 mt-5 translate-middle-y">
            <p class="fs-55 t1 font-w-400" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="50" data-aos-once="true">Be Yourself,</p>
            <p class="fs-55 t2 font-w-700" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="100" data-aos-once="true">Become a Leader</p>
            <p class="fs-4" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="300" data-aos-once="true">United tractors next generation leaders</p>
        </div>
    </div>

    <div class="container-xxl home-header mb-5 aa">
        <div class="d-flex flex-row ps-11 mt-11">
            <div class="w-100 row pt-5">
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="row row-cols-2 g-0 grid-box">

                        <div class="col position-relative">
                            <span data-aos="fade-down" data-aos-duration="1500">645</span> Next Gen Leader
                            <div class="box-yellow"></div>
                        </div>
                        <div class="col box-black overflow-hidden">
                            <span data-aos="fade-left" data-aos-duration="1500" data-aos-delay="100">46</span> Universities
                        </div>
                        <div class="col box-transparent overflow-hidden" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                            <span>223</span> Materials
                        </div>
                        <div class="col box-white overflow-hidden" data-aos="fade-right" data-aos-duration="1500">
                            <span>17</span> Courses
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 pe-5">
                    <p class="fs-55 t1 font-w-400">What is</p>
                    <p class="fs-55 t2 font-w-700">UT NGL</p>
                    <p class="fs-5 pe-5 color-secondary-dark">UT Next Gen Leader is a program that providing training about self development to the milennials and Gen Z that have potention and an eager to learn.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl">
        <div class="row row-cols-2">
            <div class="col p-0">
                <img src="<?= site_url() ?>assets/src/img/home2.png" alt="home" class="w-100 h-100 object-fit-cover">
            </div>
            <div class="col p-5">
                <p class="fs-55 t1 font-w-400">Benefit</p>
                <p class="fs-55 t2 font-w-700 mb-3">UT NGL</p>
                <p class="fs-5 pe-5 color-secondary-dark">An easy to use platform for skill development</p>
                <p class="fs-5 pe-5 color-secondary-dark">Getting Tutors from the expert even have an opportunity to be the part of United Tractors.</p>
            </div>
        </div>
    </div>
    <div class="timeline home-header h-100">
        <div class="container-xxl">
            <div class="row row-cols-2 h-100">
                <div class="col p-0 d-flex justify-content-center align-items-center">
                    <div>
                        <p class="fs-55 t1 font-w-400">Timeline</p>
                        <p class="fs-55 t2 font-w-700 mb-3">UT NGL Batch 1</p>
                    </div>
                </div>
                <div class="col p-5 d-flex justify-content-start align-items-center">
                    <div class="d-flex flex-column fs-4">
                        <div class="position-relative border-l-primary ps-5 pb-4">
                            <span class="primary-dot"></span>
                            <p class="mb-0">30 Okt 21</p>
                            <p class="font-w-600" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="50" data-aos-once="true">Open Register</p>
                        </div>
                        <div class="position-relative border-l-primary ps-5 pb-4">
                            <span class="primary-dot"></span>
                            <p class="mb-0">05 Nov 21</p>
                            <p class="font-w-600" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true">Pretest</p>
                        </div>
                        <div class="position-relative border-l-primary ps-5 pb-4">
                            <span class="primary-dot"></span>
                            <p class="mb-0">12 Nov 21</p>
                            <p class="font-w-600" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true">Upgrade Skill</p>
                        </div>
                        <div class="position-relative border-l-primary t ps-5 pb-4">
                            <span class="primary-dot"></span>
                            <p class="mb-0">06 Des 21</p>
                            <p class="font-w-600" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true">Assessment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl">
        <div class="row row-cols-2 g-0 w-100 grid-photo">
            <div class="col">
                <img src="<?= site_url() ?>assets/src/img/homegrid1.png">
            </div>
            <div class="col bgc-primary d-flex justify-content-center align-items-center">
                <div>
                    <p class="fs-55 t1 font-w-400">Be a Leader</p>
                    <p class="fs-55 t2 font-w-700 mb-3">UT NGL</p>
                    <?php
                    if ($is_logged == true) {
                        foreach($accstatus as $items)
                        if ($items->STATUS_USER == 'Subscribed') {
                            $btn = '<i class="auth-btn bg-white px-7 w-auto me-auto disabled">You are all set &#10004;</i>';
                        } else {
                            $btn = '<a href="' . site_url('upgrade') . '" class="auth-btn bg-white px-7 w-auto me-auto">Upgrade</a>';
                        }
                    } else {
                        $btn = '<a href="' . site_url('sign-in') . '" class="auth-btn bg-white px-7 w-auto me-auto">Sign In</a>';
                    }
                    echo '' . $btn . '';
                    ?>
                </div>
            </div>
            <div class="col">
                <img src="<?= site_url() ?>assets/src/img/homegrid2.png">
            </div>
            <div class="col">
                <img src="<?= site_url() ?>assets/src/img/homegrid3.png">
            </div>
        </div>
    </div>

</div>