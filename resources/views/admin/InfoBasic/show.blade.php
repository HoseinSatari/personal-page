@component('admin.layout.content' , ['title' => 'اطلاعات پایه '])
    @slot('breadcrumb')
        <li class="breadcrumb-item" ><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item" >اطلاعات پایه </li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">اطلاعات پایه </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>

                            <th>نام</th>
                            <th>تولد</th>
                            <th>مکان زندگی</th>
                            <th>کشور</th>
                            <th>شماره</th>
                            <th>ایمیل</th>
                            <th>مدت فعالیت</th>
                            <th>بیوگرافی</th>
                            <th>ویرایش</th>
                        </tr>
                        <tr>

                            <th>{{$info->name}}</th>
                            <th>{{jdate($info->birth)->format('%Y-m-d')}}</th>
                            <th>{{$info->place}}</th>
                            <th>{{$info->country}}</th>
                            <th>{{$info->phone}}</th>
                            <th>{{$info->email}}</th>
                            <th>{{$info->year_work}}</th>
                            <th>{{$info->about}}</th>
                            <th><a href="/admin/InfoBasic/edit/{{$info->id}}"><button class="btn btn-sm btn-primary">ویرایش</button></a></th>
                        </tr>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.row -->
@endcomponent
