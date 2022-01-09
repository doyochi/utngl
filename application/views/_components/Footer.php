        <!-- PLACE <SCRIPT> TAG HERE  -->

        <?php
        $this->load->view('_components/modal');
        ?>

        <!-- Bootstrap 5.0.2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script src="<?= site_url() ?>/assets/src/js/general.js"></script>

        <!-- AOS  -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>

</html>