@component('admin.layout.content' , ['title' => 'ویرایش تجربه کاری  '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('Work.index')}}">تجربیات کاری</a> </li>
        <li class="breadcrumb-item"> ویرایش تجربه کاری</li>

    @endslot
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">ویرایش تجربه کاری </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form action="{{route('Work.update' , ['Work' => $work->id])}}" method="POST">
        <div class="card-body">
        @csrf
        @method('put')
        <div class="form-group ">
            <label for="token" class="col-form-label">عنوان :</label>
            <input type="text" value="{{$work->title}}" class="form-control  @error('title') is-invalid @enderror"
                   name="title">
            @error('title')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
            <div class="form-group">
                <label for="token" class="col-form-label">کمپانی :</label>
                <input type="text" value="{{old('company')}}"
                       class="form-control @error('company') is-invalid @enderror"
                       name="company">
                @error('company')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
        <div class="form-group">
            <label for="token" class="col-form-label">توضیحات :</label>
            <textarea name="body" id=""
                      class="form-control @error('title') is-invalid @enderror">{{$work->body}}</textarea>
            @error('body')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">مکان :</label>
            <input type="text" value="{{$work->place}}" class="form-control @error('place') is-invalid @enderror"
                   name="place">
            @error('place')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">شروع :</label>
            <input type="text" value="{{$work->start}}" class="form-control @error('start') is-invalid @enderror"
                   name="start">
            @error('start')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">پایان :</label>
            <input type="text" value="{{$work->end}}" class="form-control @error('end') is-invalid @enderror"
                   name="end">
            @error('end')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
            <div class="form-group">
                <label for="top" class="col-form-label">اساس نمایش :</label>
                <input type="text" value="{{$work->order_number}}" class="form-control @error('order_number') is-invalid @enderror"
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
            <a href="{{route('Work.index')}}" class="btn btn-default float-left">لغو</a>
        </div>
        <!-- /.card-footer -->
    </form>
    </div>

@endcomponent
