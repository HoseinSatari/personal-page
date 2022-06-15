<ul class="list-group list-group-flush">
    @foreach($categories as $cate)
        <li class="list-group-item">
            <div class="d-flex">
                <span>{{ $cate->title }}</span>

                <div class="actions mr-2">
                    <form action="{{ route('category_post.destroy', $cate->id) }}" id="cate-{{ $cate->id }}-delete"
                          method="POST">
                        @csrf
                        @method('delete')
                    </form>
                    @if(!request()->delete)

                        <a href="#"
                           onclick="event.preventDefault(); document.getElementById('cate-{{ $cate->id }}-delete').submit()"
                           class="badge badge-danger">حذف</a>


                        <a href="{{ route('category_post.edit' , $cate->id) }}" class="badge badge-primary">ویرایش</a>


                        <a href="{{ route('category_post.create') }}?parent={{ $cate->id }}"
                           class="badge badge-warning">ثبت زیر دسته</a>

                        <span class="badge badge-success">
                            {{$cate->order_number}} - ترتیب
                            </span>
                        @if($cate->parent_id == null)
                            <span class="badge badge-secondary">
                                دسته پدر
                            </span>
                        @endif
                    @else
                        <form action="{{ route('categorya.restor' , $cate->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-success btn-sm">برگشت از حذف</button>
                        </form>

                    @endif
                </div>
            </div>
            @if($cate->child->count())
                @include('admin.article.category.list-group' , [ 'categories' => $cate->child])
            @endif
        </li>
    @endforeach
</ul>
