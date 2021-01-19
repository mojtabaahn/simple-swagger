<div class="">
    @if($output === false)
        Parse Error: {{$error}}
    @else
        <div class="font-rubik">

            <div class="grid grid-cols-2 gap-5 p-5 border-b">
                <div>Project:</div>
                <div>{{$output->title}}</div>
                <div>Version:</div>
                <div>{{$output->version}}</div>
                <div>Server:</div>
                <div>{{$output->server}}</div>
            </div>

            @foreach($output->paths as $path)
                <div x-data="{isOpen : false}">
                    <button class="block w-full focus:outline-none text-left border-b p-5" x-on:click="isOpen = !isOpen">
                        <span class="inline-block w-24">
                            @php
                            $methodClass = [
                            'get' => 'text-green-700 border-green-700 bg-green-200',
                            'post' => 'text-blue-700 border-blue-700 bg-blue-200',
                            'delete' => 'text-red-700 border-red-700 bg-red-200',
                            'patch' => 'text-yellow-700 border-yellow-700 bg-yellow-200',
                            ][$path->method];
                            @endphp
                            <span class="inline-block uppercase border w-20 font-light text-center {{$methodClass}}">{{$path->method}}</span>
                        </span>
                        {{$path->path}}
                    </button>
                    <div x-bind:class="{'hidden' : !isOpen}" class="border-b grid grid-cols-3 gap-5 p-5 border-b">
                        {{--<x-detail title="Method" slot-class="uppercase">{{$path->method}}</x-detail>--}}
                        {{--<x-detail title="Path" slot-class="break-words" class="col-span-2">{{$path->path}}</x-detail>--}}
                        <x-detail title="Group">{{$path->group}}</x-detail>
                        <x-detail title="Summary" class="col-span-2">{{$path->summary}}</x-detail>
                        <x-detail class="col-span-3" title="Description">{{$path->description}}</x-detail>
                        <x-detail class="col-span-3" title-class="mb-2" title="Parameters">
                            <div class="grid gap-4">
                                @foreach($path->parameters as $param)
                                    <div class="grid grid-cols-3 gap-5">
                                        <x-detail title="Name">
                                            {{$param->name}}
                                            @if($param->required)
                                                <span class="text-red-600 font-bold">*</span>
                                            @endif
                                        </x-detail>
                                        <x-detail title="Type" class="col-span-2">{{$param->type}}</x-detail>
                                        <x-detail title="Description" class="col-span-3">{{$param->description}}</x-detail>
                                        <x-detail title="Example" class="col-span-3">
                                            <pre class="bg-gray-800 text-white rounded-xs font-fira-code p-2 mt-1">{{json_encode($param->example,JSON_PRETTY_PRINT) ?? '—'}}</pre>
                                        </x-detail>
                                    </div>
                                @endforeach
                            </div>
                        </x-detail>
                        <x-detail class="col-span-3" title-class="mb-2" title="Responses">
                            <div class="grid gap-4">
                                @foreach($path->responses as $response)
                                    <div class="grid grid-cols-3 gap-5">
                                        <x-detail title="Code">{{$response->code}}</x-detail>
                                        <x-detail title="Description" class="col-span-2">{{$response->description}}</x-detail>
                                        <x-detail title="Example" class="col-span-3">
                                            <pre class="bg-gray-800 text-white rounded-xs font-fira-code p-2 mt-1">{{json_encode($response->example,JSON_PRETTY_PRINT) ?? '—'}}</pre>
                                        </x-detail>
                                    </div>
                                @endforeach
                            </div>
                        </x-detail>
                    </div>
                </div>
                {{--<div>{!! var_dump($path) !!}</div>--}}
            @endforeach

        </div>
    @endif
</div>
