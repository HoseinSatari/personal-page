@component('admin.layout.content' , ['title' => '  دسته بندی مقالات   '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"> دسته بندی مقالات</li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">دسته بندی مقالات </h3>
                    <div class="card-tools d-flex ">
                        <div class="btn-group ml-2">
                            <a href="{{route('category_post.index')}}?delete=1" class="btn btn-danger btn-sm">دسته های حذف شده</a>
                            <a href="{{route('category_post.index')}}" class="btn btn-success btn-sm">دسته های فعال</a>
                            <a href="{{route('category_post.index')}}?deactive=1" class="btn btn-secondary btn-sm">دسته های غیرفعال</a>
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
                        <a href="{{route('category_post.create')}}" class="btn btn-sm btn-info ">ایجاد دسته بندی جدید</a>

                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="py-4 px-4 ">

                    @include('admin.article.category.list-group', ['categories' => $cateogry])

                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div><!-- /.row -->
@endcomponent
