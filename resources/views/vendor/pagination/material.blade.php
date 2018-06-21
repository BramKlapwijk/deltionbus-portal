@if ($paginator->hasPages())
    <div class="mdl-grid" style="width: 50%">
        @if ($paginator->onFirstPage())
            <div class="mdl-cell mdl-cell--1-col disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </div>
        @else
            <div class="mdl-cell mdl-cell--1-col">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </div>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="mdl-cell mdl-cell--1-col disabled" aria-disabled="true"><span>{{ $element }}</span></div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="mdl-cell mdl-cell--1-col disabled" aria-current="page"><span>{{ $page }}</span>
                        </div>
                    @else
                        <div class="mdl-cell mdl-cell--1-col"><a href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <div class="mdl-cell mdl-cell--1-col">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </div>
        @else
            <div class="mdl-cell mdl-cell--1-col disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </div>
        @endif
        {{--<div class="mdl-cell mdl-cell--4-col">Content</div>--}}
        {{--<div class="mdl-cell mdl-cell--4-col">goes</div>--}}
        {{--<div class="mdl-cell mdl-cell--4-col">here</div>--}}
    </div>
@endif
