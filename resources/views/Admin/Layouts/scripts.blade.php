<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
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