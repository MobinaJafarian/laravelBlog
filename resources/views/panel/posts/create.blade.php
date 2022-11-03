<x-panel-layout>
  <x-slot name="title">
    - ساخت مقاله جدید
  </x-slot>
  <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index') }}"> مقالات</a></li>
            <li><a href="{{ route('posts.create') }}" class="is-active" >ایجاد مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('posts.store') }}" method="POST" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class="text" placeholder="عنوان مقاله">
                    @error('title')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- <p>دسته بندی های مقاله</p>
                    <select class="select" name="categories" id="categories">
                          @foreach($post->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                      @error('categories')
                        <p class="error">{{ $message }}</p>
                      @enderror --}}


                      <p>دسته بندی های مقاله</p>
                      <ul class="tags">
                          <li class="tagAdd taglist">
                              <input type="text" id="search-field">
                          </li>
                      </ul>
                      @error('categories')
                        <p class="error">{{ $message }}</p>
                      @enderror

                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" name="banner" class="file-upload" id="files" name="files" accept="image/*" />
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    @error('banner')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <textarea placeholder="متن مقاله" class="text" name="content"></textarea>

                    @error('content')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-web_net">ایجاد مقاله</button>
                </form>
            </div>
        </div>
    </div>
<x-slot name="scripts">
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('content', {
      language: 'fa',
      filebrowserUploadUrl: '{{ route("editor-upload", ["_token" => csrf_token()]) }}',
      filebrowserUploadMethod: 'form'
    })
  </script>

  <script src="{{ asset('blog/panel/js/tagsInput.js') }}"></script>
</x-slot>
</x-panel-layout>