
<div class="mb-4">
    @isset($page_title)
        <h1 class="text-center text-secondary">
            <b>{!! $page_title !!}</b>
        </h1>
        {!! $result ?? "" !!}
    @endisset
</div>
