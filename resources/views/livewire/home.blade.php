<div class="bg-white tw-w-full h-screen grid grid-cols-2 divide-x divide-gray-200">
    <livewire:editor key="editor"/>
    {{--<livewire:wizard />--}}
    <div>
        <div class="grid grid-cols-3 h-16">
            <button class="p-4 border-b focus:outline-none {{$this->tab === 'display' ? 'border-blue-700 text-blue-700' : ''}}" wire:click="setTab('display')">Open Api</button>
            <button class="p-4 border-b focus:outline-none {{$this->tab === 'summary' ? 'border-blue-700 text-blue-700' : ''}}" wire:click="setTab('summary')">Summary</button>
            <button class="p-4 border-b focus:outline-none {{$this->tab === 'reverse' ? 'border-blue-700 text-blue-700' : ''}}" wire:click="setTab('reverse')">Reverse</button>
        </div>

        <div class="overflow-auto" style="height: calc(100vh - 4rem)">
            <div class="{{$tab === 'display' ? '' : 'hidden'}}">
                <livewire:display key="display"/>
            </div>
            <div class="{{$tab === 'summary' ? '' : 'hidden'}}">
                <livewire:summary key="summary"/>
            </div>
            <div class="{{$tab === 'reverse' ? '' : 'hidden'}}">
                <livewire:reverse key="reverse"/>
            </div>
        </div>
    </div>
</div>
