
    <div class="pagination">
        @if ($paginator->hasPages())
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <a class="prev page-numbers" onclick="event.preventDefault()" ><i class="crt-icon crt-icon-chevron-right" style="color: black"></i></a>
                @else
                <a class="prev page-numbers" onclick="event.preventDefault()" wire:click="previousPage"><i class="crt-icon crt-icon-chevron-right" ></i></a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
{{--                    @if (is_string($element))--}}
{{--                        <li class="page-item disabled d-none d-md-block" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--                    <span class="page-numbers current" style="color: black">sdfsd</span>--}}
{{--                    @endif--}}

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                            <span class="page-numbers current" style="color: black">{{ $page }}</span>
                            @else
                            <a class="page-numbers" href="" onclick="event.preventDefault()" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <a class="next page-numbers" onclick="event.preventDefault()" wire:click="nextPage"><i class="crt-icon crt-icon-chevron-left"></i></a>
                @else
                <a class="next page-numbers" onclick="event.preventDefault()"><i class="crt-icon crt-icon-chevron-left" style="color: black"></i></a>
                @endif
        @endif
    </div>

