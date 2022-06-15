@component('admin.layout.content' , ['title' => 'ساخت  دسته بندی  '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('category.index')}}"> لیست دسته بندی</a> </li>
        <li class="breadcrumb-item"> ساخت  دسته بندی</li>

    @endslot

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ساخت  دسته بندی </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('category.store')}}" method="POST">
            <div class="card-body">
                @csrf

                <div class="form-group">
                    <label for="token" class="col-form-label">عنوان :</label>
                    <input type="text" value="{{old('name')}}"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name">
                    @error('name')
                    <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                    @enderror
                </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
                <a href="{{route('category.index')}}" class="btn btn-default float-left">لغو</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@endcomponent


