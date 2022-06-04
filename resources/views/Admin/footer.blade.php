</div>


    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="{{asset('/public')}}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/popper.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
    <script class="include" type="text/javascript" src="{{asset('/public')}}/assets/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/lobicard/js/lobicard.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/jquery.scrollTo.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
 

    <!--chartjs-->
    <script src="{{asset('/public')}}/assets/vendor/chartjs/Chart.min.js"></script>

    <!--chartjs initialization-->
    <script>

        var ctx = document.getElementById('myChart-light').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: 'rgba(167,104,243,.2)',
                    borderColor: 'rgba(167,104,243,1)',
                    data: [0, 20, 9, 25, 15, 25,18]
                }]


            },

            // Configuration options go here
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                elements: {
                    line: {
                        tension: 0.00001,
                        //tension: 0.4,
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });


        var ctx = document.getElementById('myChart-tow-light').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: 'rgba(54,162,245,.2)',
                    borderColor: 'rgba(54,162,245,1)',
                    //data: [6.06, 82.2, -22.11, 21.53, -21.47, 73.61, -53.75, -60.32]
                    data: [70, 45, 65, 50, 65, 35, 50]
                }]


            },

            // Configuration options go here
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                elements: {
                    line: {
                        //tension: 0.00001,
                        tension: 0.4,
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });

    </script>


    <!--custom chart-->
    <script src="{{asset('/public')}}/assets/vendor/custom-chart/Chart.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/custom-chart/underscore-min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/custom-chart/moment.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/custom-chart/accounting.min.js"></script>
    <!--custom chart init-->
    <script src="{{asset('/public')}}/assets/vendor/custom-chart/custom-chart-init.js"></script>


    <!--easy pie chart-->
    <script src="{{asset('/public')}}/assets/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/jquery-easy-pie-chart/easy-pie-chart-init.js"></script>
 <script class="include" type="text/javascript" src="assets/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <!--vectormap-->
    <script src="{{asset('/public')}}/assets/vendor/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/vector-map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/vmap-init.js"></script>


    <!--[if lt IE 9]>
    <script src="{{asset('/public')}}/assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->

      <script src="{{asset('/public')}}/assets/vendor/data-tables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/public')}}/assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>


    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>





    
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js
"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable( {
         responsive: true,
        "order": [[ 0, "desc" ]],
    "lengthMenu": [[10, 5, 15, 25, 50, -1], [10,5,15, 25, 50, "All"]],
        dom: 'Bfrtip',
         buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                     columns: ':visible'
                }
            },
            'colvis','pageLength'
        ]
    } );
} );
  </script>
    <script src="{{asset('/public')}}/assets/js/scripts.js"></script>

    
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

<script>
    
    $(document).ready(function() {
        $('.productSize').select2();
    });

    $(document).ready(function() {
        $('.productColor').select2();
    });

    $(document).ready(function() {
        $('.flashdeal_products').select2();
    });

    

    $('.exchange_policy').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });

</script>

</body>
</html>