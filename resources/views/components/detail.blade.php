@props(['title','titleClass' => '','slotClass' => '','class' => ''])
<div class="{{$class}}">
    <div class="text-gray-500 text-sm {{$titleClass}} flex items-center justify-between">
        <div>{{$title}}</div>
        <div>{!! $badge ?? '' !!}</div>
    </div>
    <div class="{{$slotClass}}">{!! $slot !!}</div>
</div>
