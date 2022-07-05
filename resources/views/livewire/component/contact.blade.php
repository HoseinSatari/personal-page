<div id="contact" class="crt-paper-layers crt-animate" wire:ignore.self >
    <div class="crt-paper clearfix" style="height: 49rem">
        <div class="crt-paper-cont paper-padd clear-mrg" >
            <div class="padd-box">
                <h2 class="title-lg text-upper" >با من تماس بگیرید</h2>

                <div class="padd-box-xs" >
                    <header class="contact-head">
                        <ul class="crt-social clear-list text-primary">
                            <li><a href="{{$option->whatsup}}"><span class="crt-icon crt-icon-whatsapp"></span></a></li>
                            <li><a href="{{$option->twitter}}"><span class="crt-icon crt-icon-twitter"></span></a></li>
                            <li><a href="{{$option->linkdin}}"><span class="crt-icon crt-icon-linkedin"></span></a></li>
                            <li><a href="{{$option->instagram}}"><span class="crt-icon crt-icon-instagram"></span></a></li>
                            <li><a href="{{$option->telegram}}"><span class="crt-icon crt-icon-telegram"></span></a></li>
                        </ul>
                        <h3 class="title primary-font">برای تماس با من راحت باشید</h3>
                    </header>
                </div>


                <div class="padd-box-sm" wire:ignore.self>
                    <form   class="contact-form">

                        <div class="form-group">
                            <label class="form-label" for="author">نام شما <span style="color:#d14b4a;font-size: 16px">*</span></label>
                            <div class="form-item-wrap">
                                <input id="author" class="form-item" wire:model="name" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">ایمیل </label>
                            <div class="form-item-wrap">
                                <input id="email" class="form-item" wire:model="email" type="email" dir="ltr" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="subject">شماره </label>
                            <div class="form-item-wrap">
                                <input id="subject" class="form-item" wire:model="phone" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="comment"> دیدگاه شما <span style="color:#d14b4a;font-size: 16px">*</span></label>
                            <div class="form-item-wrap">
                                <textarea id="message" class="form-item" wire:model="text" required></textarea>
                            </div>
                        </div>

                        <div class="form-submit form-item-wrap">
                            <input class="btn btn-primary btn-lg" type="submit" oncancel="event.preventDefault()" wire:click="store" value="ارسال پیام">
                        </div>
                    </form>
                    <ul>
                         @error('name')<li style="display: flex;color: #d14b4a;">{{ $message }}</li>@enderror
                        @error('phone')<li style="display: flex;color: #d14b4a;">{{ $message }}</li>@enderror
                       @error('email') <li style="display: flex;color: #d14b4a;">{{ $message }}</li>@enderror
                       @error('text') <li style="display: flex;color: #d14b4a;">{{ $message }}</li>@enderror
                    </ul>
                </div>
            </div><!-- .padd-box -->

            <div id="map" data-latitude="38.064957" data-longitude="46.327604"></div>
        </div>
        <!-- .crt-paper-cont -->
    </div>
    <!-- .crt-paper -->
</div>
