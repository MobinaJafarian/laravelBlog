<x-app-layout>

<x-slot name="title">
    - صفحه بازیابی رمز عبور
</x-slot>

<main class="bg--white">
    <div class="container">
        <div class="sign-page">
            <h1 class="sign-page__title">بازیابی رمز عبور</h1>

            <form class="sign-page__form">
                <form action="">
                    <input type="text" class="text text--left" placeholder="شماره یا ایمیل">

                    <button class="btn btn--blue btn--shadow-blue width-100 ">بازیابی</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{ route('register') }}" class="color--46b2f0">صفحه ثبت نام</a>

                    </div>
                </form>
            </form>
        </div>
    </div>
</main>
</x-app-layout>