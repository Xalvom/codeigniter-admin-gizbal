<!-- Footer -->
<footer class="sticky-footer bg-white">
   <div class="container my-auto">
      <div class="copyright text-center my-auto">
         <span>Copyright &copy; Himman Husaina 2019</span>
      </div>
   </div>
</footer>
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
            <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Klik "Logout" jika anda ingin keluar.</div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
         </div>
      </div>
   </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- Print dataTables -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!-- ckeditor plugin -->
<script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>


<script>
   $(document).ready(function() {
      $('#table1').DataTable({
         dom: 'Bfrtip',
         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
      });
   });
</script>
<script type="text/javascript">
   $(function() {
      CKEDITOR.replace('ckeditor');
   });
</script>
<script>
   $(document).ready(function() {
      $('#balita').DataTable({
         "bFilter": false,
         "bInfo": false,
         dom: 'Bfrtip',
         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
      });
      balita();
      $("#filter").change(function() {
         // let a = $(this).val();
         // console.log(a);
         balita();
      });
   });

   function balita() {
      var filter = $("#filter").val();
      $.ajax({
         url: "<?= base_url('Balita/load_balita') ?>",
         data: "filter=" + filter,
         success: function(data) {
            // console.log(data);
            $("#balita tbody").html(data);
         }
      });
   }
</script>
</body>

</html>