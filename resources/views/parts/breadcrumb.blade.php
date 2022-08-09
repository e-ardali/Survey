<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center justify-content-lg-start">
        <li class="breadcrumb-item">
            <a class="text-primary" href="{{ route('home') }}">داشبورد</a>
        </li>
        @if(count($breadcrumb_items))
            @foreach($breadcrumb_items as $breadcrumb_item)
                @if (!$loop->last)
                    <li class="breadcrumb-item">
                        <a class="text-primary" href="{{ $breadcrumb_item['url'] }}">
                            {!! $breadcrumb_item['text'] !!}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">
                        {!! $breadcrumb_item['text'] !!}
                    </li>
                @endif
            @endforeach
        @endif
    </ol>
</nav>



