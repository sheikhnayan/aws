@extends('User.layouts.master')
@section('body')



<div class="container mt-4">
    <h3 class="card-title font-weight-bold">Invoice No : #{{ $data->invoice_id }}</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline bg-white p-4">

                @if($data->status == 0 || $data->status>0)
                <a href="#" class="timeline">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">Pending</h3>
                        <span class="description">
                           Your Order is Pending

                        </span>
                    </div>
                </a>
                @endif

                @if($data->status == 1 || $data->status>1)
                <a href="#" class="timeline text-right">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">Processing</h3>
                        <span class="description">
                            Your Order is Processing

                        </span>
                    </div>
                </a>
                @endif


                @if($data->status == 5 || $data->status>1)
                <a href="#" class="timeline">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">Shipping</h3>
                        <span class="description">
                             Your Order is Shipping
                        </span>
                    </div>
                </a>
                @endif

                @if($data->status == 2 || $data->status == 3)
                <a href="#" class="timeline text-right">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">On the way</h3>
                        <span class="description">
                           Your Order On the way
                        </span>
                    </div>
                </a>
                @endif

                @if($data->status == 3 || $data->status>5)
                <a href="#" class="timeline">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">Delivered</h3>
                        <span class="description">
                            Your Order Delivered
                        </span>
                    </div>
                </a>
                @endif



                @if($data->status == 6)
                <a href="#" class="timeline text-right">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">Refound</h3>
                        <span class="description">
                            Your Order Refound
                        </span>
                    </div>
                </a>
                @endif


                @if($data->status == 4)
                <a href="#" class="timeline">
                    <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                    <div class="timeline-content">
                        <h3 class="title">Reject</h3>
                        <span class="description">
                            Your Order Rejected
                        </span>
                    </div>
                </a>
                @endif



            </div>
        </div>
    </div>
</div>


@endsection





