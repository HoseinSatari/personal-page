@component('admin.layout.content' , ['title' => 'ساخت تحصیلات  '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('education.index')}}">تحصیلات</a> </li>
        <li class="breadcrumb-item"> ساخت تحصیلات</li>

    @endslot
    @section('script')
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
            $('#lfm').filemanager('image');
        </script>


    @endsection
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ساخت تحصیلات </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('education.store')}}" method="POST">
            <div class="card-body">
                @csrf

                <div class="form-group">
                    <label for="token" class="col-form-label">عنوان :</label>
                    <input type="text" value="{{old('title')}}"
                           class="form-control @error('title') is-invalid @enderror"
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
                              class="form-control @error('title') is-invalid @enderror">{{old('body')}}</textarea>
                    @error('body')
                    <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="token" class="col-form-label">مکان :</label>
                    <input type="text" value="{{old('place')}}"
                           class="form-control @error('place') is-invalid @enderror"
                           name="place">
                    @error('place')
                    <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="token" class="col-form-label">شروع :</label>
                    <input type="text" value="{{old('start')}}"
                           class="form-control @error('start') is-invalid @enderror"
                           name="start">
                    @error('start')
                    <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="token" class="col-form-label">پایان :</label>
                    <input type="text" value="{{old('end')}}" class="form-control @error('end') is-invalid @enderror"
                           name="end">
                    @error('end')
                    <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="order_number">اساس نمایش :</label>
                    <input type="number" name="order_number" id="order_number" class="form-control @error('order_number') is-invalid @enderror">
                    @error('order_number')
                    <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label " >تصویر مدرک :</label>
                    <div class="input-group">
                        <input type="text" id="thumbnail" class="form-control" name="img">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
                <a href="{{route('education.index')}}" class="btn btn-default float-left">لغو</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@endcomponent


