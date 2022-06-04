<!-- 
<center>
  <div id="myBtns">
    <a href="#" class="text-danger" uk-toggle="target: #offcanvas-none">
        <br>
      <div><strong id="cartamount"></strong> Tk</div>
    </a>
  </div>
</center>
-->

<style>
    #myBtns {
        position: fixed;
        /* Fixed/sticky position */
        bottom: 300px;
        /* Place the button at the bottom of the page */
        right: 0px;
        /* Place the button 30px from the right */
        z-index: 99;
        /* Make sure it does not overlap */
        border: none;
        /* Remove borders */
        outline: none;
        /* Remove outline */
        color: red;
        /* Text color */
        cursor: pointer;
        /* Add a mouse pointer on hover */
        padding: 10px 20px;
        /* Some padding */
        font-size: 20px;
        /* Increase font size */
        font-weight: bold;
        transition: 0.5s;
        background: url("{{ asset('public/fontdev/dummy-cart.webp') }}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 5px 0px 0px 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #myBtns:hover {
        opacity: 1;
        text-decoration: none;
    }

    .footermenu li {
        display: inline-block;
        padding-right: 10px;
        padding-left: 10px;
        border-right: 1px solid gray;
    }

    .footermenu li a {
        color: gray;
        font-size: 14px;
    }

    .footer_bottom {
        font-size: 1.4rem;
        border-top: 2px solid gray;
    }

    .footer_bottom i {
        cursor: pointer;
    }
</style>

<?php
$setting = DB::table('settings')->first();

$items = DB::table('product_item')
    ->orderBy('sl', 'ASC')
    ->get();
$page_categories = DB::table('page_categories')
    ->take(2)
    ->where('status', 1)
    ->get();
?>

