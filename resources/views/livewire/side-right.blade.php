<div id="crt-side-box-wrap" class="crt-sticky" wire:init="load">
    @if($readyToLoad)
    <div  id="crt-side-box">

        <div class="crt-side-box-item">

            <div class="crt-card bg-primary text-center">
                <div class="crt-card-avatar">
                    <img class="avatar avatar-195" src="{{\App\Models\info_basic::find(1)->img}}" srcset="{{\App\Models\info_basic::find(1)->img}} 2x" width="195" height="195" alt="">
                </div>
                <div class="crt-card-info">
                    <h2>حسین ستاری </h2>

                    <p class="text-muted">توسعه دهنده صفحات وب / بک اند</p>
                    <ul class="crt-social clear-list">
                        <li><a href="{{option()->stackoverflow}}" title="StackOverFlow"><span class="crt-icon crt-icon-stack-overflow"></span></a></li>
                        <li><a href="{{option()->github}}" title="GitHub"><span class="crt-icon crt-icon-github"></span></a></li>
                        <li><a href="{{option()->gitlab}}" title="GitLab"><span class="crt-icon crt-icon-gitlab"></span></a></li>
                        <li><a href="{{option()->twitter}}" title="Twitter"><span class="crt-icon crt-icon-twitter"></span></a></li>
                        <li><a href="{{option()->whatsup}}" title="WhatsUp"><span class="crt-icon crt-icon-whatsapp"></span></a></li>
                        <li><a href="{{option()->instagram}}" title="InstaGram"><span class="crt-icon crt-icon-instagram"></span></a></li>
                        <li><a href="{{option()->telegram}}" title="Telegram"><span class="crt-icon crt-icon-telegram"></span></a></li>
                        <li><a href="{{option()->linkdin}}" title="Telegram"><span class="crt-icon crt-icon-linkedin"></span></a></li>
                    </ul>
                </div>
            </div>
{{--            <div class="crt-side-box-btn">--}}
{{--                <a class="btn btn-default btn-lg btn-block btn-thin btn-upper" href="#">دریافت رزومه</a>--}}
{{--            </div>--}}
        </div><!-- .crt-side-box-item -->

    </div><!-- #crt-side-box -->
    @endif
</div>
