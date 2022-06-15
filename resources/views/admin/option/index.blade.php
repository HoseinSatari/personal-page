@component('admin.layout.content' , ['title' => ' تنظیمات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   تنظیمات</li>

    @endslot
@section('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
@section('title' , 'تنظیمات ')
@section('content')



        <div class="container-fluid">
            <div class="card shadow-sm">

                <div class="py-4 px-4 col-lg-10">

                    <form action="{{route('option.index' )}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">نام سایت</label>
                                <input type="text" name="sitename"
                                       class="form-control @error('sitename') is-invalid @enderror" id="inputEmail3"
                                       placeholder="نام سایت را وارد کنید" value="{{ old('sitename' , $option->sitename) }}">
                                @error('sitename')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label " >لوگو </label>
                                <div class="input-group">
                                    <input type="text" id="thumbnail" value="{{$option->logo}}" class="form-control @error('logo') is-invalid @enderror" name="logo">
                                    @error('logo')
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
                                <label for="inputEmail3" class="col-sm-4 control-label ">توضیح درباره سایت </label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="3">{{ old('description' , $option->description) }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">کلمات کلیدی (با کارکتر "," جدا کنید ) </label>
                                <textarea name="keyword" class="form-control @error('keyword') is-invalid @enderror" id="" cols="30" rows="3">{{ old('keyword' , $option->keyword) }}</textarea>
                                @error('keyword')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">شماره برای نمایش و پشتیبانی </label>
                                <input type="text" name="phone_support"
                                       class="form-control @error('phone_support') is-invalid @enderror" id="inputEmail3"
                                       placeholder="شماره" value="{{ old('phone_support' , $option->phone_support) }}">
                                @error('phone_support')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">شماره برای ارسال پیامک </label>
                                <input type="text" name="phone_admin"
                                       class="form-control @error('phone_admin') is-invalid @enderror" id="inputEmail3"
                                       placeholder="شماره" value="{{ old('phone_admin' , $option->phone_admin) }}">
                                @error('phone_admin')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">اینستاگرام </label>
                                <input type="text" name="instagram"
                                       class="form-control @error('instagram') is-invalid @enderror" id="inputEmail3"
                                       placeholder="اینستاگرام" value="{{ old('instagram' , $option->instagram) }}">
                                @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label ">واتساپ </label>
                                <input type="text" name="whatsup"
                                       class="form-control @error('whatsup') is-invalid @enderror" id="inputEmail3"
                                       placeholder="واتساپ" value="{{ old('whatsup' , $option->whatsup) }}">
                                @error('whatsup')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">لینکدین </label>
                                <input type="text" name="linkdin"
                                       class="form-control @error('linkdin') is-invalid @enderror" id="inputEmail3"
                                       placeholder="لینکدین" value="{{ old('linkdin' , $option->linkdin) }}">
                                @error('linkdin')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">گیت هاب </label>
                                <input type="text" name="github"
                                       class="form-control @error('linkdin') is-invalid @enderror" id="inputEmail3"
                                       placeholder="گیت هاب" value="{{ old('github' , $option->github) }}">
                                @error('github')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">گیت لب </label>
                                <input type="text" name="gitlab"
                                       class="form-control @error('gitlab') is-invalid @enderror" id="inputEmail3"
                                       placeholder="گیت لب" value="{{ old('gitlab' , $option->gitlab) }}">
                                @error('gitlab')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">استیک اور فلو </label>
                                <input type="text" name="stackoverflow"
                                       class="form-control @error('stackoverflow') is-invalid @enderror" id="inputEmail3"
                                       placeholder="استیک اور فلو" value="{{ old('stackoverflow' , $option->stackoverflow) }}">
                                @error('stackoverflow')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label ">توییتر </label>
                                <input type="text" name="twitter"
                                       class="form-control @error('twitter') is-invalid @enderror" id="inputEmail3"
                                       placeholder="توییتر" value="{{ old('twitter' , $option->twitter) }}">
                                @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label ">تلگرام </label>
                                <input type="text" name="telegram"
                                       class="form-control @error('telegram') is-invalid @enderror" id="inputEmail3"
                                       placeholder="تلگرام" value="{{ old('telegram' , $option->telegram) }}">
                                @error('telegram')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 form-group p-2">
                                <input type="checkbox" class="is_active" name="deactive" id="is_active" @if(!$option->is_active) checked @endif>
                                <label for="is_active">سایت غیر فعال باشد </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-success" type="submit">ویرایش</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>



@endcomponent
