<article class="post hentry mb-article">
    <div class="post-media">
        <a href="{{route('single' , $article->slug)}}" rel="bookmark">
            <figure class="post-figure">
                <img src="{{$article->poster}}" alt="{{$article->title}}" style="height: 313px;width: 100%">
            </figure>
        </a>
    </div>

    <div class="padd-box-sm">
        <header class="post-header text-center">
            <h2 class="post-title entry-title"><a rel="bookmark" href="{{route('single' , $article->slug)}}">
                    {{$article->title}}
                    </a></h2>

            <div class="post-header-info">
											<span class="posted-on">
												<span class="screen-reader-text">ارسال در </span>
												<a href="#" rel="bookmark">
													<time class="post-date published"
                                                          datetime="{{$article->created_at}}">{{jdate($article->created_at)->format('d M Y')}}</time>
													<time class="post-date updated"
                                                          datetime="{{$article->updated_at}}">{{jdate($article->updated_at)->format('d M Y')}}</time>
												</a>
											</span>
                <span class="post-author vcard">، توسط  <a class="url fn n" href="#"
                                                           rel="author">{{$article->user->name}}</a></span>
            </div>
        </header>

        <div class="post-content entry-content editor clearfix clear-mrg">
            @if($article->is_active == 1)
            <p>{{ $article->short_descrip }}</p>
            @else
             <p class="text-center text-danger">این مقاله غیر فعال است</p>
            @endif
        </div>

        <footer class="post-footer">
            <div class="post-footer-top brd-btm d-flex justify-content-between">
                <div class="post-footer-info">
												<span class="post-cat-links">
													<span class="screen-reader-text">دسته ها</span>
                                                    @foreach($article->category()->get() as $item)
													<a href="{{route('blog' ,['cateogry' => $item->slug ])}}" rel="category tag">{{$item->title}}</a> @if(!$loop->last) ، @endif
                                                    @endforeach

												</span>
                    <span class="post-line">|</span>
                    <a href="" class="post-comments-count">{{$article->comments()->count()}} دیدگاه</a>
                </div>

                <div class="post-more">
                    <a class="btn btn-sm btn-primary" href="{{route('single' , $article->slug)}}" rel="bookmark">بیشتر
                        بخوانید</a>
                </div>
            </div>
        </footer>
    </div>
</article><!-- .post -->
