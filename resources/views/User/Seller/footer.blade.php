
        <footer class="footer">
            <div class="w-100 clearfix">
                <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 Salesman BD. All Rights Reserved.</span>
                <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Developed <i class="fa fa-heart text-danger"></i> by <a href="#" class="text-dark" target="_blank">SBIT</a></span>
            </div>
        </footer>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{asset('/public/agentdashboard')}}/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="{{asset('/public/agentdashboard')}}/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/screenfull/dist/screenfull.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/jvectormap/jquery-jvectormap.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/moment/moment.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/d3/dist/d3.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/plugins/c3/c3.min.js"></script>
<script src="{{asset('/public/agentdashboard')}}/js/tables.js"></script>
<script src="{{asset('/public/agentdashboard')}}/js/widgets.js"></script>
<script src="{{asset('/public/agentdashboard')}}/js/charts.js"></script>
<script src="{{asset('/public/agentdashboard')}}/dist/js/theme.min.js"></script>
 <script src="{{asset('public/Frontend')}}/js/select2.min.js"></script>
 <script src="{{asset('public/Frontend')}}/js/select2.js"></script>
 
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js
"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js
"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable( {
         responsive: true,
 
    "lengthMenu": [[10, 5, 15, 25, 50, -1], [10,5,15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print','pageLength'
        ]
    } );
} );
  </script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
          @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
            case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
        }
        @endif
    </script>
    
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60277c59918aa261273e8085/1eud3rfpk';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
