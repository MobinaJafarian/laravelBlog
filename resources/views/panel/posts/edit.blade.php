<x-panel-layout>
  <x-slot name="title">
    - ویرایش مقاله
  </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index') }}"> مقالات</a></li>
            <li><a href="{{ route('posts.edit', $post->id) }}"  class="is-active" >ویرایش مقاله</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مقاله</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <input type="text" name="title" class="text" placeholder="عنوان مقاله" value="{{ $post->title }}" />
                    @error('title')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <ul class="tags">
                        @foreach($post->categories as $category)
                        <li class="addedTag">{{ $category->name }}<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="{{ $category->name }}" name="categories[]">
                        </li>
                        @endforeach
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

                    <textarea placeholder="متن مقاله" class="text" name="content">{!! $post->content !!}</textarea>
                    @error('content')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-web_net">ویرایش مقاله</button>
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