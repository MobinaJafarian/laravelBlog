<x-panel-layout>
<x-slot name="title">
  - مدیریت دسته بندی ها
</x-slot>
<x-slot name="styles">
  <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
</x-slot>
<div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('categories.index') }}" class="is-active">دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="bg-white table__box">
                    <table class="table">
                        <thead role="rowgroup">
                          <tr role="row" class="title-row">
                              <th>شناسه</th>
                              <th>نام دسته بندی</th>
                              <th>نام انگلیسی دسته بندی</th>
                              <th>دسته پدر</th>
                              <th>عملیات</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->getParentName() }}</td>
                                <td>
                                    <a href="{{ route('categories.destroy', $category->id) }}" onclick="destroyCategory(event, {{ $category->id }})" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(233, 53, 53)">حذف</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(54, 186, 247)" title="ویرایش">ویرایش</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" id="destroy-category-{{ $category->id }}">
                                      @csrf
                                      @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
            <div class="col-4 bg-white">
                  <p class="box__title">ایجاد دسته بندی جدید</p>
                  <form action="{{ route('categories.store') }}" method="POST" class="padding-30">
                      @csrf
                      <input type="text" name="name" placeholder="نام دسته بندی" class="text">
                      @error('name')
                        <p class="error">{{ $message }}</p>
                      @enderror

                      <input type="text" name="slug" placeholder="نام انگلیسی دسته بندی" class="text">
                      @error('slug')
                        <p class="error">{{ $message }}</p>
                      @enderror

                      <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

                      <select class="select" name="category_id" id="category_id">
                          <option value="">ندارد</option>
                          @foreach($parentCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                      @error('category_id')
                        <p class="error">{{ $message }}</p>
                      @enderror

                      <button class="btn btn-web_net">اضافه کردن</button>
                  </form>
            </div>
        </div>
    </div>
<x-slot name="scripts">
  <script>
    function destroyCategory(event, id) {
      event.preventDefault();
      document.getElementById('destroy-category-' + id).submit();
    }
  </script>
</x-slot>
</x-panel-layout>