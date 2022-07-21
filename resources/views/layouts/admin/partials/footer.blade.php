<!-- Copyrights -->
<div class="copyrights">
    Copyright &copy; {{ date('Y') }} Travele. All rights reserveds.
</div>
</div>
<!-- Dashboard / End -->
</div>
<!-- end Container Wrapper -->
<!-- *Scripts* -->
<script src="{{ asset('admin_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/canvasjs.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/chart.js') }}"></script>
<script src="{{ asset('admin_assets/js/counterup.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('admin_assets/js/dashboard-custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    $(document).ready(function () {
    $('.table').DataTable();
    });
</script>

</body>

</html>
