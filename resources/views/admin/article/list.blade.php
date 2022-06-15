@component('admin.layout.content' , ['title' => 'لیست   مقالات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   لیست مقالات</li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">  مقالات </h3>
                    <div class="card-tools d-flex ">
                        <div class="btn-group ml-2">
                            <a href="/admin/article" class="btn btn-primary btn-sm ">مقاله های منتشر شده</a>
                            <a href="/admin/article?article=1" class="btn btn-secondary btn-sm ">مقاله های منتشر نشده</a>

                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                        </form>
                    </div>
                    <div class="btn-group-sm mr-1">
                        <a href="{{route('article.create')}}" class="btn btn-sm btn-info "> ایجاد مقاله جدید</a>

                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tr>
                        <th>عکس شاخص</th>
                        <th>عنوان</th>
                        <th>بدنه</th>
                        <th>وضعیت</th>
                        <th>اقدامات </th>
                    </tr>
                    @foreach($articles as $item)
                        <tr>
                            <th><img src="{{$item->poster}}" alt="" height="75px" width="75px" class="rounded-circle"></th>
                            <th>{{$item->title}}</th>
                            <th><a href="{{route('article.show' , ['article' => $item->id])}}">مشاهده بدنه</a></th>

                            <th>@if($item->is_active) <i class="badge badge-primary"> منتشر شده </i> @else <i class="badge badge-secondary"> منتشر نشده</i>  @endif</i></th>
                            <th class="d-flex">
                                <a href="{{route('article.edit' , ['article' => $item->id])}}">
                                    <button class="btn btn-sm btn-primary ml-1">ویرایش</button>
                                </a>
                                <form action="{{route('article.destroy' , ['article' => $item->id] )}}" method="POST">
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
