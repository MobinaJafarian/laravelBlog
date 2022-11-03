<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>وبلاگ {{ $title ?? '' }}</title>
    <meta name="description"
          content="">
    <meta name="keywords"
          content="سایت, git , لاراول, php, react پی اچ پ , جاوا اسکریپت,    , mvc, React Native,">
    <link rel="stylesheet" href="{{ asset('/blog/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('/blog/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/blog/panel/css/style.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/blog/css/responsive.css') }}" media="(max-width:991px)">
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
<header class="c-header">
    <div class="container container--responsive container--white">
        <div class="c-header__row ">
            <div class="c-header__right">
                <div class="logo">
                    <a href="{{ route('landing') }}" class="" style="color: #fe2619;font-size:30px">Laravel CMS</a>
                </div>
                <div class="c-search width-100 ">
                    <form action="{{ route('post.search') }}" class="c-search__form position-relative">
                        <input type="text" name="search" class="c-search__input" placeholder="جستجو کنید" value="{{ request()->search ?? '' }}">
                        <button class="c-search__button"></button>
                    </form>
                </div>

            </div>
            <div class="c-header__left">
                <div class="c-header__icons">
                    <div class="c-header__button-search "></div>
                    <div class="c-header__button-nav"></div>
                </div>
                @guest
                    <div class="c-button__login-regsiter">
                        <div><a class="c-button__link c-button--login" href="{{ route('login') }}">ورود</a></div>
                        <div><a class="c-button__link c-button--register" href="{{ route('register') }}">ثبت نام</a></div>
                    </div>
                @else
                <div style="width: 180px;">
                    <div class="dropdown-select wide" id="dropdown-user" onclick="toggleUserDropdown()" tabindex="0">
                        <span class="current">
                        {{ auth()->user()->name }}
                        </span>
                        <div class="list">
                            <ul>
                                <li class="option" data-value="0" data-display-text="" tabindex="0">
                                    <a href="{{ route('profile') }}">پروفایل</a>
                                </li>
                                <li class="option " data-value="0" data-display-text="" tabindex="0" onclick="logoutUser()">
                                    خروج
                                </li>
                            </ul>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
    <nav class="nav" id="nav">
        <div class="c-button__login-regsiter d-none">
            <div><a class="c-button__link c-button--login" href="{{ route('login') }}">ورود</a></div>
            <div><a class="c-button__link c-button--register" href="{{ route('register') }}">ثبت نام</a></div>
        </div>
        <div class="container container--nav">
            <ul class="nav__ul">
                <li class="nav__item"><a href="{{ route('landing') }}" class="nav__link">صفحه اصلی</a></li>
                @foreach($categories as $category)
                <li class="nav__item nav__item--has-sub"><a href="{{ route('category.show', $category->slug) }}" class="nav__link">{{ $category->name }}</a>
                    <div class="nav__sub">
                        <div class="container d-flex item-center flex-wrap container--nav">
                            @foreach($category->children as $childCategory)
                                <a href="{{ route('category.show', $childCategory->slug) }}" class="nav__link">{{ $childCategory->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endforeach
                <li class="nav__item"><a href="#" class="nav__link">درباره ما</a></li>
                <li class="nav__item"><a href="#" class="nav__link">تماس باما</a></li>
            </ul>
        </div>
    </nav>
</header>

{{ $slot }}

<footer class="footer">
    <a href="" class="scroll-top"></a>

    <div class="container">
        <div class="footer__links">
            @foreach($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}" class="footer__link">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="footer__hr"></div>
        <div class="footer__about">
            <p class="footer__txt">
              
            </p>
        </div>
    </div>
    <div class="footer__bar">
        <a class="footer__copy" href="">Laravel Cms © 2022</a>
        
    </div>
</footer>
<div class="overlay"></div>
<script src="{{ asset('/blog/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/blog/js/js.js') }}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>-->
<script>
function toggleUserDropdown() {
    document.getElementById('dropdown-user').classList.toggle('open')
}
function logoutUser() {
    document.getElementById('logout-form').submit();
}
</script>
{{ $scripts ?? '' }}

</body>
</html>