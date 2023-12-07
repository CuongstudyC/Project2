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
            /* width: 75%; */
            /* margin: auto;
            z-index: 1;
            position: relative;
            min-height: 100vh; */
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

        .add-to-cart {
            height: 40px;
            font-size: 18px;
            padding: 0 20%;
            margin-left: -80%;
            margin-top: -5%;
        }

        .add-to-cart span {
            display: block;
            width: max-content;
        }

        #left {
            margin-left: 200px;
            /* width: 20px;
            height: 20px; */
        }

        /* ---------------------------------------------------------------------------main screen media query */
        @media only screen and (min-width:451px) and (max-width:1024px) {
            #left {
                display: none;
            }

            #right h1 {
                display: none;
            }

            /*
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
            } */
        }

        @media only screen and (min-width:0px) and (max-width:450px) {
            #left {
                display: none;
            }

            #right h1 {
                display: none;
            }

            /* #c6,
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
            } */
        }

        /* ---------------------------------------------------------------------------------------------------- */





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



        .tanggiam {
            height: 40px;
            min-width: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2); */
            /* /* border-radius: 12px; */
        }

        .tanggiam span {
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: 200px;
            cursor: pointer;

        }

        .tanggiam span.num {
            font-size: 20px;
            /* border-right: 2px solid rgb(0, 0, 0, 0.2);
            border-left: 2px solid rgb(0, 0, 0, 0.2); */
            pointer-events: none;

        }

        .tanggiam .minus,
        .plus {
            border: solid 2px rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            padding: 10px 0;

        }

        .right {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        .right div {
            padding: 2%;
        }

        .left div img {
            width: 600px;
            height: 500px;
        }

        @media only screen and (min-width:1000px) and (max-width:1300px) {
            .left div img {
                width: 300px;
                height: 500px;
            }
        }

        @media only screen and (min-width:830px) and (max-width:1000px) {
            .left div img {
                width: 300px;
                height: 500px;
                margin-left: -40%
            }

            .right {
                position: relative;
                right: 100px;
            }
        }


        @media only screen and (min-width:700px) and (max-width:830px) {
            .left div img {
                width: 300px;
                height: 500px;
                margin-left: -45%
            }

            .right {
                position: relative;
                right: 250px;
            }
        }

        @media only screen and (min-width:0px) and (max-width:700px) {

            .left,
            .right,
            #main {
                flex-direction: column;
            }

            .left div img {
                width: 300px;
                height: 500px;
            }

            .right {
                position: relative;
                right: 20px;
            }

            .add-to-cart {
                margin-left: -100%;
            }
        }

        .left img:hover {
            transform: scale(1.05);
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
            <img src="{{ asset('images/KFC navlines.jpg') }}" alt="lines" style="height: 80%; width: 4%;">
        </div>
        <nav>
            <div class="box1_5">
                <a href="{{ route('index_front') }}"><img class="img_align" src="{{ asset('images/Nav KFC.jpg') }}"
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
                <a href="{{ route('cart_front') }}" id="cart_id cart" style="color:black;"> <i
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
    <!-- <img class="threelines" src="images\KFC navlines.jpg"> -->

    <!-- ----------------------------------------------------------------------------Main Content -->
    <div id="main">

        <div class="left" style="margin-left: 130px; margin-top: 70px;">
            <div>
                {{-- tí sửa --}}
                @if (!empty($product->image))
                    <img src='{{ asset("images/$product->image") }}' alt="">
                @else
                    <img src="{{ asset('images/product_noImage.png') }}" alt="">
                @endif
            </div>

        </div>

        <div class="right" style="margin-left: 150px; margin-top: 60px;">
            <div>
                <form action="{{ route('submitUpdateDetail') }}" method="post">
                    @csrf
                    <h1 style="margin-left: 30px;"> Món của bạn</h1>
                    <h2 style="margin-left: 30px;">{{ $product->name }}</h2>
                    <h2 style="margin-left: 30px;">Giá: {{ formatNumber($product->subPrice) }}@if ($product->price > $product->subPrice)
                            (giảm giá: {{ $product->relatedEvents->discount }}%)
                        @endif
                    </h2>
                    <h4 style="margin-left: 30px;">Loại: {{ $product->relatedCategory->name }}</h4>
                    <h4 style="margin-left: 30px;">Xuất xứ:
                        {{ $product->relatedCategory->relatedGoods->goods_from }}</h4>
                    <hr width="85%">
                    <h4 style="margin-left: 30px;">Mô tả: <br>
                        @if (!empty($product->decription))
                            {{ $product->decription }}
                        @else
                            Không có sự mô tả nào.
                        @endif
                    </h4>
                    <hr width="85%">
                    <div style="display: flex;">
                        <div class="tanggiam">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                        <div class="product-btn" style="margin-left: 100px;">
                            <input type="hidden" value="1" name="num" value="1" id="getCountNumber">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="add-to-cart"><span>Add to Cart</span></button>
                        </div>
                    </div>
                </form>
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
    {{-- <script src="{{ asset('js_front/script.js') }}"></script> --}}

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


        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num");

        var a = 1;

        plus.addEventListener("click", () => {
            a++;
            document.getElementById('getCountNumber').value = a;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;

        })

        minus.addEventListener("click", () => {
            if (a > 1) {
                a--;
                document.getElementById('getCountNumber').value = a;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;

            }
        })
    </script>

</body>

</html>
