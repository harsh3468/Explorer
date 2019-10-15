
@if ($paginator->hasPages())
                <nav class="flexbox mt-30">
                @if ($paginator->onFirstPage())
                <a class="btn btn-white disabled"><h6>Newer Posts</h6></a>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white " ><h6>Newer Posts</h6></a>
                @endif
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white" ><h6>Older Posts</h6> </a>
                @else
                <a class="btn btn-white disabled" href="#"><h6>Older Posts</h6></a>
                @endif

              </nav>
@endif