<div class="font-fira-code relative">
    <button class="fixed bottom-0 right-0 mb-8 mr-8 border-2 bg-white font-semibold p-2 border-black" x-on:keydown.ctrl.shift.q.window.prevent="selectText(document.getElementById('reverse'))" x-data x-on:click.prevent="selectText(document.getElementById('reverse'))">Select All</button>
    <div id="reverse" class="p-5 whitespace-pre">{!! $reverse !!}</div>
</div>
