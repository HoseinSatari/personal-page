@component('admin.layout.content' , ['title' => 'لیست نمونه کار ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   لیست نمونه کار ها</li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">  نمونه کار ها </h3>
                    <div class="card-tools d-flex ">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                        </form>
                    </div>
                    <div class="btn-group-sm mr-1">
                        <a href="{{route('job.create')}}" class="btn btn-sm btn-info "> ایجاد نمونه کار جدید</a>

                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tr>

                        <th>عنوان</th>
                        <th>مدت زمان</th>
                        <th>نام مشتری</th>
                        <th>لینک</th>
                        <th>اساس نمایش</th>
                        <th>اقدامات</th>
                    </tr>
                    @foreach($jobs as $item)
                        <tr>
                            <th>{{$item->title}}</th>
                            <th>{{$item->time_end}}</th>
                            <th>{{$item->customer}}
                            <th>{{$item->link}}</th>
                            <th>{{$item->order_number}}</th>
                            <th class="d-flex">
                                <a href="{{route('job.edit' , ['job' => $item->id])}}">
                                    <button class="btn btn-sm btn-primary ml-1">ویرایش</button>
                                </a>
                                <form action="{{route('job.destroy' , ['job' => $item->id] )}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                            </th>


                        </tr>
                    @endforeach

                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div><!-- /.row -->
@endcomponent