<style type="text/css">


    .main-timeline {
        position: relative
    }

    .main-timeline:before {
        content: "";
        width: 5px;
        height: 100%;
        border-radius: 20px;
        margin: 0 auto;
        background: #242922;
        position: absolute;
        top: 0;
        left: 0;
        right: 0
    }

    .main-timeline .timeline {
        display: inline-block;
        margin-bottom: 50px;
        position: relative
    }

    .main-timeline .timeline:before {
        content: "";
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 4px solid #fff;
        background: #D81159;
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 1;
        transform: translate(-50%, -50%)
    }

    .main-timeline .timeline-icon {
        display: inline-block;
        width:130px;
        height:130px;
        border-radius: 50%;
        border: 3px solid #D81159;
        padding: 13px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 30%;
        transform: translateY(-50%)
    }

    .main-timeline .timeline-icon i {
        display: block;
        border-radius: 50%;
        background: #D81159;
        font-size: 64px;
        color: #fff;
        line-height: 100px;
        z-index: 1;
        position: relative
    }

    .main-timeline .timeline-icon:after,
    .main-timeline .timeline-icon:before {
        content: "";
        width: 100px;
        height: 4px;
        background: #D81159;
        position: absolute;
        top: 50%;
        right: -100px;
        transform: translateY(-50%)
    }

    .main-timeline .timeline-icon:after {
        width: 70px;
        height: 50px;
        background: #f0f6ff;
        top: 89px;
        right: -30px
    }

    .main-timeline .timeline-content {
        width: 50%;
        padding: 0 50px;
        margin: 52px 0 0;
        float: right;
        position: relative
    }

    .main-timeline .timeline-content:before {
        content: "";
        width: 40%;
        height: 100%;
        border: 3px solid #D81159;
        border-top: none;
        border-right: none;
        position: absolute;
        bottom: -13px;
        left: 35px
    }

    .main-timeline .timeline-content:after {
        content: "";
        width: 37px;
        height: 3px;
        background: #D81159;
        position: absolute;
        top: 13px;
        left: 0
    }

    .main-timeline .title {
        font-size: 20px;
        color: #D81159;
        text-transform: uppercase;
        margin: 0 0 5px
    }

    .main-timeline .description {
        display: inline-block;
        color: #404040;
        width: 100%;
        margin-right: 920px;
    }

    .main-timeline .timeline:nth-child(even) .timeline-icon {
        left: auto;
        right: 30%
    }

    .main-timeline .timeline:nth-child(even) .timeline-icon:before {
        right: auto;
        left: -100px
    }

    .main-timeline .timeline:nth-child(even) .timeline-icon:after {
        right: auto;
        left: -30px
    }

    .main-timeline .timeline:nth-child(even) .timeline-content {
        float: left
    }

    .main-timeline .timeline:nth-child(even) .timeline-content:before {
        left: auto;
        right: 35px;
        transform: rotateY(180deg)
    }

    .main-timeline .timeline:nth-child(even) .timeline-content:after {
        left: auto;
        right: 0
    }

    .main-timeline .timeline:nth-child(2n) .timeline-content:after,
    .main-timeline .timeline:nth-child(2n) .timeline-icon i,
    .main-timeline .timeline:nth-child(2n) .timeline-icon:before,
    .main-timeline .timeline:nth-child(2n):before {
        background: #F68657
    }

    .main-timeline .timeline:nth-child(2n) .timeline-icon {
        border-color: #F68657
    }

    .main-timeline .timeline:nth-child(2n) .title {
        color: #F68657
    }

    .main-timeline .timeline:nth-child(2n) .timeline-content:before {
        border-left-color: #F68657;
        border-bottom-color: #F68657
    }

    .main-timeline .timeline:nth-child(3n) .timeline-content:after,
    .main-timeline .timeline:nth-child(3n) .timeline-icon i,
    .main-timeline .timeline:nth-child(3n) .timeline-icon:before,
    .main-timeline .timeline:nth-child(3n):before {
        background: #8fb800
    }

    .main-timeline .timeline:nth-child(3n) .timeline-icon {
        border-color: #8fb800
    }

    .main-timeline .timeline:nth-child(3n) .title {
        color: #8fb800
    }

    .main-timeline .timeline:nth-child(3n) .timeline-content:before {
        border-left-color: #8fb800;
        border-bottom-color: #8fb800
    }

    .main-timeline .timeline:nth-child(4n) .timeline-content:after,
    .main-timeline .timeline:nth-child(4n) .timeline-icon i,
    .main-timeline .timeline:nth-child(4n) .timeline-icon:before,
    .main-timeline .timeline:nth-child(4n):before {
        background: #2fcea5
    }

    .main-timeline .timeline:nth-child(4n) .timeline-icon {
        border-color: #2fcea5
    }

    .main-timeline .timeline:nth-child(4n) .title {
        color: #2fcea5
    }

    .main-timeline .timeline:nth-child(4n) .timeline-content:before {
        border-left-color: #2fcea5;
        border-bottom-color: #2fcea5
    }

    @media only screen and (max-width:1200px) {
        .main-timeline .timeline-icon:before {
            width: 50px;
            right: -50px
        }
        .main-timeline .timeline:nth-child(even) .timeline-icon:before {
            right: auto;
            left: -50px
        }
        .main-timeline .timeline-content {
            margin-top: 75px
        }
    }

    @media only screen and (max-width:990px) {
        .main-timeline .timeline {
            margin: 0 0 10px
        }
        .main-timeline .timeline-icon {
            left: 25%
        }
        .main-timeline .timeline:nth-child(even) .timeline-icon {
            right: 25%
        }
        .main-timeline .timeline-content {
            margin-top: 115px
        }
    }

    @media only screen and (max-width:767px) {
        .main-timeline {
            padding-top: 50px
        }
        .main-timeline:before {
            left: 80px;
            right: 0;
            margin: 0
        }
        .main-timeline .timeline {
            margin-bottom: 70px
        }
        .main-timeline .timeline:before {
            top: 0;
            left: 83px;
            right: 0;
            margin: 0
        }
        .main-timeline .timeline-icon {
            width: 60px;
            height: 60px;
            line-height: 40px;
            padding: 5px;
            top: 0;
            left: 0
        }
        .main-timeline .timeline:nth-child(even) .timeline-icon {
            left: 0;
            right: auto
        }
        .main-timeline .timeline-icon:before,
        .main-timeline .timeline:nth-child(even) .timeline-icon:before {
            width: 25px;
            left: auto;
            right: -25px
        }
        .main-timeline .timeline-icon:after,
        .main-timeline .timeline:nth-child(even) .timeline-icon:after {
            width: 25px;
            height: 30px;
            top: 44px;
            left: auto;
            right: -5px
        }
        .main-timeline .timeline-icon i {
            font-size: 30px;
            line-height: 45px
        }
        .main-timeline .timeline-content,
        .main-timeline .timeline:nth-child(even) .timeline-content {
            width: 100%;
            margin-top: -15px;
            padding-left: 130px;
            padding-right: 5px
        }
        .main-timeline .timeline:nth-child(even) .timeline-content {
            float: right
        }
        .main-timeline .timeline-content:before,
        .main-timeline .timeline:nth-child(even) .timeline-content:before {
            width: 50%;
            left: 120px
        }
        .main-timeline .timeline:nth-child(even) .timeline-content:before {
            right: auto;
            transform: rotateY(0)
        }
        .main-timeline .timeline-content:after,
        .main-timeline .timeline:nth-child(even) .timeline-content:after {
            left: 85px
        }
    }

    @media only screen and (max-width:479px) {
        .main-timeline .timeline-content,
        .main-timeline .timeline:nth-child(2n) .timeline-content {
            padding-left: 110px
        }
        .main-timeline .timeline-content:before,
        .main-timeline .timeline:nth-child(2n) .timeline-content:before {
            left: 99px
        }
        .main-timeline .timeline-content:after,
        .main-timeline .timeline:nth-child(2n) .timeline-content:after {
            left: 65px
        }
    }


   
</style>
