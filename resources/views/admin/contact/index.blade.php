@component('admin.layout.content' , ['title' => 'پیام ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   پیام ها</li>

    @endslot


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">  پیام ها </h3>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>شماره تماس</th>
                        <th>ایمیل </th>
                        <th>متن پیام</th>
                        <th>اقدامات</th>
                    </tr>
                    @foreach($contacts as $contact)
                        <tr>
                            <td  class="text-align-center">{{$loop->index}}</td>
                            <td  class="text-align-center">{{$contact->name}}</td>
                            <td  class="text-align-center">{{$contact->phone}}</td>
                            <td  class="text-align-center">{{$contact->email}}</td>
                            <td  class="text-align-center">{{$contact->text}}</td>
                            <td  class="text-align-center">
                                <form method="post" action="{{route('contact.delete' , $contact->id)}}">
                                    @csrf
                                    @method('delete')
                                    @if(!$contact->seen)
                                        <a href="" onclick="event.preventDefault(); document.getElementById('seen').submit()" class="btn btn-sm btn-success" oncancel="document.getElementById('seen').submit()"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @endif
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('آیا مایل به حذف هستید؟')"  title="حذف"
                                    >حذف</button>
                                </form>
                                <form action="{{route('contact.approved' , $contact->id)}}" id="seen" method="post">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{$contacts->render()}}

            </div>
        </div>
        <!-- /.card -->
    </div>
    </div><!-- /.row -->


@endcomponent
