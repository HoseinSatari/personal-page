@component('admin.layout.content' , ['title' => 'اطلاعات پایه '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">اطلاعات پایه</li>

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

       <script type="text/javascript">
           $(document).ready(function() {


               $(".example1").pDatepicker({
                   format : "YYYY-MM-DD",
               });

           });
       </script>
   @endsection
    <form action="/admin/InfoBasic/edit/{{$basic->id}}" method="POST">
        @csrf
       @method('put')
        <div class="form-group">
            <label for="token" class="col-form-label">نام :</label>
            <input type="text" value="{{$basic->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
            @error('name')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">تولد :</label>
            <input type="text" value="{{$basic->birth}}" class="form-control example1 @error('birth') is-invalid @enderror" name="birth">
            @error('birth')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="token" class="col-form-label">کشور :</label>
            <input type="text" value="{{$basic->country}}" class="form-control @error('country') is-invalid @enderror" name="country">
            @error('country')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">شهر زندگی :</label>
            <input type="text" value="{{$basic->place}}" class="form-control @error('place') is-invalid @enderror" name="place">
            @error('place')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">شماره همراه  :</label>
            <input type="text" value="{{$basic->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone">
            @error('phone')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">ایمیل   :</label>
            <input type="email" value="{{$basic->email}}" class="form-control @error('email') is-invalid @enderror" name="email">
            @error('email')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">سال فعالیت   :</label>
            <input type="text" value="{{$basic->year_work}}" class="form-control @error('year_work') is-invalid @enderror" name="year_work">
            @error('year_work')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">سال فعالیت   :</label>
            <textarea class="form-control  @error('about') is-invalid @enderror" name="about" >{{$basic->about}}</textarea>
            @error('about')
            <span class="invalid-feedback">
                                       <strong>{{ $message }}</strong>
                                   </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label " >تصویر شاخص</label>
            <div class="input-group">
                <input type="text" id="thumbnail" class="form-control @error('poster') is-invalid @enderror" value="{{$basic->img}}" name="img">
                @error('poster')
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                @enderror
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">ویرایش</button>
        </div>
    </form>

@endcomponent
