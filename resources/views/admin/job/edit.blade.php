@component('admin.layout.content' , ['title' => 'ویرایش نمونه کار'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('job.index')}}">لیست  نمونه کار </a> </li>
        <li class="breadcrumb-item"> ویرایش نمونه کار   </li>

    @endslot
    @section('script')
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script src="/ckeditor/ckeditor.js"></script>
        <script src="/plugins/select2/select2.js"></script>
        <script>
            var options = {
                filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            };

            CKEDITOR.replace('text', options);


            $('#lfm').filemanager('image');
            $('#lfm2').filemanager('image');

            $('#categories').select2({
                'placeholder': 'دسته بندی مورد نظر را انتخاب کنید'
            })
            $('#skills').select2({
                'placeholder': 'مهارت مورد نظر را انتخاب کنید'
            })

        </script>


    @endsection
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">ویرایش  نمونه کار  </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form action="{{route('job.update' , ['job' => $job->id])}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="token" class="col-form-label">عنوان :</label>
                <input type="text" value="{{old('title' , $job->title)}}"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title">
                @error('title')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">توضیحات :</label>
                <textarea name="body" id="text"
                          class="form-control @error('title') is-invalid @enderror">{{old('body' , $job->body)}}</textarea>
                @error('body')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">زمان کار روی پروژه :</label>
                <input type="text" value="{{old('time_end', $job->time_end)}}"
                       class="form-control @error('time_end') is-invalid @enderror"
                       name="time_end">
                @error('time_end')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">مشتری :</label>
                <input type="text" value="{{old('customer' , $job->customer)}}"
                       class="form-control @error('customer') is-invalid @enderror"
                       name="customer">
                @error('customer')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="token" class="col-form-label">لینک :</label>
                <input type="text" value="{{old('link' , $job->link)}}" class="form-control @error('link') is-invalid @enderror"
                       name="link">
                @error('link')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputEmail2" class="col-sm-3 control-label">دسته بندی ها :</label>
                <select class="form-control @error('category') is-invalid @enderror"
                        name="category[]" id="categories" multiple>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{in_array($category->id , $job->category()->pluck('id')->toarray()) ? 'selected' : ''}}>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputEmail2" class="col-sm-3 control-label">مهارت های استفاده شده : </label>
                <select class="form-control @error('skills') is-invalid @enderror"
                        name="skills[]" id="skills" multiple>
                    @foreach(\App\Models\Skills::all() as $skill)
                        <option value="{{ $skill->id }}" {{in_array($skill->id , $job->skills()->pluck('id')->toarray()) ? 'selected' : ''}}>{{ $skill->title }}</option>
                    @endforeach
                </select>
                @error('skills')
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label " >تصویر شاخص :</label>
                <div class="input-group">
                    <input type="text" id="thumbnail" value="{{old('poster' , $job->poster)}}" class="form-control" name="poster">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label " >اسکرین شات : </label>
                <div class="input-group">
                    <input type="text" id="thumbnail2" value="{{old('screen_shot' , $job->screen_shot)}}" class="form-control" name="screen_shot">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="lfm2" data-input="thumbnail2" data-preview="holder">انتخاب</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="order_number">اساس نمایش :</label>
                <input type="number" name="order_number" value="{{old('order_number' , $job->order_number)}}" id="order_number" class="form-control @error('order_number') is-invalid @enderror">
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
            <a href="{{route('job.index')}}" class="btn btn-default float-left">لغو</a>
        </div>
        <!-- /.card-footer -->
    </form>
    </div>

@endcomponent
