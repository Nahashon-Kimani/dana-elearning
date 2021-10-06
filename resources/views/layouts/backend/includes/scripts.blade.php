<!-- Bootstrap core JavaScript-->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
  
<!-- simplebar js -->
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- waves effect js -->
<script src="{{ asset('backend/assets/js/waves.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('backend/assets/js/sidebar-menu.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('backend/assets/js/app-script.js') }}"></script>

<!-- Vector map JavaScript -->
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Chart js -->
<script src="{{ asset('backend/assets/plugins/Chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/Chart.js/Chart.extension.js') }}"></script>
<!-- Index js -->
<script src="{{ asset('backend/assets/js/index5.js') }}"></script>

{{-- Data tables --}}
<!--Data Tables js-->
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

       {{-- incase of an error show brian toastr with error --}}
       <script>
       	@if ($errors->any())
       		@foreach ($errors->all() as $error)
       			toastr.error('{{ $error }}', 'Error',{
       				closeButton:true,
       				progressBar:true,
       			});
       			
       		@endforeach
       </script>

  <script>
   $(document).ready(function() {
    //Default data table
     $('#default-datatable').DataTable();


     var table = $('#example').DataTable( {
      lengthChange: false,
      buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
    } );

   table.buttons().container()
      .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    
    } );

  </script>

  {{-- Summernote --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
  <script src="{{ asset('backend/assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script>
    $('#summernote').summernote({
      placeholder: 'Input Text here',
      tabsize: 2,
      height: 700
    });
  </script>