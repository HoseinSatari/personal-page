@component('admin.layout.content' , ['title' => ' تجربیات کاری '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"> تجربیات کاری</li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تجربیات کاری </h3>
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
                        <a href="{{route('Work.create')}}" class="btn btn-sm btn-info ">ایجاد تجربه کاری جدید</a>

                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tr>

                        <th>عنوان</th>
                        <th>بدنه</th>
                        <th>مکان</th>
                        <th>شروع</th>
                        <th>پایان</th>
                        <th>اساس نمایش</th>
                        <th>اقدامات</th>


                    </tr>
                    @foreach($works as $item)
                        <tr>
                            <th>{{$item->title}}</th>
                            <th>{{$item->body}}</th>
                            <th>{{$item->place}}</th>
                            <th>{{$item->start}}
                            <th>{{$item->end}}</th>
                            <th>{{$item->order_number}}</th>
                            <th class="d-flex">
                                <a href="{{route('Work.edit' , ['Work' => $item->id])}}">
                                    <button class="btn btn-sm btn-primary ml-1">ویرایش</button>
                                </a>
                                <form action="{{route('Work.destroy' , ['Work' => $item->id] )}}" method="POST">
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
