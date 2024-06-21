@if ($paginator->lastPage() > 1)

    <ul class="pagination">
        <li class="{{ $paginator->currentPage() == 1 ? ' disabled' : '' }}">
            <a class="paginate-link" href="{{ $paginator->url(1) }}">
                <i class="fas fa-angle-double-left"></i>
            </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ $paginator->currentPage() == $i ? ' active' : '' }}">
                <a class="paginate-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>

        @endfor
        <li class="{{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a class="paginate-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}">
                <i class="fas fa-angle-double-right"></i>
            </a>
        </li>
    </ul>
@endif
