@component('admin.layout.content' , ['title' => 'ویرایش دسته بندی  '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('category.index')}}">لیست دسته بندی </a> </li>
        <li class="breadcrumb-item"> ویرایش دسته بندی </li>

    @endslot
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">ویرایش دسته بندی  </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form action="{{route('category.update' , ['category' => $category->id])}}" method="POST">
        <div class="card-body">
        @csrf
        @method('put')
        <div class="form-group ">
            <label for="token" class="col-form-label">عنوان :</label>
            <input type="text" value="{{$category->name}}" class="form-control  @error('name') is-invalid @enderror"
                   name="name">
            @error('name')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror



        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">ویرایش</button>
            <a href="{{route('category.index')}}" class="btn btn-default float-left">لغو</a>
        </div>
        <!-- /.card-footer -->
    </form>
    </div>

@endcomponent
