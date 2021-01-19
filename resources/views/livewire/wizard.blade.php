<div class="overflow-auto h-screen">
    @if($output === false)
        Parse Error: {{$error}}
    @endif
    <div class="hidden" id="spec-json">{!! $output !== false ? $output->toOpenApi(true)  : ''!!}</div>
    <div id="display"></div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('element.updated', (el, component) => {
            // console.log(component.fingerprint.name)
            if (component.fingerprint.name === 'wizard') {
                console.log('updating..')
                try {
                    let spec = JSON.parse(document.getElementById('spec-json').innerHTML);
                    let domNode = document.getElementById('display');
                    setTimeout(() => window.instance = SwaggerUI({spec, domNode}), 250)
                } catch (e) {
                }
            }
        })
    })
</script>

