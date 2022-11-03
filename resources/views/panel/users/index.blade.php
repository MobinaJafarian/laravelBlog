<x-panel-layout>
  <x-slot name="title">
    - مدیریت کاربران
  </x-slot>
  <x-slot name="styles">
    <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
  </x-slot>
    <div class="breadcrumb">
      <ul>
          <li><a href="{{ route('dashboard') }}" >پیشخوان</a></li>
          <li><a href="{{ route('users.index') }}" class="is-active">کاربران</a></li>
      </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('users.index') }}">همه کاربران</a>
                <a class="tab__item" href="{{ route('users.create') }}">ایجاد کاربر جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="bg-white table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>سطح کاربری</th>
                    <th>تاریخ عضویت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr role="row" class="">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleInFarsi() }}</td>
                        <td>{{ $user->getCreatedAtInJalali() }}</td>
                        <td>
                            @if(auth()->user()->id !== $user->id && $user->role !== 'admin')
                            <a href="{{ route('users.destroy', $user->id) }}" onclick="destroyUser(event, {{ $user->id }})" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(233, 53, 53)">حذف</a>
                            @endif
                            <a href="{{ route('users.edit', $user->id) }}" class="btn" style="color: rgb(241, 227, 227);background-color:rgb(54, 186, 247)" title="ویرایش">ویرایش</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" id="destroy-user-{{ $user->id }}">
                              @csrf
                              @method('delete')
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    <x-slot name="scripts">
      <script>
        function destroyUser(event, id) {
          event.preventDefault();
          Swal.fire({
          title: 'ایا مطمئن هستید این کار را میخواهید حذف کنید؟',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: 'rgb(221, 51, 51)',
          cancelButtonColor: 'rgb(48, 133, 214)',
          confirmButtonText: 'بله حذف کن!',
          cancelButtonText: 'کنسل'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById(`destroy-user-${id}`).submit()
          }
        })
        }
      </script>
    </x-slot>
</x-panel-layout>