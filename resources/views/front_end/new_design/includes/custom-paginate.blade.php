@if ($paginator->hasPages())
  <div class="row" data-aos="zoom-in">
    <div class="col-md-12">
      <div class="d-flex align-items-center justify-content-center pagination_container">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
          <div class="pagination_item disabled">
            <a class="page-link disabled" aria-disabled="true" href="{{ $paginator->url($paginator->onFirstPage()) }}"
              rel="first"><i class="fas fa-angle-double-left"></i></a>
          </div>

          <div class="pagination_item disabled">
            <a class="page-link disabled" aria-disabled="true" href="{{ $paginator->previousPageUrl() }}"
              rel="prev"><i class="fas fa-angle-left"></i>
            </a>
          </div>
        @else
          <div class="pagination_item">
            <a class="page-link" href="{{ $paginator->url($paginator->onFirstPage()) }}" rel="first">
              <i class="fas fa-angle-double-left"></i></a>
          </div>
          <div class="pagination_item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
              <i class="fas fa-angle-left"></i></a>
          </div>
        @endif

        {{-- Number of Page.. --}}
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
          @if ($i == $paginator->currentPage())
            <div class="pagination_item current"> <a class="page-link">{{ $i }}</a>
            </div>
          @else
            <div class="pagination_item">
              <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </div>
          @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          <div class="pagination_item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
              <i class="fas fa-angle-right"></i></a>
          </div>

          <div class="pagination_item">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last">
              <i class="fas fa-angle-double-right"></i></a>
          </div>
        @else
          <div class="pagination_item disabled">
            <a class="page-link disabled" aria-disabled="true" href="{{ $paginator->nextPageUrl() }}" rel="next">
              <i class="fas fa-angle-right"></i></a>
          </div>
          <div class="pagination_item disabled">
            <a class="page-link disabled" aria-disabled="true" href="{{ $paginator->url($paginator->lastPage()) }}"
              rel="last"><i class="fas fa-angle-double-right"></i></a>
          </div>
        @endif

      </div>
    </div>
  </div>
@endif
