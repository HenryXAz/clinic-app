@props(['class' => ''])

<div
    class="{{$class . ' max-w-xl mx-auto mt-5 p-4 shadow-lg dark:shadow-none rounded-md border border-gray-300 dark:border-gray-700'}}">
    {{$slot}}
</div>
