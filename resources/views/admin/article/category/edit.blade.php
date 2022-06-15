@component('admin.layout.content' , ['title' => 'ویرایش دسته بندی  '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('category_post.index')}}">لیست دسته بندی </a> </li>
        <li class="breadcrumb-item"> ویرایش دسته بندی </li>

    @endslot
    @section('script')
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>

            var options = {
                filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            };

            $('#lfm').filemanager('image');
        </script>

    @endsection
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">ویرایش دسته بندی  </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form action="{{route('category_post.update' , ['category_post' => $category->id])}}" method="POST">
        <div class="card-body">
        @csrf
        @method('put')

            <div class="form-group">
                <label for="token" class="col-form-label">عنوان :</label>
                <input type="text" value="{{old('title' , $category->title)}}"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title">
                @error('title')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="token" class="col-form-label">ترتیب نمایش :</label>
                <input type="number" value="{{old('order_number' , $category->order_number)}}"
                       class="form-control @error('order_number') is-invalid @enderror"
                       name="order_number">
                @error('order_number')
                <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="token" class="col-form-label"> پوستر :</label>
                <div class="input-group">
                    <input type="text"  id="thumbnail" class="form-control @error('poster') is-invalid @enderror" name="poster"
                           value="{{old('poster', $category->poster)}}">
                    @error('order_number')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary"  id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                    </div>
                </div>

            </div>
            <div class=" form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"> زیردسته :</label>
                <select class="form-control" name="parent_id" id="permissions">
                    <option value="">دسته اصلی</option>
                    @foreach(\App\Models\Category::all() as $cate)
                        @if($category->id != $cate->id)
                            <option value="{{ $cate->id }}" {{ $cate->id === $category->parent_id ? 'selected' : ''  }}>{{ $cate->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-lg-12 form-group p-2">
                <input type="checkbox" class="is_active" name="deactive" id="is_active"  {{ $category->is_active ? '' : 'checked' }}>
                <label for="is_active">غیرفعال باشه  </label>
            </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">ویرایش</button>
            <a href="{{route('category_post.index')}}" class="btn btn-default float-left">لغو</a>
        </div>
        <!-- /.card-footer -->
    </form>
    </div>

@endcomponent
