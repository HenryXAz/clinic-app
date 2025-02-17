@props(['class' => ''])

<div class="{{$class . ' w-full flex gap-2 flex-col md:flex-row justify-between items-center'}}">
    {{$slot}}
</div>
