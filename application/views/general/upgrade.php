<div class="min-vh-100 p-head">
    <div class="container-xxl p-md-5">
        <div class="border-bottom w-100 py-3">
            <p class="fs-4 font-w-600">Upgrade</p>
        </div>

        <div class="container">

            <p class="fs-3 font-w-600 my-5">
                Upgrade to Access Courses
            </p>

            <article>
                With only <strong>Rp. 50.000</strong> You will get these benefit
                <ul>
                    <li>
                        Access to all course
                    </li>
                    <li>
                        Get various course about Programming, Design, and Management
                    </li>
                    <li>
                        Download materials about related topics
                    </li>
                </ul>
            </article>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        How to Pay
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Bank Account
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-striped table-responsive my-3">
                        <tbody class="tbody-card">
                            <article class="container p-5">
                                <p>Payment Guide</p>
                                <ol>
                                    <li>
                                        Transfer Rp. 50.000,- to UTNGL Bank Account
                                    </li>
                                    <li>
                                        Screenshoot or get the payment proof
                                    </li>
                                    <li>
                                        Upload the payment proof
                                    </li>
                                    <li>
                                        Wait for approval status, status can be checked on profile page
                                    </li>
                                </ol>
                            </article>


                        </tbody>
                    </table>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <article class="container p-5">
                        <p>
                            Bank Account
                        <ul>
                            <li>
                                OVO: 0895-3607-36788 a.n. Hikmah
                            </li>
                            <li>
                                Gopay: 0895-3607-36788 a.n. Hikmah
                            </li>
                            <li>
                                BNI: 0900773319 a.n. Hikmah
                            </li>
                            <li>
                                BRI: 117401020739506 a.n. Hikmah
                            </li>
                            <li>
                                Hana Bank: 18713239030 a.n. Hikmah
                            </li>

                        </ul>
                        </p>
                    </article>

                </div>
                <?php

                echo '
                                <div class="w-full d-flex">
                                    <a href="' . site_url("upgrade/payment") . '" class="auth-btn px-5 my-5 mx-auto w-auto">Submit Payment Proof</a>
                                </div>
                            ';

                ?>
            </div>

        </div>

    </div>
</div>