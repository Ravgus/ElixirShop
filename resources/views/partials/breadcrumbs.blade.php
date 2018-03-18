@if (count($breadcrumbs))
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul class="breadcrumbs_list">
                    @foreach ($breadcrumbs as $breadcrumb)

                        @if ($breadcrumb->url && !$loop->last)
                            <li class="breadcrumbs_item">
                                <a href="{{ $breadcrumb->url }}" class="breadcrumbs_link"> {{ $breadcrumb->title }} </a>
                            </li>
                        @else
                            <li class="breadcrumbs_item active">
                                <a href="#" class="breadcrumbs_link"> {{ $breadcrumb->title }} </a>
                            </li>
                        @endif

                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif

