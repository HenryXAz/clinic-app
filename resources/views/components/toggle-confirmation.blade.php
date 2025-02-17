@props(['active' => false, 'label' => ''])

<div class="flex gap-2">
    <p>{{$label}}</p>
    <p class="font-bold">{{($active) ? 'Sí' : 'No'}}</p>
</div>
