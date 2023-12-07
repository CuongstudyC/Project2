<?php use Carbon\Carbon; ?>
<?php use App\Models\shipping_orders; ?>

@php
function formatNumber($product)
{
    if ($product != 0) {
        $sum_total = (string) $product;
        $charSum = str_split($sum_total);
        $sum_total = '';
        $a = 1;
        $dem = 0;
        for ($i = count($charSum) - 1; $i >= 0; $i--) {
            if ($dem == 3 * $a) {
                $sum_total = $sum_total . '.' . $charSum[$i];
                $a += 1;
            } else {
                $sum_total = $sum_total . $charSum[$i];
            }
            $dem += 1;
        }
        $charSum = str_split($sum_total);
        $sum_total = '';
        for ($i = count($charSum) - 1; $i >= 0; $i--) {
            $sum_total = $sum_total . $charSum[$i];
        }
        return $sum_total;
    }
    return 0;
}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="{{ asset('css_front/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css_front/indexstyle.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Roboto+Condensed:wght@700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<style>
    #container44 {
        background-color: rgb(32, 33, 36);
        padding: 50px 250px;
        text-align: justify;
        color: white;
        font-family: Arial, Helvetica, sans-serif
    }

    p {
        width: 70%;
        font-size: 12px;
    }

    #boxes44 {
        display: flex;
        margin: auto;
        margin-top: 50px;
        /* border: 1px solid red; */
    }

    ul {
        list-style-type: none;
    }

    li {
        font-size: 12px;
        margin-bottom: 7px;
    }

    li:hover {
        text-decoration: underline;
    }

    .cards4 {
        width: 18%;
    }

    ul>p {
        font-size: 14px;
    }

    #lastbox44 {
        display: flex;
        /* border: 1px solid green; */
        height: 50px;
        margin-top: 60px;
    }

    .section44 {
        display: flex;
        /* border: 1px solid red; */
        width: 75%;
        margin-right: 80px;
    }

    .section44>div:hover {
        text-decoration: underline;
    }

    .section44>div {
        width: 19%;
        margin-right: 5px;
        border-right: 1px solid gray;
    }

    .section44>:nth-child(5) {
        border-right: none;
    }

    @media only screen and (min-width:0px) and (max-width:1024px) {
        #boxes44 {
            flex-direction: column;
        }

        .cards44 {
            width: 100%;
            height: 40px;
            overflow: hidden;
            text-align: center;
        }

        .cards44:nth-child(1) {
            height: 150px;
            margin-left: -60px;

        }

        i {
            margin-right: 2px
        }
    }

    td .status_shipping {
        border: solid 1px;
        padding: 2% 7%;
        border-radius: 20px;
    }
</style>

