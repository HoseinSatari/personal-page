@component('admin.layout.content' , ['title' => 'نمایش  مقاله   '])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}"> لیست  مقالات </a> </li>
        <li class="breadcrumb-item"> نمایش   مقاله</li>

    @endslot
    <div class="full">
        @php echo $article->body  @endphp
    </div>


@endcomponent


