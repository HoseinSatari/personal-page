@component('admin.layout.content' , ['title' => 'لیست   نظرات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   لیست نظرات</li>

    @endslot
@section('script')


    <script>
        $('#sendComment').on('show.bs.modal', function (event) {
            console.log('sdf')
            var button = $(event.relatedTarget) // Button that triggered the modal
            let parent_id = button.data('id');

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)

            modal.find('input[name="parent_id"]').val(parent_id)

        })


    </script>
@endsection
    <div class="modal fade mt-5" id="sendComment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ارسال نظر</h5>
                    <button type="button" class="close mr-auto ml-0" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('comments.send')}}" method="post" id="sendCommentForm">
                    @csrf
                    <input type="hidden" name="parent_id">

                    <div class="modal-body">
                        <div class="form-group mr-3 ml-3">
                            <label for="message-text" class="col-form-label">نام نمایشی : (الزامی)</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group mr-3 ml-3">
                            <label for="message-text" class="col-form-label"> پیام دیدگاه: (الزامی)</label>
                            <textarea name="comment" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                        <button type="submit" class="btn btn-primary">ارسال نظر</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">  نظرات </h3>
                    <div class="card-tools d-flex ">
                        <div class="btn-group ml-2">
                            <a href="{{route('comments')}}" class="btn btn-primary btn-sm ">نظرات تایید شده</a>
                            <a href="{{route('comments' , ['unapproved' => 1])}}" class="btn btn-secondary btn-sm ">نظرات تایید نشده</a>

                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th> نام کاربر</th>
                        <th>نام نمایش</th>
                        <th>شماره</th>
                        <th>ایمیل</th>
                        <th> نظر</th>
                        <th> صفحه</th>
                        <th>اقدامات</th>
                    </tr>
                    @foreach($comments as $comment)
                        <tr>
                            <td class="text-align-center">{{$loop->index}}</td>
                            <td class="text-align-center">@if($comment->user_id) <i class="badge badge-light">{{$comment->user->name}}</i>   @else <i class="badge badge-danger">عضو سایت نیست</i>    @endif</td>
                            <td class="text-align-center">{{$comment->name}}</td>
                            <td class="text-align-center"><i class="badge badge-gray-400">{{$comment->phone}}</i></td>
                            <td class="text-align-center"><i class="badge badge-gray-400">{{$comment->email}}</i></td>
                            <td class="text-align-center">{{$comment->comment}}</td>
                            <td class="text-align-center">
                                        <a href="">{{\App\Models\Articles::find($comment->commentable_id)->title ?? ''}}</a>
                            </td>
                            <td class="text-align-center">
                                @if(!$comment->approved)

                                        <form method="post"
                                              action="{{route('comments.approve' , $comment->id)}}">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-sm btn-success mb-2">تایید
                                                نظر
                                            </button>
                                        </form>
                                @endif
                                    <form method="post"
                                          action="{{route('comments.delete' , $comment->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('آیا مایل به حذف هستید؟')"
                                                title="حذف"
                                        >حذف
                                        </button>
                                    </form>



                                    <span class="btn btn-sm btn-primary mt-2" data-toggle="modal"
                                          data-target="#sendComment"
                                          data-id="{{$comment->id}}">ارسال نظر  </span>


                            </td>
                        </tr>
                    @endforeach

                </table>

            </div>
            <div class="card-footer">
                {{$comments->render()}}

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div><!-- /.row -->




@endcomponent
