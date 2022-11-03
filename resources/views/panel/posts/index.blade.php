<x-panel-layout>
<x-slot name="title">
  - مدیریت مقالات
</x-slot>
<x-slot name="styles">
  <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
</x-slot>
<div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index') }}" class="is-active"> مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('posts.index') }}">لیست مقالات</a>
                <a class="tab__item " href="{{ route('posts.create') }}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="{{ route('posts.index') }}">
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" class="text" name="search" placeholder="نام مقاله">
                                <button class="btn btn-web_net">جستجو</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>نویسنده</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr role="row" class="">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->getCreatedAtInJalali() }}</td>
                        <td>
                            <a href="{{ route('posts.destroy', $post->id) }}" onclick="destroyPost(event, {{ $post->id }})" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(233, 53, 53)">حذف</a>
                            <a href="" target="_blank" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(131, 53, 233)" title="مشاهده">مشاهده</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(54, 186, 247)" title="ویرایش">ویرایش</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" id="destroy-post-{{ $post->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            function destroyPost(event, id) {
                event.preventDefault();
                document.getElementById('destroy-post-' + id).submit();
            }
        </script>
    </x-slot>
</x-panel-layout>