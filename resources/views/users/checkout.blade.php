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
    <title>CHECKOUT</title>
    <link rel="stylesheet" href="{{ asset('css_front/bottompanel.css') }}">
    <script src="https://kit.fontawesome.com/2af41ecea6.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif
        }

        h1,
        .threelines {
            margin-left: 200px
        }

        #navbar4 {
            display: flex;
            justify-content: space-around;
            padding: 10px;

        }

        #locbar4 {
            background-color: rgb(32, 33, 36);
            height: 20px;
            text-align: center;
            padding: 10px;
            color: white;
        }

        #login {
            background-color: white;
            border: none;
        }

        #navbar4>button:nth-child(1) {
            border-radius: 20px;
            color: black;
            border: 2px solid black;
            background-color: white;
            height: 30px;
            width: 120px;
            margin-top: 10px;
            padding: 5px;
        }

        #container1 {
            /* height: 800px; */
            width: 60%;
            margin: auto;
            /* background-color: black; */
            display: flex;
        }

        #up1_1 {
            width: 100%;
            height: 70px;
            background-color: rgb(255, 255, 255);
        }

        #up1_1>div {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        #up1_2 {
            width: 100%;
            height: 20px;
            background-color: rgb(26, 25, 24);
        }

        .box1_1 {
            /* height: 100%; */
            /* width: 60%; */
            /* background-color: chartreuse; */
            /* display: grid;
            grid-template-columns: 100%;
            grid-template-rows: 50% 60%; */
            margin-left: -25%;
            display: block;
            width: 200%;
        }

        .box1_1>div {
            background-color: rgb(253, 246, 246);
            margin-bottom: 10px;
            display: flex;
        }

        .box1_2 {
            height: 45%;
            width: 120%;
            background-color: white;
            margin: auto 20px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 30px 0 0 30px;
        }

        .box1_1>div>div:nth-child(1) {
            width: 30%;
            height: 30%;
            /* border: 2px solid white; */
            margin: 10px 5px;
            text-align: center;
            padding-top: 35px;
            font-weight: bold;

        }

        .box1_1>div>div:nth-child(2) {
            width: 51%;
            height: 85%;
            /* border: 2px solid white; */
            background-color: white;
            margin: 10px 5px;
            padding-top: 35px;
            padding-left: 28px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .box1_1>div>a {
            margin: 10px 5px;
            padding-top: 35px;
            color: black;
        }


        #payment>div:nth-child(1) {
            height: 10%;
            width: 100%;
            margin-bottom: 10px;
            background-color: white;
            display: flex;
            /* justify-content: space-around; */
            border-radius: 10px;


        }

        #payment>div>img {
            height: 50%;
            margin: 10px 30px;

        }

        #payment>div>input {

            margin-top: 10px;

        }

        #payment>div>p {
            width: 30%;
            margin-top: 10px;

        }

        #payment>div:nth-child(2) {

            height: 80%;
            width: 91%;

            background-color: white;
            /* padding-left: 28px; */
        }

        form>input {
            /* width: 90%;
            height: 40px;
            margin-top: 5%; */
            border: none;
            outline: none;
            margin-top: 5%;
            line-height: 40px;
        }

        form>hr {
            width: 90%;
        }

        div>hr {
            width: 80%;
            margin-bottom: 10px;
        }

        p {
            color: rgb(110, 109, 109);
            font-size: 13px;

        }

        table {
            width: 100%;
            height: 300px;
            /* box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; */
            padding: 10px;
        }

        thead {
            font-weight: bold;
        }

        #paymentinfo>input {
            margin-bottom: 15px;
        }

        #Paymentdiv {
            /* background-color: blue; */
            height: 550px;

        }


        .show_product {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: center;
        }

        .show_product div {
            /* margin: 0 25% 0 0; */
            font-weight: normal;
        }

        .show_product .product_center {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            text-align: center;
        }

        @media (max-width:1200px) {
            .show_product {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .show_product div img,
            .show_product .product_center {
                /* margin: 0 25% 0 0; */
                max-width: 100%;
                margin-left: -23%;
            }

            .show_product div b {
                display: none;
            }
        }

        @media (min-width:1201px) and (max-width:1500px) {
            #payment {
                width: 180%;
            }
        }

        .success,
        .error {
            padding: 1%;
            color: #FFFFFF;
            width: 80%;
            margin: 0 auto;
            border-radius: 3%;
        }

        .success {
            background-color: #00FF00;
        }

        .error {
            background-color: #dc3545;
        }
    </style>
