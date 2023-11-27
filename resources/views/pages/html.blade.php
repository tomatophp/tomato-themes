@if($page && count($page->meta('sections') ?? []))
    @foreach(collect($page->meta('sections'))->sortBy('order') as $section)
        @include($section['section'], [
            'page' => $page,
            'section' => $section,
            'sectionID' =>$section['uuid']
        ])
    @endforeach
@else
    <div>
        {!! $page->body !!}
    </div>
@endif
