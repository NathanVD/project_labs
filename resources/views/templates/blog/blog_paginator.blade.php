@if ($paginator->hasPages())
    <nav>
        <ul class="page-pagination">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="page-link active" aria-current="page">{{ $page <= 9 ? '0'.$page.'.' : $page.'.' }}</a>
                        @else
                            <a class="page-link" href="{{ $url }}">{{ $page <= 9 ? '0'.$page.'.' : $page.'.' }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
          {{-- <div class="page-pagination">
            <a class="active" href="">01.</a>
            <a href="">02.</a>
            <a href="">03.</a>
          </div> --}}