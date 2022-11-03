<x-panel-layout>
<x-slot name="title">
  - داشبورد
</x-slot>
<div class="breadcrumb">
    <ul>
        <li><a href="{{ route('dashboard') }}" title="پیشخوان">پیشخوان</a></li>
    </ul>
    </div>
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد پست ها</p>
                <p>{{ $posts_count }} پست</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد نظرات</p>
                <p>{{ $comments_count }} نظر</p>
            </div>
            @endif
            @if(auth()->user()->role === 'admin')
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> تعداد کاربران </p>
                <p>{{ $users_count }} نفر</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white  margin-bottom-10">
                <p>تعداد دسته بندی ها</p>
                <p>{{ $categories_count }} نظر</p>
            </div>
            @endif
        </div>

    </div>
</x-panel-layout>