@component('admin.layout.content' , ['title' => 'ویرایش تحصیلات  '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('education.index')}}">تحصیلات</a> </li>
        <li class="breadcrumb-item"> ویرایش تحصیلات</li>

    @endslot
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">ویرایش تحصیلات </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form action="{{route('education.update' , ['education' => $education->id])}}" method="POST">
        <div class="card-body">
        @csrf
        @method('put')
        <div class="form-group ">
            <label for="token" class="col-form-label">عنوان :</label>
            <input type="text" value="{{$education->title}}" class="form-control  @error('title') is-invalid @enderror"
                   name="title">
            @error('title')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">توضیحات :</label>
            <textarea name="body" id=""
                      class="form-control @error('title') is-invalid @enderror">{{$education->body}}</textarea>
            @error('body')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">مکان :</label>
            <input type="text" value="{{$education->place}}" class="form-control @error('place') is-invalid @enderror"
                   name="place">
            @error('place')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">شروع :</label>
            <input type="text" value="{{$education->start}}" class="form-control @error('start') is-invalid @enderror"
                   name="start">
            @error('start')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">پایان :</label>
            <input type="text" value="{{$education->end}}" class="form-control @error('end') is-invalid @enderror"
                   name="end">
            @error('end')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="top" class="col-form-label">اساس نمایش :</label>
            <input type="text" value="{{$education->order_number}}" class="form-control @error('order_number') is-invalid @enderror"
                   name="order_number">
            @error('order_number')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">ویرایش</button>
            <a href="{{route('education.index')}}" class="btn btn-default float-left">لغو</a>
        </div>
        <!-- /.card-footer -->
    </form>
    </div>

@endcomponent