</head>

<body>

    <div id="navbar4">
        {{-- trang product --}}
        <button id="gobackmenu" onclick=""> <a href="{{ route('product_front') }}"
                style="text-decoration: none;color:black;">Back To Menu</a></button>
        <a href="{{ route('index_front') }}"><img src="{{ asset('images\Nav KFC.jpg') }}" alt="KFC"></a>
        <a href="{{ route('login') }}" id="account_id login" style="color:black;text-decoration:none;">
            @php
            if(Auth::check()){
                $user = Auth::user();
            }
        @endphp
        @if(empty($user))
        <i class="far fa-user-circle fa-2x"></i>
        @else
        <div style="display:flex;justify-content: space-between;">
            @if(empty($user->image))
            <img src='{{ asset("images/product_noImage.png") }}' alt="" width="50px;" height="50px;">
            @else
            <img src='{{ asset("images/$user->image") }}' alt="" width="50px;" height="50px;">
            @endif
            <div style="margin-top:10px;padding-left:8%;word-wrap: break-word;width:80px;">
                {{ $user->name }}
            </div>
        </div>
        @endif
        </a>
    </div>
    <div id="locbar4"><span style="color: red;"><i class="fas fa-map-marker-alt"></i></span> Start an order for Pickup
        Delivery</div>
    </div>
    <img class="threelines" src="{{ asset('images\KFC navlines.jpg') }}">
    <h1 style="margin-bottom: 20px;">CHECKOUT</h1>

    {{-- nếu thêm thành công --}}
    @if (session('status'))
        <div class="success">
            {{ session('status') }}
        </div>
        <?php if (session('status')) {
            session()->forget('status');
        } ?>
    @elseif(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif


    <div id="container1">
        <div class="box1_1">
            {{-- <div id="Paymentdiv">
                <div>Payment</div>
                <div id="payment">
                    <div>
                        <input type="radio">
                        <img src="{{ asset('images\favpng_google-pay-send-mobile-payment.png') }}" alt="">
                        <p>Google pay</p>

                    </div>
                    <div>
                        <div style="display: flex;">
                        </div>
                        <form id="paymentinfo">
                            <input type="text" placeholder="Nickname(Optional)">
                            <hr>
                            <input id="nameoncard" type="text" placeholder="Name on Card">
                            <hr>
                            <input id="card" type="number" placeholder="Card Number">
                            <hr>
                            <div style="display: flex;">
                                <input id="exp" type="text" style="width: 45%;height:50px ; border: none; "
                                    placeholder="Exp Date">
                                <input id="cvv" type="number"
                                    style="width: 40%;height:50px ; margin-left: 8.5%; border: none" placeholder="CVV">
                            </div>
                            <hr>
                            <input type="number" placeholder="Billing Zip Code">
                            <hr>
                            <!-- <br> -->
                            <input class="paybutton" type="submit" value="submit"
                                style="border-radius: 20px ;border: 2px solid white; width:40%;line-height:20px; height:30px; cursor: pointer;
                                color:gray;">
                        </form>
                    </div>
                </div>
            </div> --}}
            <div>
                <div>Cart detail</div>
                <div id="payment">
                    <div id="paymentinfo">
                        <div class="show_product">
                            <div>
                                <b>Image</b>
                            </div>
                            <div>
                                <b>Name</b>
                            </div>
                            <div>
                                <b>Quantity</b>
                            </div>
                            <div>
                                <b>Price</b>
                            </div>
                            @foreach ($carts as $cart)
                                <div>
                                    @if (!empty($cart->options['image']))
                                        <img src='{{ asset('images/' . $cart->options['image']) }}' alt=""
                                            style="heigth:100%;max-width:100%;">
                                    @else
                                        <img src="{{ asset('images/product_noImage.png') }}" alt=""
                                            style="heigth:100%;max-width:100%;">
                                    @endif
                                </div>
                                <div class="product_center">
                                    {{ $cart->name }}
                                </div>
                                <div class="product_center">
                                    {{ $cart->qty }}
                                </div>
                                <div class="product_center">
                                    {{ formatNumber($cart->price * $cart->qty) }}₫
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>


            {{-- --------------------------------------------------------------------- --}}
            <div>
                <div>Contact Info</div>
                <div style="height:400px;">
                    <form id="userinfo" action="{{ route('submitCheckOut') }}" method="post">
                        @csrf
                        <input type="text" placeholder="Name" required name="name"
                            value="@if (!empty($user->name)) {{ $user->name }} @endif"
                            @if (!empty($user->name)) readonly @endif>
                        <hr>
                        <input type="tel" placeholder="Phone No." required name="phone"
                            value="@if (!empty($user->phone)) {{ $user->phone }} @endif"
                            @if (!empty($user->phone)) readonly @endif pattern="\d{10,12}">
                        <hr>
                        <input type="text" placeholder="Address" required name="address"
                            value="@if (!empty($user->address)) {{ $user->address }} @endif">
                        <hr>

                        <input type="radio" name="payment" id="COD" required value="COD" required><label
                            for="COD" style="font-size: 11px;color: rgb(118, 118, 118);"> Thanh toán khi nhận
                            hàng</label><br>
                        <input type="radio" name="payment" id="VNPay" required value="VNPay" required><label
                            for="VNPay" style="font-size: 11px;color: rgb(118, 118, 118);"> VNPay</label><br><br>

                        <select name="shipping" id="Shipper" style="color:gray;display:none;">
                            <option value="" selected disabled>Vui lòng chọn phương thức giao hàng </option>
                            <option value="Grab">Grab</option>
                            <option value="GrabCar">Grab Car</option>
                        </select>
                        <input class="paybutton" type="submit" value="submit"
                            style="border-radius: 20px ;border: 2px solid white; width:40%;cursor: pointer;line-height:20px; height:30px;
                    color:gray;">
                        <br> <br>
                        <p style="font-size: 11px;">If you pay upon receipt, we will notify you of the shipping price
                            later</p>
                    </form>
                </div>
            </div>
        </div>
        <div class="box1_2">
            <h3>Your bag</h3>
            <br>
            <hr>
            <table>
                <thead>
                    <th>{{ Cart::count() }} Items</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td class="subtotal">{{ formatNumber((int) Cart::subtotal()) }}₫</td>
                    </tr>
                    <tr>
                        <td>Total Tax</td>
                        <td>{{ formatNumber((int) Cart::tax()) }}₫</td>
                    </tr>
                    <tr>
                        <td>Fee Ship</td>
                        <td class="fee">0₫</td>
                    </tr>
                    <tr>
                        <td>Estimated Total</td>
                        <td class="estimated">{{ formatNumber((int) Cart::total()) }}₫</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- <br><br><br><br><br> --}}
    <!-- ------------------------------------------------------------BOTTOM PANEL------------------------------------------------------------ -->

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
</body>
<script src="{{ asset('js_front/checkOut.js') }}"></script>
<script>
    if (document.querySelector('.success') || document.querySelector('.error')) {
        var takesomething = document.querySelector('.success') || document.querySelector('.error');
        setTimeout(() => {
            takesomething.remove();
        }, 3000);
    }
</script>

</html>
