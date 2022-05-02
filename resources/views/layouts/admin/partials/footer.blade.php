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
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    });
</script>

</body>

</html>
