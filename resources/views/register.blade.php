<x-app-layout>

<x-slot name="title">
    - صفحه ثبت نام
</x-slot>

<main class="bg--white">
    <div class="container">
        <div class="sign-page">
            <h1 class="sign-page__title">ثبت نام در وب‌سایت</h1>

            <form class="sign-page__form">
                <form action="">
                    <input type="text" class="text text--right" placeholder="نام  و نام خانوادگی">
                    <input type="text" class="text text--left" placeholder="شماره موبایل">
                    <input type="text" class="text text--left" placeholder="ایمیل">
                    <input type="text" class="text text--left" placeholder="رمز عبور">
                    <input type="text" class="text text--left" placeholder="تکرار رمز عبور">


                    <button class="btn btn--blue btn--shadow-blue width-100 mb-10">ثبت نام</button>
                    <button type="reset" class="btn btn--red btn--shadow-red width-100 ">ثبت نام</button>
                    <div class="sign-page__footer">
                        <span>در سایت عضوید ؟ </span>
                        <a href="{{ route('login') }}" class="color--46b2f0">صفحه ورود</a>

                    </div>
                </form>
            </form>
        </div>
    </div>
</main>
</x-app-layout>