<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js')}}" ></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/pace.min.js')}}"></script>
<script src="{{asset('js/lobipanel.min.js')}}"></script>
<script src="{{asset('js/iscroll.js')}}"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="{{asset('js/prism.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>

<!-- ========== THEME JS ========== -->
<script src="{{asset('js/main.js')}}"></script>
<script>
$(function($) {
    $('#example').DataTable();

    $('#example2').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
        "paging":         false
    } );

    $('#example3').DataTable();
});
</script>



<!-- jQuery and bootstrtap js -->
<script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>

<!-- start plugin js file  -->
<script src="{{asset('assets/bundles/counterup.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/jvectormap1.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/knobjs.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/flot.bundle.js')}}"></script>

<!-- Start core js and page js -->
<script src="{{asset('assets/js/core.js')}}"></script>
{{-- <script src="{{asset('assets/js/table/datatable.js"></s')}}cript> --}}

<!-- start plugin js file  -->
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('assets/js/form/form-advanced.js')}}"></script>


<!-- ############Este es para todas las que no sean estadisticas################ -->
<script src="{{asset('assets/js/page/index.js')}}"></script>
<!-- ############Este es para el de estadisticas################ -->
<script src="{{asset('assets/js/page/index3.js')}}"></script>
<script>
function setStyleSheet(url){
    var stylesheet = document.getElementById("stylesheet");
    stylesheet.setAttribute('href', url);
}
</script>