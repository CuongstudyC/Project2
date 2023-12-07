<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <link rel="stylesheet" href="{{ asset('css_front/findkfc.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>
<body>
<!-- -----------------------------------------------------------------------------------------------------------Nav bar -->
<header>
    <div id="mobile_nav">
        <a href=""><i class="fas fa-bars fa-1x"></i></a>
        <a href="index.html"><img src="{{ asset('images\kfc.jpeg') }}" alt="kfc"></a>
        <a href="{{ route('cart_front') }}"><i class="fas fa-shopping-bag fa-1x "></i></a>
    </div>
    <div class="nav-top">
        <img src="{{ asset('images\nav.jpeg') }}" alt="lines">
    </div>
    <nav>
        <div class="box1_5">
            <a href="{{ route('index_front') }}"><img class="img_align" src="{{ asset('images\nav1.jpeg') }}" alt="chicken"></a>
            <a href="{{ route('product_front') }}">Menu</a>
            <!-- <a href="career.html">Careers</a> -->
            <a href="{{ route('about_front') }}">About</a>
            <a href="{{ route('location_front') }}">Find a KFC®</a>
            <a href="{{ route('User_Front_Orders') }}">Orders History</a>
        </div>
        <div class="box2_5">
            <a href="{{ route('product_front') }}" id="btn_property"><button id="btn-class">Start Order</button></a>
            <a href="{{ route('login') }}" id="account_id" style="text-decoration:none;">
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
            <a href="{{ route('cart_front') }}" id="cart_id"> <i class="fas fa-shopping-bag fa-2x "></i></a>
        </div>
    </nav>
    <div class="nav-bottom">
        <div class="location"><i class="fas fa-map-marker-alt"></i></div>
        <div class="para">Start an Order for Pickup or Delivery</div>
        <a href=""><i class="fas fa-caret-down"></i></a>
    </div>
</header>
<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

        <div id="container2">

            <div class ="box2_1">
                 <div id="box2_1_1">
                     <div><i>Kentucky Fried Chicken</i></div>
                     <div><img src="{{ asset('images\logo.PNG') }}" alt=""></div>
                 </div>

            </div>
            <div class ="box2_2">
               <div id = "box2_2_1">

                    <div id="line">
                        <img src="{{ asset('images\line2.PNG') }}" alt="">
                    </div>

                    <div id="find">
                        Find a Cuong16cm Location
                    </div>

                    <div id="search"> <br><br>
                        SEARCH BY CITY AND STATE OR ZIP CODE
                    </div>

                    <div id="louis"> <br><br>
                        <div class="l">
                          <div><i>Louisville,KY </i></div>
                          <div><img src="{{ asset('images\loc.PNG') }}" alt=""></div>
                        </div>
                    </div>

                    <div id="use"> <br>
                        <u>USE MY LOCATION</u>
                    </div>

                    <div id="location"> <br> <br>
                        Use our locator to find a location near you or <u>browse our directory. </u>
                    </div>
               </div>

               <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.319281397683!2d106.66369937481835!3d10.786840059002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gMSAtIEjhu4cgVGjhu5FuZyDEkMOgbyBU4bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIFThur8gKFNpbmNlIDE5OTkp!5e0!3m2!1svi!2s!4v1696941372636!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
        </div>
</body>
</html>
