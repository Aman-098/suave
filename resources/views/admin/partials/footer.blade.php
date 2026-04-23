<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Summernote JS -->
<script src="{{ asset('assets/plugins/summernote/summernote-lite.min.js') }}"></script>
{{-- <!-- TinyMCE -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.7/tinymce.min.js"></script> --}}

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

<!-- Color Picker JS -->
{{-- <script src="{{ asset('assets/plugins/@simonwep/pickr/pickr.es5.min.js') }}"></script> --}}

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Daterangepicker & Datetimepicker JS -->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Chart JS -->
{{-- <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script> --}}

<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // $(document).ready(function() {

    //     let timeout;

    //     function resetTimer() {
    //         clearTimeout(timeout);

    //         timeout = setTimeout(() => {
    //             // logout trigger
    //             $('.logout-btn').trigger('click');
    //         }, 300000); // 5 minute
    //     }

    //     // user activity events
    //     $(document).on('mousemove keypress click scroll', function() {
    //         resetTimer();
    //     });

    //     // start timer initially
    //     resetTimer();
    // });
</script>

<!-- Page-specific scripts -->
@stack('scripts')

</body>

</html>
