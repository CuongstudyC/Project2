<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFC®</title>
    <link rel="stylesheet" href="{{ asset('css_front/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css_front/indexstyle.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Roboto+Condensed:wght@700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- -----------------------------------------bottom style -->
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
        <nav>
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
                {{-- trang product --}}
                <a href="{{ route('product_front') }}" id="btn_property"><button id="btn-class">Start
                        Order</button></a>
                {{-- trang login --}}
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
                <a href="{{ route('cart_front') }}" id="cart_id"> <i class="fas fa-shopping-bag fa-2x "></i></a>
            </div>
        </nav>
        <div class="nav-bottom">
            <div class="location"><i class="fas fa-map-marker-alt"></i></div>
            <div class="para">Start an Order for Pickup or Delivery</div>
            <a href=""><i class="fas fa-caret-down"></i></a>
        </div>
    </header>
    <!----------------------------------------------- owl caresoul---------------------------------->

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

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" id="car_mar">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('images/10-pc-feast-hero_desktop.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h6 id="limited_time">FOR A LIMITED TIME ONLY</h6>
                    <h5 id="kentucky_">IT'S A KENTUCKY <br>FRIED MIRACLE!</h5>
                    <p id="limited_p">Tastes like fried chicken but made from plants. Not prepared in a vegan/vegetarian
                        manner.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('images/10-pc-feast-hero_desktop.jpg') }}" class="d-block w-100" alt="...">

                <div class="carousel-caption d-none d-md-block">
                    <h6 id="now_av">NOW AVAILABLE</h6>
                    <h5 id="feast">10 PIECE FEAST. ALL DINNER. NO DISHES.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <video width="100%" height="100%" autoplay="" loop>
                    <source src="{{ asset('images/hij.mp4') }}" type="video/mp4">
                </video>
                <div class="carousel-caption d-none d-md-block">
                    <h6 id="old_av">THE NEW KFC APP IS HERE</h6>
                    <h5 id="old_av_">HOME COOKIN' HAS A NEW HOME</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!----------------------------------------------Black Bar--------------------------------------------------->
    <div id="black_bar">
        <p>Available for a limited time at participating locations only, while supplies last. Availability may vary. Not
            prepared in a vegan/vegetarian manner. Beyond Fried Chicken is a trademark of Beyond Meat, Inc.</p>
    </div>
    <!----------------------------------------------------Red bar-------------------------------------->
    <div id="red_bar">
        <div class="left_red_text">
            <h2>Finger Lickin' Good® is Now Just a Few Clicks Away</h2>
        </div>
        <div class="right_white_btn">
            {{-- trang product --}}
            <a href="{{ route('product_front') }}"><button id="white_right_btn">Start Order</button></a>
        </div>
    </div>
    <!-----------------------------------------------------featured item---------------------------------- -->
    <div id="featured_items_text">
        <h1>Featured items</h1>
    </div>
    <div id="container-5">
        <div>
            <div class="imge_m">
                <img id="img_container-5" src="{{ asset('images/image0.avif') }}" />
            </div>
            <div id="mohot_para">
                <p>10 Piece Feast</p>
                <p>calories: 4140-6700</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_m">
                <img id="img_container-5" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="mohot_para">
                <p>KFC chicken Sandwich Combo</p>
                <p>calories: 690-1160</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_m">
                <img id="img_container-5" src="{{ asset('images/image0.avif') }}" />
            </div>
            <div id="mohot_para">
                <p>5 pc. Tenders Combo</p>
                <p>calories: 930-1610</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_m">
                <img id="img_container-5" src="{{ asset('images/image3.avif') }}" />
            </div>
            <div id="mohot_para">
                <p>8 pc. Meal</p>
                <p>calories: 2300-4980</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
    </div>
    </div>
    <!----------------------------------------------------featured images2---------------------------------------- -->
    <div id="container-6">
        <div id="Rust">
            <h4>COME N' GET IT</h4>
            <h1>TRY ONE OF<br>THESE <br>FAVORITE</h1>
        </div>

        <div class="imge">
            <img id="mohit_img" src="{{ asset('images/image1.avif') }}" />
            <h2>SECRET RECIPE <br>FRIES</h2>
            <p>calories: 230-930.</p>
            <p>Set location for pricing</p>
        </div>

        <div class="imge">
            <img id="mohit_img" src="{{ asset('images/image3.avif') }}" />
            <h2>MAC & CHEESE</h2>
            <p>calories: 140-540.</p>
            <p>Set location for pricing</p>
        </div>

        <div class="imge">
            <img id="mohit_img" src="{{ asset('images/image1.avif') }}" />
            <h2>BISCUIT</h2>
            <p>calories: 180.</p>
            <p>Set location for pricing</p>
        </div>

    </div>
    </div>
    <!----------------------------------------------video section-------------------------------------------- -->
    <div id="video_container">
        <div class="video_wraper">
            <div class="text_wraper">
                <div class="video_text">
                    <div id="fried_video_text">
                        <h1>We've Finally<br> Fried <br>Everything</h1>
                    </div>
                    <div id="play_button">
                        <p>Watch Now</p>
                        <a href=""><i id="play_icon" class="fas fa-play-circle fa-5x"></i></a>
                    </div>
                </div>
            </div>
            <video src="{{ asset('images/video.mp4') }}" loop="" autoplay="">
            </video>
        </div>
        <!--------------------------------------------fries container---------------------------------------------- -->
        <div class="fries_wraper">
            <div id="fries_container">
                <div class="fries_imagebox">
                    <img id="fries_image" src="{{ asset('images/Fries_Product_Card.png') }}" alt="fries image">
                </div>
                <div class="fries_btn">
                    <h2>Yep. We Have Fries<br> Now.</h2>
                    <div>
                        {{-- trang Product --}}
                        <a href="{{ route('product_front') }}"><button>Start your order</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-----------------------------------------------------------quick bites-------------------------------->
    <div id="quick_bites_texts">
        <h1>quick bites</h1>
    </div>
    <div id="container_x">
        <div>
            <div class="imge_x">
                <img id="mohit_x_img" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="quick_bites_para">
                <p>Biscuit</p>
                <p>calories: 180</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_x">
                <img id="mohit_x_img" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="quick_bites_para">
                <p>Biscuit</p>
                <p>calories: 180</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_x">
                <img id="mohit_x_img" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="quick_bites_para">
                <p>Biscuit</p>
                <p>calories: 180</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_x">
                <img id="mohit_x_img" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="quick_bites_para">
                <p>Biscuit</p>
                <p>calories: 180</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_x">
                <img id="mohit_x_img" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="quick_bites_para">
                <p>Biscuit</p>
                <p>calories: 180</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
        <div>
            <div class="imge_x">
                <img id="mohit_x_img" src="{{ asset('images/image1.avif') }}" />
            </div>
            <div id="quick_bites_para">
                <p>Biscuit</p>
                <p>calories: 180</p>
                <p>Set location for pricing.</p>
            </div>
        </div>
    </div>
    <!----------------------------------------------------------last section------------------------------------------>
    <div id="white_chicken_bars">
        <div class="white_vertical_bars">
            <img src="{{ asset('images/white_bars.jpeg') }}" alt="">
        </div>
        <div class="text_items">
            <h5>our food</h5>
            <h1>We Make it the <br>Hard Way</h1>
            <p>See what goes into making our world famous fried chicken.</p>
            <a href=""><button>Learn More</button></a>
        </div>
        <div class="bottom_chicken_box">
            <img src="{{ asset('images/big_chickenbox.jpeg') }}" alt="">
        </div>
    </div>
    <div id="floating_box">
        <a href=""><button>Start Order</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
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

    @php
        if (Auth::check()) {
            $user = Auth::user();
        }
    @endphp
    @if (!empty($user))
        <link rel="stylesheet" href="{{ asset('css_front/chatUser.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

        <button class="message"><i class="fa-brands fa-facebook-messenger"></i></button>

        <div class="box">
            <div class="name_user">
                <div class="flex_box">
                    <div class="name">Admin</div>
                    <div><button>x</button></div>
                </div>
            </div>
            <div id="content-chat">
                <!-- nội dung ở đây -->
            </div>
            <div style="text-align: center;" class="submit-Chat">
                <input type="text" style="width:80%;" name="userValue" onkeydown="Button_Chat(event)">
            </div>
        </div>
        <script src="{{ asset('js_front/boxchat.js') }}"></script>
        <script>
            window.addEventListener('scroll', () => {
                var getPostionWindow = window.scrollY;
                if (getPostionWindow >= 400) {
                    document.querySelector('.message').style.display = "block";
                } else {
                    document.querySelector('.message').style.display = "none";
                }
            })

            if(document.querySelector('.success') || document.querySelector('.error')){
                var takesomething = document.querySelector('.success') || document.querySelector('.error');
                setTimeout(() => {
                    takesomething.remove();
                }, 3000);
            }
        </script>
    @endif
</body>

</html>

@yield('js_front')
{{-- <!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "153944454463895");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v18.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> --}}
