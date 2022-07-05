<ol class="children clear-list">
    <li class="comment bypostauthor">
        <article class="comment-body">
            <header class="comment-header">
                <div class="comment-author vcard">
                    <img alt=""
                         src="@if($comment->user and $comment->user->issuperuser()) {{\App\Models\info_basic::find(1)->img}} @else /assets/images/uploads/avatar/avatar-58x58-default.png @endif"
                         srcset="assets/images/uploads/avatar/avatar-116x116-01-2x.png 2x"
                         class="avatar avatar-58 photo" style="width: 58px;height: 58px">
                    <strong @if($comment->user and $comment->user->issuperuser()) class="fn" @endif><a onclick="event.preventDefault()"
                                                                                                       rel="external nofollow"
                                                                                                       class="url">{{$comment->name}}
                        </a></strong>
                </div>

                <div class="comment-date">
                    در <a href="#">
                        <time datetime="{{$comment->created_at}}">
                            {{jdate($comment->created_at)->format('d M Y h:i')}}
                        </time>
                    </a>
                </div>
            </header>

            <div class="comment-content clear-mrg">
                <span style="color: #0d6efd">@ {{ \App\Models\Comment::find($comment->parent_id)->name  }}</span>
                <p>
                    {{$comment->comment}}
                </p>
            </div>

            <footer class="comment-footer">
                <div class="comment-links">
                    <a class="comment-reply-link" rel="nofollow"
                       onclick="comment_answer({{$comment->id}});event.preventDefault()"
                       aria-label="Reply to Mr {{$comment->name}}">پاسخ</a>
                </div>
                <div class="comment-answer" id="comment_{{$comment->id}}">
                    <livewire:comment.send :obj="$article" :status="0" :commentable_type="get_class($article)"
                                           :commentable_id="$article->id" :parent_id="$comment->id" />
                </div>
            </footer>
        </article><!-- .comment-body -->
    </li><!-- .comment -->
    @if($comment->child())
        @foreach($comment->child()->get() as $chi)
            @include('layouts.comment' , ['comment' => $chi])
        @endforeach
    @endif
</ol><!-- .children -->
