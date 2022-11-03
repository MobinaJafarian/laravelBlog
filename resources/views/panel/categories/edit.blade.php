<x-panel-layout>
<x-slot name="title">
  - ویرایش دسته بندی
</x-slot>
  <div class="breadcrumb">
    <ul>
        <li><a href="{{ route('dashboard') }}" title="پیشخوان">پیشخوان</a></li>
        <li><a href="{{ route('categories.index') }}" class="">دسته بندی ها</a></li>
        <li><a href="{{ route('categories.edit', $category->id) }}" class="is-active">ویرایش دسته بندی</a></li>
    </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters bg-white margin-bottom-20">
            <div class="col-12">
                <p class="box__title">ویرایش دسته بندی</p>
                <form action="{{ route('categories.update', $category->id) }}" class="padding-30" method="post">
                    @csrf
                    @method('put')

                    <input type="text" name="name" class="text" value="{{ $category->name }}" placeholder="نام و نام خانوادگی">
                    @error('name')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <select class="select" name="category_id" id="category_id">
                        <option value="">ندارد</option>
                        @foreach($parentCategories as $parentCategory)
                          <option value="{{ $parentCategory->id }}" @if($parentCategory->id === $category->category_id) selected @endif>{{ $parentCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-web_net">ویرایش دسته بندی</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>