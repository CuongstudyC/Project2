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
    <title>MENU</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <style>
        /* ---------------------------------------------------------------------------------------------------nav bar */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            width: 100%;
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 50;
        }

        nav {
            display: flex;
            width: 85%;
            margin: auto;
            padding-bottom: 25px;
        }

        .box1_5 {
            width: 50%;
            display: flex;
            justify-content: space-around;
            margin-right: 17%;
        }

        .box2_5 {
            width: 33%;
            display: flex;
            justify-content: space-around;
        }

        .img_align {
            vertical-align: top;
            height: 25px;
            margin-top: -4px;
        }

        .box1_5>a {
            text-decoration: none;
            vertical-align: top;
            font-family: sans-serif;
            padding-top: 15px;
            margin-top: 0px;
            font-size: 15px;
            color: black;
            font-weight: bold;

        }

        .box1_5>a:hover {
            text-decoration: underline;
        }

        .box2_5>button:hover {
            background-color: #d40d31;
        }

        .btn-class {
            padding: 12px 42px;
            border-radius: 25px;
            border: 0px;
            background-color: #E4002B;
            color: white;
            font-size: 15px;
            font-family: sans-serif;
            font-weight: bold;
            cursor: pointer;
        }

        .fas_size {
            margin: 5px 0px;
            width: 55px;
            cursor: pointer;
        }

        .icon-border {
            border-right: 1px solid silver;
            height: 30px;

        }

        .nav-bottom {
            display: flex;
            background-color: #202124;
            color: white;
            justify-content: center;
            height: 44px;
            cursor: pointer;
        }

        .nav-bottom:hover {
            background-color: #303133;
        }

        .nav-bottom>.para {
            margin-top: 12px;
            font-family: sans-serif;
            font-size: 14px;
        }

        .nav-bottom>.location {
            width: 20px;
            margin-top: 9px;
            color: #E4002B;
        }

        .nav-top {
            width: 85%;
            height: 28px;
            margin: auto;
            margin-top: -6px;
        }

        .nav-top>img {
            margin-left: 1.65%;
        }

        #mobile_nav {
            display: none;
        }

        .nav-bottom>a {
            display: none;
        }

        /* ----------------------------------------media query------------------------------------------------------ */
        @media only screen and (min-width:0px) and (max-width:1024px) {
            nav {
                display: none;
            }

            .nav-top {
                display: none;
            }

            #mobile_nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 44px;
            }

            #mobile_nav>a {
                color: black;
                margin-left: 5%;
                margin-right: 5%;
            }

            .nav-bottom {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .nav-bottom>.para {
                margin-top: 1px;
            }

            .nav-bottom>.location {
                margin-left: 5%;
                margin-top: 0px;

            }

            .nav-bottom>a {
                display: block;
                margin-right: 5%;
                color: white;
            }

        }



        /* -------------------------------------------------------------------------------------------------------main content */


        #main {
            display: flex;
            width: 75%;
            margin: auto;
            z-index: 1;
            position: relative;
            min-height: 100vh;
        }

        #conta6 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            /* border: 1px solid red; */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        .product {
            width: 100%;
            height: 75%;
            /* border: 1px solid red; */
        }

        .product img {
            width: 100%;
            height: 75%;
        }

        img {
            background-color: rgb(248, 247, 245)
        }

        h1 {
            font-size: 45px;
            font-weight: bolder;
            /* margin-left: 600px; */
            margin-bottom: 30px;
            margin-top: 20px;
            top: 0;

        }

        h4 {
            font-size: 20px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #flex4 {
            display: flex;
            width: 90%;
            justify-content: space-between;
        }

        button {
            border-radius: 20px;
            color: white;
            border: none;
            background-color: rgb(228, 0, 43);
            margin-bottom: 20px;
        }

        button:hover {
            background-color: rgb(204, 6, 42)
        }

        img:hover {
            transform: scale(1.05);
        }

        #left {
            top: 0;
            width: 20%;
            position: sticky;
            margin-right: 10px;
            height: 100vh;
            /* Chiều cao cố định cho thanh sidebar */
            overflow-y: auto;
            /* Hiển thị thanh cuộn khi cần thiết */
            /* background-color: white; */
            cursor: pointer;

        }

        /* ---------------------------------------------------------------------------main screen media query */
        @media only screen and (min-width:451px) and (max-width:1024px) {
            #left {
                display: none;
            }

            #right h1 {
                display: none;
            }

            #c6,
            #co6,
            #con6,
            #cont6,
            #conta6,
            #contai6,
            #contain6,
            #containe6,
            #container6,
            #container6c,
            #container6co,
            #container6con {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media only screen and (min-width:0px) and (max-width:450px) {
            #left {
                display: none;
            }

            #right h1 {
                display: none;
            }

            #c6,
            #co6,
            #con6,
            #cont6,
            #conta6,
            #contai6,
            #contain6,
            #containe6,
            #container6,
            #container6c,
            #container6co,
            #container6con {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        /* ---------------------------------------------------------------------------------------------------- */

        #right {
            width: 100%;
            margin-top: 60px;
            margin: 0 0 0 5%;
        }

        /*
        #right h1{
           display: none;
           margin-top: 50px;
        } */

        p {
            font-size: 20px;

        }

        p:hover {
            text-decoration: underline;
            font-weight: bold;
        }

        #nav-top {
            height: 10%;
            width: 100%;

        }

        /* --------------------------------------------------------------bottom panel */
        footer {
            width: 100%;
            position: absolute;
        }

        #container44 {
            background-color: rgb(32, 33, 36);
            padding: 50px 250px;
            text-align: justify;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 150px;
        }

        #container44 p {
            width: 70%;
            font-size: 12px;
            color: white;
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

        .cards44 {
            width: 18%;
            /* background-color: yellow; */
        }

        ul p {
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

        .threelines {
            margin-left: 12%;
        }

        #noofcartitem {
            margin-left: -18%;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px;
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

        /* ----------------------------------- */

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <!-- -----------------------------------------------------------------------------------nav bar -->
    <header>
        <div id="mobile_nav">
            <a href=""><i class="fas fa-bars fa-1x"></i></a>
            <a href="{{ route('index_front') }}"><img src="{{ asset('images\kfc.jpeg') }}" alt="kfc"></a>
            <a href="{{ route('cart_front') }}"><i class="fas fa-shopping-bag fa-1x "></i></a>
        </div>
        <div class="nav-top">
            <img src="{{ asset('images\KFC navlines.jpg') }}" alt="lines" style="height: 80%; width: 4%;">
        </div>
        <nav>
            <div class="box1_5">
                <a href="{{ route('index_front') }}"><img class="img_align" src="{{ asset('images\Nav KFC.jpg') }}"
                        alt="chicken"></a>
                <a href="{{ route('product_front') }}">Menu</a>
                <!-- <a href="career.html">Careers</a> -->
                <a href="{{ route('about_front') }}">About</a>
                <a href="{{ route('location_front') }}">Find a KFC®</a>

                {{-- Trang lịch sử đơn hàng --}}
                <a href="{{ route('User_Front_Orders') }}">Orders History</a>
            </div>
            <div class="box2_5">
                <a href="{{ route('product_front') }}" id="btn_property"><button id="btn-class" class="btn-class">Start
                        Order</button></a>
                {{-- <button class="btn-class">Start Order</button> --}}
                <a href="{{ route('login') }}" id="account_id login" style="color:black;text-decoration:none;">
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
                <a href="{{ route('cart_front') }}" id="cart_id cart" style="color:black;"><i
                        class="fas fa-shopping-bag fa-2x "></i> <span id="cart">{{ Cart::count() }}</span></a>
                <h6 id="noofcartitem"></h6>
            </div>
        </nav>
        <div class="nav-bottom">
            <div class="location"><i class="fas fa-map-marker-alt"></i></div>
            <div class="para">Start an Order for Pickup or Delivery</div>
            <a href=""><i class="fas fa-caret-down"></i></a>
        </div>
    </header>
    </div>
    <img class="threelines" src="{{ asset('images\KFC navlines.jpg') }}">

    <!-- ----------------------------------------------------------------------------Main Content -->

    <div id="main">
        <div class="left" id=left>
            <br>
            {{-- <h1>KFC® MENU</h1>
            <p onclick="scrollToHeading('featured')">Featured</p>
            <p onclick="scrollToHeading('beyondFriedChicken')">Beyond Fried Chicken</p>
            <p onclick="scrollToHeading('buckets')">Buckets</p>
            <p onclick="scrollToHeading('tenders')">Tenders</p>
            <p onclick="scrollToHeading('sandwiches')">Sandwiches</p>
            <p onclick="scrollToHeading('friedChicken')">Fried Chicken</p> --}}
            <h1><a href="{{ route('products_showAll') }}" style="text-decoration:none;color:black;">Show All</a></h1>
            <br>
            @foreach ($goods as $good)
                <h2><img src='{{ asset("images/$good->image") }}' alt=""
                        style="float: left;width:30px;height:20px;">&nbsp;
                    {{ $good->goods_from }}</h2>
                <ul style="list-style-type: circle;">
                    @foreach ($categories as $cat)
                        @if ($good->id == $cat->goods_id)
                            <li style="font-size:17px;"><a href='{{ url("users/edit/$cat->id") }}'
                                    style="text-decoration: none;">{{ $cat->name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        </div>

        <div id=right>
            <div id="conta6">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <form action="{{ route('products_count') }}" method="post">
                            @csrf
                            <div class="product">
                                <div class="product-image">
                                    @if (!empty($product->image))
                                        <a href='{{ url("users/product_detail/$product->id") }}'><img
                                                src='{{ asset("images/$product->image") }}' alt=""
                                                style="height: 200px;cursor: pointer;"></a>
                                    @else
                                        <a href='{{ url("users/product_detail/$product->id") }}'><img
                                                src="{{ asset('images/product_noImage.png') }}" alt=""
                                                style="height: 200px;cursor: pointer;"></a>
                                    @endif
                                </div>
                                <div class="product-info">
                                    <div>
                                        <h4>{{ $product->name }}</h4>
                                    </div>
                                    <div>
                                        <h4>
                                            @if ($product->price > $product->subPrice)
                                                <div style="display:flex;">
                                                    <div style=" text-decoration: line-through;color:gray;">
                                                        {{ formatNumber($product->price)  }}₫
                                                    </div>
                                                    <div style="padding-left:30%;">
                                                        {{ formatNumber($product->subPrice) }}₫
                                                    </div>
                                                </div>
                                            @else
                                                {{ formatNumber($product->subPrice) }}₫
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="cartCount" value="{{ $cartCount }}">
                                <div class="product-btn">
                                    <button type="submit" class="add-to-cart"
                                        style="height: 30px;cursor: pointer;">Add
                                        to Cart</button>
                                </div>
                                <p class="Product_{{ $product->id }}"></p>
                            </div>
                        </form>
                    @endforeach
                @else
                    <div></div>
                    <div style="text-align:center;font-size:20px;background-color:#f5f5f5;width:max-content;">Không có
                        sản phẩm nào để hiển thị</div>
                @endif
            </div>
        </div>
    </div>

    <div>
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    </div>
    <!-- ------------------------------------------------------------------------Bottom Panel----------------------------------------------- -->
    <footer>
        <div id="container44">
            <p>Calorie Statement</p>
            <p>2,000 calories a day is used for general nutrition advice, but calorie needs vary. Additional nutrition
                information available upon request in-store and on kfc.com. Prices, participation, and product
                availability
                may vary.</p>
            <br>
            <p>Pepsi, Pepsi Globe, Mtn Dew, Mtn Dew Sweet Lightning, Sierra Mist are registered trademarks of PepsiCo,
                Inc.
                Dr Pepper is a registered trademark of Dr Pepper/Seven Up, Inc.</p>
            <br>
            <div id="boxes44">
                <div class="cards44">
                    <img src="{{ asset('images\Screenshot (74).jpg') }}">
                </div>
                <div class="cards4">
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
                    <p>Copyright © KFC Corporation 2023 All Rights Reserved</p>
                </div>
                <div style="display: flex;">
                    <i class="fab fa-instagram" style="margin-right: 3px;"></i>
                    <i class="fab fa-facebook" style="margin-right: 3px;"></i>
                    <i class="fab fa-twitter"></i>
                </div>
            </div>
            <div style="border-left:gray;">
                <p> Asessibility Statement</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js_front/script.js') }}"></script>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        const cartCount = document.querySelectorAll('form');
        const displayCount = document.querySelector('#cart');
        cartCount.forEach(e => {
            e.addEventListener('submit', function(ele) {
                ele.preventDefault();
                var ajax = new XMLHttpRequest();
                ajax.open('post', 'submitCountCart', true);
                ajax.onload = () => {
                    if (ajax.status == 200 && ajax.readyState === 4) {
                        displayCount.innerHTML = JSON.parse(ajax.responseText).cartCount;

                        var successCart = document.querySelector('.product ' + '.Product_' + JSON.parse(
                            ajax.responseText).id)
                        successCart.innerHTML = "Đơn hàng đã vào giỏ hàng";

                        setTimeout(() => {
                            if (successCart.innerHTML != "") {
                                successCart.innerHTML = "";
                            }
                        }, 2000);
                    }
                }

                var data_form = new FormData(e);
                ajax.send(data_form);
            })
        })
    </script>
</body>

</html>
