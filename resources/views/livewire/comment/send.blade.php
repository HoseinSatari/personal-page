<div id="respond2" class="comment-respond">
    @if($this->status == 1)
    <h2 id="reply-title2" class="title text-upper">دیدگاه خود را بیان کنید
        <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">انصراف از
                پاسخ</a></small>
    </h2>
    @endif
    <div class="padd-box-sm">
        <form action="#" method="post" id="commentform2" class="comment-form" novalidate="">
            @if($this->status == 1)
            <p class="comment-notes"><span id="email-notes">آدرس ایمیل شما نمایش داده نخواهد شد.</span><br>
                فیلد های الزامی با * علامت گذاری شده اند. <span class="required">*</span></p>
            @endif

            <div class="form-group">
                <label class="form-label" for="comment2">دیدگاه<span class="required">*</span></label>
                <div class="form-item-wrap">
                                <textarea class="form-item" id="comment2" wire:model="comment" cols="45" rows="8"
                                          maxlength="65525" aria-required="true" required="required"></textarea>
                    @error('comment') <span  style="color: #ed2e36">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="author">نام <span class="required">*</span></label>
                <div class="form-item-wrap">
                    <input class="form-item" id="author" wire:model="name" type="text" value="" size="30"
                           maxlength="245" aria-required="true" required="required">
                    @error('name') <span  style="color: #ed2e36">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">ایمیل </label>
                <div class="form-item-wrap">
                    <input class="form-item" id="email" wire:model="email" type="email" dir="ltr" value=""
                           size="30" maxlength="100" aria-describedby="email-notes" aria-required="true">
                    @error('email') <span  style="color: #ed2e36">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="url">شماره</label>
                <div class="form-item-wrap">
                    <input class="form-item" id="url" wire:model="phone"  size="30"
                           maxlength="11">
                    @error('phone') <span  style="color: #ed2e36">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-submit form-item-wrap">
                <input class="btn btn-primary btn-lg" name="submit" onclick="event.preventDefault()" wire:click="store" type="submit" value="ارسال دیدگاه">
            </div>
        </form>
    </div>
</div><!-- #respond -->
