<div id="about" class="crt-paper-layers crt-animate"  >

    <div class="crt-paper clearfix">
        <div class="crt-paper-cont paper-padd clear-mrg">

            <section class="section brd-btm padd-box">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title-lg text-upper">درباره من</h2>

                        <div class="text-box">
                            <p class="description">
                                {{ $info->about }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <div class="row">
                    <div class="col-sm-9">

                        <!-- .crt-share -->
                    </div>
                    <div class="col-sm-3 text-right">
                        <img src="/emza.png" style="width: 97px;height: 89px" alt="signature">
                    </div>
                </div>
                <!-- .row -->
            </section>
            <!-- .section -->

            <section class="section padd-box">
                <div class="row">
                    <div class="col-sm-6 clear-mrg">
                        <h2 class="title-thin text-muted">اطلاعات شخصی</h2>

                        <dl class="dl-horizontal clear-mrg">
                            <dt>نام کامل</dt>
                            <dd>{{$info->name}}</dd>

{{--                            <dt>تاریخ تولد</dt>--}}
{{--                            <dd>{{jdate($info->birth)->format('Y-%m-%d')}}</dd>--}}

                            <dt>ایمیل</dt>
                            <dd><a href="mailto:{{$info->email}}">{{$info->email}}</a></dd>

                            <dt>تلفن</dt>
                            <dd><span class="ltr-text"><a href="tel:{{$info->phone}}">{{$info->phone}}</a></span></dd>

                            <dt>سال فعالیت</dt>
                            <dd>{{$info->year_work}}</dd>
                        </dl>
                    </div>
                    <!-- .col-sm-6 -->

                    <div class="col-sm-6 clear-mrg">
                        <h2 class="title-thin text-muted">زبان ها</h2>

                        <div class="progress-bullets crt-animate" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">
                            <strong class="progress-title">انگلیسی</strong>
                            <span class="progress-bar">
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
											</span>
                            <span class="progress-text text-muted">خواندن</span>

                            <span class="progress-bar">
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
											</span>
                            <span class="progress-text text-muted">نوشتن</span>

                            <span class="progress-bar">
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
											</span>
                            <span class="progress-text text-muted">گفتاری</span>

                            <span class="progress-bar">
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet fill"></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
												<span class="bullet "></span>
											</span>
                            <span class="progress-text text-muted">شنیداری</span>

                        </div>

                    </div>
                    <!-- .col-sm-6 -->
                </div>
                <!-- .row -->
            </section>
            <!-- .section -->

        </div>
        <!-- .crt-paper-cont -->
    </div>

    <!-- .crt-paper -->
</div>
