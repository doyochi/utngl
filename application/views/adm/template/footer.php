<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; United Tractors Next Generation Leader</span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin untuk keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= site_url('admin/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/adm/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/adm/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level custom scripts -->

<!-- Page level plugins -->
<script src="<?= base_url('assets/adm/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/adm/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/adm/js/demo/datatables.js'); ?>"></script>
<script src="<?= base_url('assets/adm/js/app.js'); ?>"></script>
<script src="<?= base_url('assets/src/js/general.js'); ?>"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="<?= site_url()?>/assets/adm/summernote/summernote.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
</script>
</body>

</html>