<footer>


    <!-- copyright -->
    <!-- <div class="py-4 text-center text-light" style="background: #1e1e1e;">Copyright &copy 2021 Shopritefoodbd.com All Right Reserved <a href="https://branexit.com/" style="color: #F8432B;">Branexit</a></div> -->
    <div class="bg-white d-md-none fixed-bottom text-dark footer_bottom">

        <div class="p-3 d-flex justify-content-around">
            <a href="{{ URL::to('/') }}" style="color: black"><i class="fas fa-home"></i></a>


            @if(Auth('guest')->user())
            <a href="{{ url('/Checkout') }}" class="text-dark">
                <span class="position-relative" type="button">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="top-0 position-absolute start-120 translate-middle badge rounded-pill bg-warning" style="font-size: 12px;">
                        <span class="cartqunt">0</span>
                    </span>
                </span>
            </a>

            <a href="{{ url('/userdashboard') }}" style="color: black"><i class="fas fa-id-card-alt"></i></a>
            @else
            <a href="{{ url('/user-login') }}" class="text-dark">
                <span class="position-relative" type="button">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="top-0 position-absolute start-120 translate-middle badge rounded-pill bg-warning" style="font-size: 12px;">
                        <span class="cartqunt">0</span>
                    </span>
                </span>
            </a>

            <a href="{{ url('/user-login') }}" style="color: black"><i class="fas fa-user"></i></a>
            @endif


        </div>
    </div>

    <div class="footer-bottom py-4">
        <div class="container">
            <div class="row g-1">
                <div class="col-lg-3">
                    <p class="text-bold"></p>
                    <img src="{{asset('/public/siteImage')}}/{{$setting->logo}}" alt="" style="max-width: 200px;">

                    


                    <p>&copy; {{$setting->address}} </p>
                </div>

                <div class="col-lg-9">
                    <div class="row row-cols-2 row-cols-md-4">
                        <div class="col">
                            <ul class="footer-list">
                                <li class="footer-list__item">
                                    <p class="footer-list__heading">SHOP BY CATEGORIES</p>
                                </li>
                                @foreach($items as $i)

                                <?php $item_name = str_replace(
                                    ' ',
                                    '-',
                                    $i->item_name
                                ); ?>

                                <li class="footer-list__item">
                                    <a href="{{url('item')}}/{{$item_name}}/{{$i->id}}" class="footer-list__link">{{ $i->item_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        @foreach($page_categories as $page_category)
                        <?php $pages = DB::table('pages')
                            ->where('page_category_id', $page_category->id)
                            ->where('status', 1)
                            ->get(); ?>

                        <div class="col">
                            <ul class="footer-list">
                                <li class="footer-list__item">
                                    <p class="footer-list__heading">{{$page_category->name}}</p>
                                </li>
                                @foreach($pages as $page)
                                <li class="footer-list__item">
                                    <a href="{{route('page_details', $page->slug)}}" class="footer-list__link">{{$page->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                        <div class="col">
                            <ul class="footer-list">
                                <li class="footer-list__item">
                                    <p class="footer-list__heading">Follow Us On</p>
                                </li>

                                @if($setting->facebook)
                                <li class="footer-list__item">
                                    <a href="{{ $setting->facebook }}" class="footer-list__link facebook"><i class="fab fa-facebook"></i> Facebook</a>
                                </li>
                                @endif

                                @if($setting->instragram)
                                <li class="footer-list__item">
                                    <a href="{{ $setting->instragram }}" class="footer-list__link instagram"><i class="fab fa-instagram"></i> Instagram</a>
                                </li>
                                @endif

                                @if($setting->twitter)
                                <li class="footer-list__item">
                                    <a href="{{ $setting->twitter }}" class="footer-list__link twitter"><i class="fab fa-twitter"></i> Twitter</a>
                                </li>
                                @endif

                                @if($setting->youtube)
                                <li class="footer-list__item">
                                    <a href="{{ $setting->youtube }}" class="footer-list__link youtube"><i class="fab fa-youtube"></i> Youtube</a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div style="background-color: #007DB9">
        <div class="container mb-5">
            <img src="{{ asset('public/payment-options.png') }}" alt="" class="">

            <!-- <img src="{{ asset('public/sll-commerce-mobile.png') }}" alt="" class="d-md-none mt-3 mb-5"> -->
        </div>
    </div>


    <div class="container my-3" style="font-size: 14px;line-height: 150%;">
       

        <div class="text-center mt-2">© <?php echo date(
            'Y'
        ); ?> <strong><a href="{{ URL::to('/') }}" class="text-dark">{{$setting->title}}</a></strong> - All Right reserved!</div>
    </div>

</footer>



<div id="offcanvas-none" class="uk-offcanvas" uk-offcanvas="mode: slide; overlay:true; flip: true;">

    <div class="uk-offcanvas-bar cartbackground">

        <div class="card">

            <div class="bg-white card-header">

                <div class="row">
                    <div class="col-md-12 col-12">
                        <span uk-icon="icon:close; ratio:1.2" class="uk-offcanvas-close icone" style="cursor: pointer;background: #b20000;color: white;"></span>
                    </div>

                    <div class="col-md-12 col-12">

                        <span style="font-size: 220%;line-height: 45px;font-weight: 800;display: block;margin: 0;">My Cart</span>
                       
                    </div>
                    
                </div>
            

            </div>




            <div class="p-0 card-body mt-1">

                <div id="cartshow" style="padding: 5px;"></div>


         



                <div class="mt-3 card-footer" style="position: absolute; bottom: 0; width: 100%;">


                    <div class="mt-2 row">
                        <div class="col-md-6 col-6">
                            Total
                        </div>

                        <div class="col-md-6 col-6 text-end">
                            ৳ <strong id="cartprice">0</strong>
                        </div>
                    </div>

                    <br>

                    @if (Auth('guest')->user())
                    <a href="{{ url('/Checkout') }}" class="btn btn-dark d-block"><i class="fa fa-shopping-basket" uk-tooltip="title: Remove; pos:bottom"></i>&nbsp;Checkout Order</a>
                    @else
                    <a href="{{ url('/user-login') }}" class="btn btn-dark d-block"><i class="fa fa-user" uk-tooltip="title: Remove; pos:bottom"></i>&nbsp;Login Account</a>
                    @endif

                    <br><br>


                </div>

            </div>

        </div>

    </div>
</div>
</div>
<!----------End side Cart-------->




<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eff60d26f9c1b7b"></script>

<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/uikit.min.js"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/uikit-icons.min.js"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/jquery.countdown.min.js"></script>
<!-- <script type="text/javascript" src="{{ asset('public/assets/') }}/js/simple-lightbox.jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.10.2/simple-lightbox.jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('public/assets/') }}/js/slick.min.js"></script>



<script src="{{ asset('public/assets/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            loadingHtml: `<center><img class="mt-5" src="{{ asset('public/Frontend/img/loader.gif') }}" style="height:50px;"></center>`,
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('messege'))

    var type = "{{ Session::get('alert-type', 'info') }}"

    switch (type) {

        case 'info':
            toastr.options.positionClass = 'toast-bottom-center';
            toastr.info("{{ Session::get('messege') }}");

            break;

        case 'success':
            toastr.options.positionClass = 'toast-bottom-center';
            toastr.success("{{ Session::get('messege') }}");

            break;

        case 'warning':
            toastr.options.positionClass = 'toast-bottom-center';
            toastr.warning("{{ Session::get('messege') }}");

            break;

        case 'error':
            toastr.options.positionClass = 'toast-bottom-center';
            toastr.error("{{ Session::get('messege') }}");

            break;

    }

    @endif


    $(document).ready(function() {


        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;

            $input.val(count);
            $input.change();

            return false;

        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });


    $('.select_color').on('click', function(e) {

        var $this = $(this);
        var id = $(this).data('id');
        $("#customer_selected_color").val($this.text());

        $("#buy_now_color").val($this.text());

        $(".select_color").removeClass("selected_color");
        $(this).addClass("selected_color");


    });


    $('.select_size').on('click', function(e) {
        var $this = $(this);
        const $container = $(this).parents('.select_size-container');
        var id = $(this).data('id');

        if ($this.hasClass('select-color')) {
            $("#customer_selected_color").val($this.text());
            $("#buy_now_color").val($this.text());
        } else {
            $("#customer_selected_size").val($this.text());
            $("#buy_now_size").val($this.text());
        }

        $container.find(".select_size").removeClass("selected_size");
        $(this).addClass("selected_size");
    })

    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'clear']],


                ['picture', ['picture']],
            ]
        });
    });

    $('.imageGallery1 a').simpleLightbox();
</script>


</body>

</html>