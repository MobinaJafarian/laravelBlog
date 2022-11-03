<x-panel-layout>
<x-slot name="title">
    - صفحه اطلاعات کاربری
</x-slot>
<div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">z</a></li>
            <li><a href="{{ route('profile') }}" class="is-active">اطلاعات کاربری</a></li>
          </ul>
    </div>
    <div class="main-content">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="{{ auth()->user()->getProfileUrl() }}" class="avatar___img">
                        <input type="file" name="profile" accept="image/*" class="hidden avatar-img__input">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">کاربر : {{ auth()->user()->name }}</span>
                    
                    @error('profile')
                      <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <input class="text text-center" type="text" name="name" placeholder="نام کاربری" value="{{ auth()->user()->name }}">
                @error('name')
                  <p class="error">{{ $message }}</p>
                @enderror

                <input class="text text-center" type="text" name="mobile" placeholder="شماره تلفن" value="{{ auth()->user()->mobile }}">
                @error('mobile')
                  <p class="error">{{ $message }}</p>
                @enderror

                <input class="text text-center" type="email" name="email" placeholder="ایمیل" value="{{ auth()->user()->email }}">
                @error('email')
                  <p class="error">{{ $message }}</p>
                @enderror

                <input class="text text-center" type="password" name="password" placeholder="رمز عبور">
                @error('password')
                  <p class="error">{{ $message }}</p>
                @enderror

                <p class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p>
                <br>
                <br>
                <button class="btn btn-web_net">ذخیره تغییرات</button>
            </form>
        </div>
</x-panel-layout>