<body>
    <!----------------------------------------------- navbar-------------------------------------------->
    <header>
        <div id="mobile_nav">
            <a href=""><i class="fas fa-bars fa-1x"></i></a>
            {{-- trang index --}}
            <a href=""><img src="{{ asset('images/kfc.jpeg') }}" alt="kfc"></a>
            {{-- trang cart --}}
            <a href="{{ route('cart_front') }}"><i class="fas fa-shopping-bag fa-1x"></i></a>
        </div>
        <div class="nav-top">
            <img src="{{ asset('images/nav.jpeg') }}" alt="lines">
        </div>
        <nav style="display:flex;">
            <div class="box1_5">
                {{-- trang index --}}
                <a href="{{ route('index_front') }}"><img class="img_align" src="{{ asset('images/nav1.jpeg') }}"
                        alt="chicken"></a>
                {{-- trang product --}}
                <a href="{{ route('product_front') }}">Menu</a>
                <!-- <a href="career.html">Careers</a> -->
                <a href="{{ route('about_front') }}">About</a>
                {{-- trang contact --}}
                <a href="{{ route('location_front') }}">Find a KFC®</a>
                {{-- Trang lịch sử đơn hàng --}}
                <a href="{{ route('User_Front_Orders') }}">Orders History</a>

            </div>
            <div class="box2_5">

                <a href="{{ route('product_front') }}" id="btn_property"><button id="btn-class">Start
                        Order</button></a>

                <a href="{{ route('login') }}" id="account_id" style="text-decoration:none;">
                    @php
                        if (Auth::check()) {
                            $user = Auth::user();
                        }
                    @endphp
                    @if (empty($user))
                        <i class="fas fa-user-circle fa-2x icon-border fas_size"></i>
                    @else
                        <div style="display:flex;justify-content: space-between;">
                            @if (empty($user->image))
                                <img src='{{ asset('images/product_noImage.png') }}' alt="" width="50px;"
                                    height="50px;">
                            @else
                                <img src='{{ asset("images/$user->image") }}' alt="" width="50px;"
                                    height="50px;">
                            @endif
                            <div style="margin-top:10px;padding-left:8%;word-wrap: break-word;width:80px;">
                                {{ $user->name }}
                            </div>
                        </div>
                    @endif
                </a>

                <a href="{{ route('cart_front') }}" id="cart_id"> <i class="fas fa-shopping-bag fa-2x "></i></a>
            </div>
        </nav>
        <div class="nav-bottom">
            <div class="location"><i class="fas fa-map-marker-alt"></i></div>
            <div class="para">Start an Order for Pickup or Delivery</div>
            <a href=""><i class="fas fa-caret-down"></i></a>
        </div>
    </header>

    {{-- ----------------------------------------------------------------------Section-------------------------------------- --}}
    <section style="margin:5% 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card" style="border:solid 1px;">
                        <div class="card-header" style="background-color: black;color:white;">
                            <span>History Orders</span>
                        </div>

                        <div class="card-body">
                            <table class="table table-hover">
                                @if (!empty($orders))
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Total</th>
                                        <th>Created_at</th>
                                        <th>Status</th>
                                        <th>More detail</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ formatNumber($order->total) }}</td>
                                                <td>{{ Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                                                <td>@php
                                                    $status_order = shipping_orders::where('order_id', $order->id)->first();
                                                @endphp
                                                    <span class="status_shipping"
                                                        style="@if (!empty($status_order->status)) @if ($status_order->status == 'Chưa giao hàng')
                                                     background-color:#bfc1c3;color:white;
                                                     @elseif($status_order->status == 'Đang giao hàng')
                                                     background-color:#6161f5;color:white;
                                                     @elseif($status_order->status == 'Giao hàng thành công')
                                                     background-color:#25c025;color:white;
                                                     @elseif($status_order->status == 'Giao hàng thất bại')
                                                     background-color:#f31616;color:white; @endif
                                                     @endif">
                                                        @if (!empty($status_order->status))
                                                            {{ $status_order->status }}
                                                        @else
                                                            Đang cập nhật
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal_{{ $order->id }}">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Detail orders
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <div class="scrollable-content">
                                                                        <!-- Nội dung -->
                                                                        <div class="row">
                                                                            @foreach ($orders_detail as $detail)
                                                                                @if ($detail->order_id == $order->id)
                                                                                    <div class="col-md-6">
                                                                                        <strong>Name Product:</strong>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        {{ $detail->product_name }}
                                                                                    </div>


                                                                                    <div class="col-md-6">
                                                                                        Quantity:
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        {{ $detail->product_qty }}
                                                                                    </div>


                                                                                    <div class="col-md-6">
                                                                                        SubPrice:
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        {{ formatNumber($detail->product_price) }}
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        Total Tax (8%):
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        {{ formatNumber((int) $detail->product_qty * (($detail->product_price * 8 * 1.0) / 100)) }}
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <hr>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach

                                                                            <div class="col-md-6">
                                                                                <strong>Fee Ship:</strong>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                @if (!empty($order->relatedShipping_Order->fee))
                                                                                    {{ formatNumber($order->relatedShipping_Order->fee)}}
                                                                                @else
                                                                                    <span>because you pay when you
                                                                                        receive the goods, so we will
                                                                                        update fee soon</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <strong>Total:</strong>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                {{ formatNumber($order->total) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#myModal_{{ $order->id }}">
                                                        <i class="fas fa-folder"></i> Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tr>
                                        <td>You must <a href="{{ route('login') }}">sign in</a> to see your orders.
                                            <br><br> If you don't have any orders, do you want to <a
                                                href="{{ route('product_front') }}">Shopping</a>?</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- -------------------------------------------------------------------Bottom Panel--------------------------------------------------------------------- -->
    <div id="container44">
        <p>Calorie Statement</p>
        <p>2,000 calories a day is used for general nutrition advice, but calorie needs vary. Additional nutrition
            information available upon request in-store and on kfc.com. Prices, participation, and product availability
            may vary.</p>
        <br>
        <p>Pepsi, Pepsi Globe, Mtn Dew, Mtn Dew Sweet Lightning, Sierra Mist are registered trademarks of PepsiCo, Inc.
            Dr Pepper is a registered trademark of Dr Pepper/Seven Up, Inc.</p>
        <br>
        <div id="boxes44">
            <div class="cards44">
                <img src="{{ asset('images\Screenshot (74).jpg') }}">
            </div>
            <div class="cards44">
                <ul>
                    <p>KFC Food</p>
                    <li>Menu</li>
                    <li>Full Nutrition Guide</li>
                    <li>Nutrition Calculator</li>
                    <li>Food Allergies & Sensitivities</li>
                </ul>
            </div>
            <div class="cards44">
                <ul>
                    <p>Company</p>
                    <li>About KFC</li>
                    <li>How We Make Chicken</li>
                    <li>KFC Foundation</li>
                    <li>Company Responsibility</li>
                    <li>Franchise a KFC</li>
                    <li>Resposible Disclosure</li>
                    <li>KFC Newsroom</li>
                </ul>
            </div>
            <div class="cards44">
                <ul>
                    <p>Career</p>
                    <li>Restaurant Careers</li>
                    <li>Corporate Careers</li>
                    <li>Culture</li>
                    <li>Growth</li>
                </ul>
            </div>
            <div class="cards44">
                <ul>
                    <p>Resources</p>
                    <li>FAQs</li>
                    <li>Contact Us</li>
                    <li>KFC App</li>
                </ul>
            </div>
            <div class="cards44">
                <ul>
                    <p>Find a KFC</p>
                    <li>Find a KFC</li>
                </ul>
            </div>
        </div>
        <div id="lastbox44">
            <div class="section44">
                <div>
                    <p>Privacy Policy </p>
                </div>
                <div>
                    <p>Update 12/2021</p>
                </div>
                <div>
                    <p>Terms Of Use</p>
                </div>
                <div>
                    <p>Our Cookies & Ads</p>
                </div>
                <div>
                    <p>Do Not Sell My Personal Information</p>
                </div>
            </div>
            <div>
                <p>Copyright © KFC Corporation 2022 All Rights Reserved</p>
            </div>
            <div style="display: flex;">
                <i class="fab fa-instagram" style="margin-right: 3px;"></i>
                <i class="fab fa-facebook"style="margin-right: 3px;"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
        <div style="border-left:gray;">
            <p> Asessibility Statement</p>
        </div>
    </div>
</body>

</html>
