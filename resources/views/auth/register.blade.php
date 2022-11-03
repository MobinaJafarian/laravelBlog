<x-app-layout>

<x-slot name="title">
    - صفحه ثبت نام
</x-slot>

<main class="bg--white">
    <div class="container">
        <div class="sign-page">
            <h1 class="sign-page__title">ثبت نام در وب‌سایت</h1>

            <form class="sign-page__form" action="{{ route('register.store') }}" method="POST">
                @csrf
                <div>
                    <input type="text" name="name" class="text text--right" placeholder="نام و نام خانوادگی" />
                    @error('name')
                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input type="text" name="mobile" class="text text--left" placeholder="شماره موبایل" />
                    @error('mobile')
                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="email" class="text text--left" placeholder="ایمیل" />
                    @error('email')
                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" class="text text--left" placeholder="رمز عبور" />
                    @error('password')
                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password_confirmation" class="text text--left" placeholder="تکرار رمز عبور" />
                </div>

                <button class="btn btn--blue btn--shadow-blue width-100 mb-10" type="submit">
                    ثبت نام
                </button>
                <div class="sign-page__footer">
                    <span>در سایت عضوید ؟ </span>
                    <a href="{{ route('login') }}" class="color--46b2f0">صفحه ورود</a>

                </div>
            </form>
        </div>
    </div>
</main>
</x-app-layout>