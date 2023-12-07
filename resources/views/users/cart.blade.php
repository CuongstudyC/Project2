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
    <title>MY CART</title>
    <script src="https://kit.fontawesome.com/2af41ecea6.js" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif
        }

        #navbar4 {
            display: flex;
            justify-content: space-around;
            padding: 10px;

        }

        #locbar4 {
            background-color: rgb(32, 33, 36);
            height: 40px;
            text-align: center;
            padding: 10px;
            color: white;
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

        #container44 {
            display: flex;
            width: 80%;
            margin: 20px auto 30px;
            /* border: 1px solid red; */
            gap: 20px;
        }

        h1,
        .threelines {
            margin-left: 200px
        }

        #leftdiv {
            width: 65%;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: rgb(248, 247, 245)
        }

        table {
            width: 100%;
            height: 300px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 10px;
        }

        #box44 {
            display: flex;
            justify-content: space-around;
            gap: 30px;
        }

        thead {
            text-align: center;
            font-weight: bold;
        }

        .functionbutton,
        #checkoutbutton {
            border-radius: 20px;
            color: white;
            border: none;
            background-color: rgb(228, 0, 43);
            height: 30px;
            width: 120px;
            margin-top: 10px;
            padding: 5px;
        }

        #rightdiv4 {
            width: 35%;
        }

        #login {
            background-color: white;
            border: none
        }

        #container4 {
            background-color: rgb(32, 33, 36);
            padding: 50px 250px;
            text-align: justify;
            color: white;
            font-family: Arial, Helvetica, sans-serif
        }

        #container4>p {
            width: 70%;
            font-size: 12px;
        }

        #boxes4 {
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

        #lastbox4 {
            display: flex;
            /* border: 1px solid green; */
            height: 50px;
            margin-top: 60px;
        }

        .section4 {
            display: flex;
            /* border: 1px solid red; */
            width: 75%;
            margin-right: 80px;
        }

        .section4>div:hover {
            text-decoration: underline;
        }

        .section4>div {
            width: 19%;
            margin-right: 5px;
            border-right: 1px solid gray;
        }

        .section4>:nth-child(5) {
            border-right: none;
        }

        @media only screen and (min-width:0px) and (max-width:1024px) {
            #boxes4 {
                flex-direction: column;
            }

            .cards4 {
                width: 100%;
                height: 18px;
                overflow: hidden;
                text-align: center;
            }

            .cards4:nth-child(1) {
                height: 150px;
                margin-left: -60px;

            }

            i {
                margin-right: 2px
            }

            #container44 {
                flex-direction: column;
            }
        }


        .product_detail {
            display: flex;
            justify-content: space-between;
            /* margin-bottom: -50px; */
        }

        h3 {
            width: 120px;
        }

        @media only screen and (max-width:800px) {
            .product_detail {
                flex-direction: column;
                margin: 0;
                text-align: center;
            }

            .product_detail div img {
                width: 30%;
                height: 20%;
            }

            h3 {
                width: 100%;
            }
        }

        @media only screen and (max-width:1100px) {
            .product_detail {
                margin: 0
            }

            #leftdiv {
                width: 100%;
            }

            .product_detail div img {
                width: 60%;
                height: 60%;
            }

            h3 {
                width: 100%;
            }
        }
        .sucess{
            padding:1%;
            background-color:#00FF00;
            color: #FFFFFF;
            width:80%;
            margin:0 auto;
            display:none;
            border-radius: 3%;
        }
    </style>
</head>

