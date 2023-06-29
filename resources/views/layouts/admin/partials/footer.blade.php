<!-- Copyrights -->
<div class="copyrights">
    Copyright &copy; {{ date('Y') }} GoTours. All rights reserveds.
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
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);

        $('.ckeditor').ckeditor();

        $('.table').DataTable();
    });

    $('#joinformsubmit').on('click', function() {
        alert('abcd');
        if ($("#jointheteamform").length > 0) {
            $("#jointheteamform").validate({
                rules: {
                    username: {
                        required: true,
                        maxlength: 100
                    },
                    usermail: {
                        required: true,
                        maxlength: 100,
                        email: true,
                    },
                    usermessage: {
                        required: true,
                        maxlength: 5000
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name",
                        maxlength: "Your name maxlength should be 100 characters long."
                    },
                    email: {
                        required: "Please enter valid email",
                        email: "Please enter valid email",
                        maxlength: "The email name should less than or equal to 100 characters",
                    },
                    message: {
                        required: "Please enter message",
                        maxlength: "Your message name maxlength should be 5000 characters long."
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#joinformsubmit').html('Please Wait...');
                    $("#joinformsubmit").attr("disabled", true);
                    $.ajax({
                        url: "{{ url('jointeam') }}",
                        type: "POST",
                        data: $('#jointheteamform').serialize(),
                        success: function(response) {
                            $('#joinformsubmit').html('Submit');
                            $("#joinformsubmit").attr("disabled", false);
                            alert('Ajax form has been submitted successfully');
                            document.getElementById("jointheteamform").reset();
                        }
                    });
                }
            })
        }
    });
</script>

</body>

</html>
