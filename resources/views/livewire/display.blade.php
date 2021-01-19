<div class="font-fira-code relative">
    @if($output === false)
        Parse Error: {{$error}}
    @else
        <button class="fixed bottom-0 right-0 mb-8 mr-8 border-2 bg-white font-semibold p-2 border-black" x-on:keydown.ctrl.shift.a.window.prevent="selectText(document.getElementById('open-api'))" x-data x-on:click.prevent="selectText(document.getElementById('open-api'))">Select All</button>
        <div class="p-5 whitespace-pre" id="open-api">{!! $output->toOpenApi(true) !!}</div>
    @endif
</div>