<body>
    <div id="navbar4">
        {{-- trang product --}}
        <button id="gobackmenu" onclick=""> <a href="{{ route('product_front') }}"
                style="text-decoration: none;color:black;">Back to Menu</a></button>
        <a href="{{ route('index_front') }}"><img src="{{ asset('images\Nav KFC.jpg') }}"></a>
        <a href="{{ route('login') }}" id="account_id login" style="color:black;text-decoration:none;">
            @php
            if(Auth::check()){
                $user = Auth::user();
            }
        @endphp
        @if(empty($user))
        <i class="fas fa-user-circle fa-2x icon-border fas_size"></i>
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
        @endif</a>
    </div>
    <div id="locbar4"><span style="color: red;"><i class="fas fa-map-marker-alt"></i></span> Start an order for Pickup
        Delivery</div>
    <img class="threelines" src="{{ asset('images\KFC navlines.jpg') }}">


    <div class="success">
    </div>


    <h1>MY BAG</h1>
    <div id="container44">
        <div id="leftdiv">
            {{-- ti viet vo day --}}
            @if (!empty($carts))
                @foreach ($carts as $cart)
                    <form action="{{ route('Cart_change') }}" method="post" class="form_{{ $cart->id }}">
                        @csrf
                        <div class="product_detail">
                            <div>
                                @if (!empty($cart->options['image']))
                                    <img src='{{ asset('images/' . $cart->options['image']) }}' alt=""
                                        style="width:80px;heigth:100%;">
                                @else
                                    <img src="{{ asset('images/product_noImage.png') }}" alt=""
                                        style="width:80px;heigth:100%;">
                                @endif
                            </div>
                            <div style="margin-top:3%;">
                                <h3>{{ $cart->name }}</h3>
                            </div>
                            <div style="margin-top:2.6%;">
                                <input type="number" name="qtv" min="1" class="cart_qty" data-number = "{{ $cart->id }}"
                                    style="line-height: 25px;padding:2%;" value="{{ $cart->qty }}">
                            </div>
                            <div style="margin-top:3%;">
                                <h3 class="subtotal price_{{ $cart->id }}">{{ formatNumber($cart->price * $cart->qty) }}₫</h3>
                            </div>
                            <div style="margin-top:1%;">
                                <button type="submit" class="functionbutton" style="cursor: pointer;" onclick="return confirm('Are you sure?')">Remove</button>
                            </div>
                            <input type="hidden" name="id" id="id_{{ $cart->id }}" value="{{ $cart->id }}">
                            <input type="hidden" name="rowId" id="rowID_{{ $cart->id }}" value="{{ $cart->rowId }}">
                            <div>
                                <br>
                                <hr>
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif
        </div>
        <div id="rightdiv4">
                @csrf
            <table>
                <thead>
                    <th data-count = {{ Cart::count() }}>{{ Cart::count() }} ITEMS</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td class="subtotal">{{ formatNumber((int) Cart::subtotal())}}₫</td>
                    </tr>
                    <tr>
                        <td>Estimated Total</td>
                        <td class="estimated">{{ formatNumber((int) Cart::total())}}₫</td>
                    </tr>
                </tbody>
            </table>
            {{-- trang check out: --}}
            <a href="{{ route('checkout_front') }}" style="color:white;text-decoration:none;" onclick="return goPageCheckOut()">
                <button id="checkoutbutton" style="width: 100%;cursor: pointer;">CHECKOUT</button>
        </a>
        </div>
    </div>


    <!-- Addons -->


    <!-- Bottom panel -->
    <div id="container4">
        <p>Calorie Statement</p>
        <p>2,000 calories a day is used for general nutrition advice, but calorie needs vary. Additional nutrition
            information available upon request in-store and on kfc.com. Prices, participation, and product availability
            may vary.</p>
        <br>
        <p>Pepsi, Pepsi Globe, Mtn Dew, Mtn Dew Sweet Lightning, Sierra Mist are registered trademarks of PepsiCo, Inc.
            Dr Pepper is a registered trademark of Dr Pepper/Seven Up, Inc.</p>
        <br>
        <div id="boxes4">
            <div class="cards4">
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
            <div class="cards4">
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
            <div class="cards4">
                <ul>
                    <p>Career</p>
                    <li>Restaurant Careers</li>
                    <li>Corporate Careers</li>
                    <li>Culture</li>
                    <li>Growth</li>
                </ul>
            </div>
            <div class="cards4">
                <ul>
                    <p>Resources</p>
                    <li>FAQs</li>
                    <li>Contact Us</li>
                    <li>KFC App</li>
                </ul>
            </div>
            <div class="cards4">
                <ul>
                    <p>Find a KFC</p>
                    <li>Find a KFC</li>
                </ul>
            </div>
        </div>
        <div id="lastbox4">
            <div class="section4">
                <div>
                    <p>Privacy Policy </p>
                </div>
                <div>
                    <p>Update 10/2023</p>
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
                <i class="fab fa-facebook" style="margin-right: 3px;"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
        <div style="border-left:gray;">
            <p> Asessibility Statement</p>
        </div>
    </div>


</body>
<script>
    var letters = document.querySelectorAll("h3");
    letters.forEach(e => {
        var noiDung = "";
        var count = 10;
        for (var i = 0; i < e.textContent.length; i++) {
            noiDung += e.textContent.charAt(i);
            if (i == count) {
                noiDung += "<br>";
                count += 10;
                count++;
            }
        }
        e.innerHTML = noiDung;
    })
</script>

<script src="{{ asset('js_front/cart.js') }}"></script>

</html>
