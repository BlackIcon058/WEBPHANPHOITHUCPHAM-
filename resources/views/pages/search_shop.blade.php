@if ($paginator->hasPages())
<div class="pagination">
    <button class="pagination-btn prev" path="tieu-thuyet">
        <!-- <ion-icon name="chevron-back-outline"></ion-icon> -->
        <a style="color: #fff;" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </button>

    <div class="pages">
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <a class="pagination-btn">{{ $element }}</a>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a href="#" class="pagination-btn active">{{ $page }}</a>
        @else
        <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    <button class="pagination-btn next" path="tieu-thuyet">
        <a style="color: #fff;" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
            <ion-icon name="chevron-forward-outline"></ion-icon>
        </a>

    </button>
</div>
@endif