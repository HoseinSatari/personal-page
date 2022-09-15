@component('admin.layout.content' , ['title' => 'ساخت  مقاله   '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}"> لیست  مقالات </a> </li>
        <li class="breadcrumb-item"> ساخت   مقاله</li>

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
            $('#lfm1').filemanager('image');

            $('#categories').select2({
                'placeholder': 'دسته بندی مورد نظر را انتخاب کنید'
            })

        </script>


    @endsection
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ساخت   مقاله </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                @csrf

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label ">سرتیتر (عنوان) : </label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror" id="inputEmail3"
                               placeholder="سرتیتر  را وارد کنید" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail2" class="col-sm-3 control-label">توضیح کوتاه درباره مقاله :</label>
                        <textarea class="form-control @error('short_descrip') is-invalid @enderror" name="short_descrip"
                                  id="short_text" cols="30"
                                  rows="4">{{ old('short_descrip') }}</textarea>
                        @error('short_descrip')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">متن مقاله :</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body"
                                  id="text" cols="30"
                                  rows="10">{!! old('body') !!}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label " >تصویر شاخص</label>
                        <div class="input-group">
                            <input type="text" id="thumbnail" class="form-control" name="poster">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail2" class="col-sm-3 control-label">کلمات کلیدی محصول با "," جدا کنید</label>
                        <textarea class="form-control @error('keyword') is-invalid @enderror" name="keyword"
                                  id="keyword" cols="30"
                                  rows="4">{{ old('keyword') }}</textarea>
                        @error('keyword')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail2" class="col-sm-3 control-label">دسته بندی ها</label>
                        <select class="form-control @error('category') is-invalid @enderror"
                                name="category[]" id="categories" multiple>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>


                    <div class="col-lg-12 form-group p-2">
                        <input type="checkbox" class="is_active" name="deactive" id="is_active">
                        <label for="is_active">مقاله غیر فعال باشد </label>
                    </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
                <a href="{{route('article.index')}}" class="btn btn-default float-left">لغو</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@endcomponent


