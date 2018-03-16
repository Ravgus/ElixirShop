<section class="pagination">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="pagination_wrap">

                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="pagination_control disabled"><i class="fa fa-angle-left" aria-hidden="true"></i></li>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="pagination_control"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        @endif

                        <ul class="pagination_list">
                            {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <li class="pagination_item disabled"><span class="pagination_link">{{ $element }}</span></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="pagination_item active"><span class="pagination_link">{{ $page }}</span></li>
                                        @else
                                            <li class="pagination_item"><a href="{{ $url }}" class="pagination_link">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="pagination_control"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        @else
                            <li class="pagination_control disabled"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        @endif

                </div>
            </div>
        </div>
    </div>
</section>