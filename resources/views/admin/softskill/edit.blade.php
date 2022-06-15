@component('admin.layout.content' , ['title' => 'ویرایش مهارت نرم '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('softskill.index')}}">مهارت های نرم</a> </li>
        <li class="breadcrumb-item"> ویرایش مهارت نرم</li>

    @endslot
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">ویرایش مهارت </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form action="{{route('softskill.update' , ['softskill' => $skill->id])}}" method="POST">
        <div class="card-body">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="token" class="col-form-label">عنوان :</label>
                <input type="text" value="{{old('title' , $skill->title)}}"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title">
                @error('name')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">درصد :</label>
                <input type="text" value="{{old('percent' , $skill->percent)}}"
                       class="form-control @error('percent') is-invalid @enderror"
                       name="percent">
                @error('percent')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">سال کاری :</label>
                <input type="number" value="{{old('year_work' , $skill->year_work)}}"
                       class="form-control @error('year_work') is-invalid @enderror"
                       name="year_work">
                @error('year_work')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">کد ایکن :</label>
                <input type="text" value="{{old('icon_code' , $skill->icon_code)}}"
                       class="form-control @error('icon_code') is-invalid @enderror"
                       name="icon_code">
                @error('icon_code')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="order_number">اساس نمایش :</label>
                <input type="number" name="order_number" value="{{old('order_number' , $skill->order_number)}}"  id="order_number" class="form-control @error('order_number') is-invalid @enderror">
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
            <a href="{{route('softskill.index')}}" class="btn btn-default float-left">لغو</a>
        </div>
        <!-- /.card-footer -->
    </form>
    </div>

@endcomponent
