<div class="crt-paper-layers">
    @section('title' , 'بلاگ')
    @section('subject' , 'صفحه بلاگ')
    <div class="crt-paper clearfix">
        <div class="crt-paper-cont paper-padd clear-mrg">

            <header class="page-header padd-box">
                <h1 class="title-lg">بلاگ</h1>
            </header>

            <div wire:init="load">
                @if($readyToLoad)
                    @foreach($articles as $item)
                        <livewire:blog.item :key="$item->id" :article="$item" />

                    @endforeach
                        {{$articles->render()}}
                @else
                    <div class="loading">
                        <div class="loading-text">
                            <span class="loading-text-words">G</span>
                            <span class="loading-text-words">N</span>
                            <span class="loading-text-words">I</span>
                            <span class="loading-text-words">D</span>
                            <span class="loading-text-words">A</span>
                            <span class="loading-text-words">O</span>
                            <span class="loading-text-words">L</span>
                        </div>
                    </div>
                @endif
            </div>


        </div>
        <!-- .crt-paper-cont -->
    </div>
    <!-- .crt-paper -->
</div>
