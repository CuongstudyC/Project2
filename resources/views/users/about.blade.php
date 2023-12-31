<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT US</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css_front/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css_front/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css_front/footer.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    <!------------------------------------------------ navbar------------------------- -->
    <header>
        <div id="mobile_nav">
            <a href=""><i class="fas fa-bars fa-1x"></i></a>
            <a href="{{ route('index_front') }}"><img src="{{ asset('images\kfc.jpeg') }}" alt="kfc"></a>
            {{-- trang Cart --}}
            <a href="{{ route('cart_front') }}"><i class="fas fa-shopping-bag fa-1x "></i></a>
        </div>
        <div class="nav-top">
            <img src="{{ asset('images\nav.jpeg') }}" alt="lines">
        </div>
        <nav>
            <div class="box1_5">
                <a href="{{ route('index_front') }}"><img class="img_align" src="{{ asset('images\nav1.jpeg') }}"
                        alt="chicken"></a>
                {{-- trang product --}}
                <a href="{{ route('product_front') }}">Menu</a>
                <!-- <a href="career.html">Careers</a> -->
                <a href="{{ route('about_front') }}">About</a>
                {{-- trang findkfc --}}
                <a href="{{ route('location_front') }}">Find a KFC®</a>

                {{-- Trang lịch sử đơn hàng --}}
                <a href="{{ route('User_Front_Orders') }}">Orders History</a>
            </div>
            <div class="box22_5">
                {{-- trang product --}}
                <a href="{{ route('product_front') }}" id="btn_property"><button id="btn-class">Start Order</button></a>
                <a href="{{ route('login') }}" id="account_id" style="text-decoration: none;">
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
                    @endif
                </a>
                {{-- trang cart --}}
                <a href="{{ route('cart_front') }}" style="color: black;"><i
                        class="fas fa-shopping-bag fa-2x "></i></a>
            </div>
        </nav>
        <div class="nav-bottom">
            <div class="location"><i class="fas fa-map-marker-alt"></i></div>
            <div class="para">Start an Order for Pickup or Delivery</div>
            <a href=""><i class="fas fa-caret-down"></i></a>
        </div>
    </header>
    <main>
        <!----------------------------- Old man-------------------------------------->
        <div class="container-5">
            <div class="boxes1">
                <img src="{{ asset('images\main-box.png') }}" alt="">
            </div>
            <div class="boxes2">
                <div class="texts">
                    <h1>If You Like<br> Fried Chicken, <br>This Is Why</h1>
                </div>
                <div class="oldman">
                    <img src="{{ asset('images/hero-about.jpg') }}" alt="">

                </div>
            </div>
        </div>
        <!----------------------------- about kfc-------------------------------------->
        <div id="aboutkfc-container-5">
            <div class="about-kfc-header">
                <div id="about_kfc">
                    <h4>about kfc</h4>
                </div>
                <div id="hr_width">
                    <hr>
                </div>
                <!-- <div id="hr-width"><hr id="hr_width"></div> -->
            </div>
            <div class="we_make">
                <p>We make fried chicken—heck, we practically<br> invented it. If they ever make a food hall of<br>
                    fame, our chicken is gonna be a first-ballot<br> inductee.</p>
            </div>
        </div>
        <!----------------------------- We make it the hard way-------------------------------------->
        <div id="redchicken-container-5">
            <div id="reddiv_container-5">
                <div class="red_chickenbox">
                    <img src="{{ asset('images\chicken.png') }}" alt="">
                </div>
                <div class="hardway">
                    <div class="hardway_0">
                        <img id="white_chicken_box" src="{{ asset('images\white lines.png') }}" alt="white lines">
                    </div>
                    <div class="hardway_1">
                        <p>our food</p>
                        <h1>We Make it the<br> Hard Way</h1>
                        <h5>See what goes into making our world famous fried chicken.</h5>
                    </div>
                    <div class="hardway_2">
                        <button>Learn more</button>
                    </div>
                </div>
            </div>

        </div>
        <!-------------------------- Mine one --------------------------------->
        <div id="mohit_container">
            <div id="Mohit">
                <div id="oldimg"></div>
                <div id="Texthead">
                    <h3 id="subhead">THE MAN,<br>THE MYTH,<br>THE LEGEND</h3><br>
                    <div id="hrtag">
                        <h5>IN THE BEGINING</h5>
                        <hr>
                    </div>
                    <p id="innertext">It all began with the man, the myth, the legend himself. In<br> 1930, in a humble
                        service station in Corbin, Kentucky, 40-<br>year old Harland Sanders began feeding hungry
                        travellers.<br> Sanders spent the next nine years (now that's dedication)<br> perfecting his
                        secret blend of 11 herbs and spices, as well<br> as the basic cooking technique we still use
                        today. There<br> are now over 24,000 KFC outlets in more than 145 <br>countries and territories
                        around the world.</p>
                </div>
            </div>
        </div>
        <!-- ------------------------------------second task---------------------- -->
        <div id="mohit_container_5">
            <div id="seclast">
                <div id="tecst">
                    <hr id="upperline">
                    <p id="innertext">Times change but values don’t. And just like the<br> Colonel, we know that nothing
                        beats the value of<br> hard work. It’s what goes into every good old<br> fashioned meal we make.
                        It’s also why, after more <br>than 90 years, folks all over the world keep coming<br> back for
                        more.</p>
                </div>
                <div id="buddha2">
                    <img src="{{ asset('images/hero_about.jpeg') }}" alt="">

                </div>
            </div>
        </div>

        <!-- -------------------------------------Big Image------------------------- -->
        <div id="Me2">
            <div id="finalimg">
                <div id="fasaad">
                    <img src="{{ asset('images\nav.png') }}" alt="">
                    <h3 id="finalhead">WHAT MADE US GREAT IS STILL <br> WHAT MAKES US GREAT</h3>
                    <p id="finaltouch">KFC Corporation, based in Louisville, Kentucky, is one of <br> the few brands in
                        America that can boast a rich, decades-<br>long history of success and innovation. We’re at
                        over<br> 24,000 KFC outlets and more than 145 countries and<br> territories around the world.
                        And you know what? There’s <br>still a cook in a kitchen in every last one of them, freshly<br>
                        preparing delicious, complete family meals at affordable<br> prices.</p>
                </div>
            </div>
        </div>


        <!-- -------------------KFC small heading---------------- -->

        <div id="KKK">
            <p>KFC</p>
            <hr>
        </div>
        <div id="finalbox">
            <div id="im1">
                <p>HOW WE MAKE CHICKEN</p>
            </div>
            <div id="im2">
                <p>COMPANY RESPONSIBILITY</p>
            </div>
        </div>
        </div>
        </div>
        <!--------------------------------------unlock more finger---------------------------------->
        <div id="unlock_more_finger">
            <div id="unlock_wraper">
                <div id="unlock_texts">
                    <h1>Unlock More Finger<br> Lickin' Good <br>Benefits</h1>
                    <p>Create an account to get access to exclusive deals and <br>faster checkout.</p>
                    <button id="signinbutton" onclick="gotosignin()">sign me up</button>
                </div>
                <div id="old_man">
                    <img src="{{ asset('images\oldman.png') }}" alt="oldman">
                </div>
            </div>
        </div>
    </main>
    <!-----------------------------------------------footer--------------------------------------->
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
{{-- <script>
    document.querySelector("#signinubtton").addEventListener("click", gotosignin);
    function gotosignin(){
        window.location.href="signinpage.html"
    }
</script> --}}
