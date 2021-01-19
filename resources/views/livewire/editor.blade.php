<div x-data class="font-fira-code h-screen overflow-auto">
    <textarea id="editor" cols="30" rows="10" x-on:keydown.ctrl.s.window.prevent="livewire.emit('update', document.getElementById('editor').value)">{!! cache()->get('editor-state') !!}</textarea>
</div>
<script>
    // https://stackoverflow.com/a/10311375/5211299

    window.onbeforeunload = function (e) {
        e = e || window.event;
        e && (e.returnValue = 'Sure?')
        return 'Sure?';
    };


    let editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
        lineNumbers: true,
        mode: 'text/x-yaml',
    });
    editor.setSize('100%', '100%')
    editor.on('change', instance => {
        // livewire.emit('update',instance.getValue())
        // @this.value = instance.getValue();
        // window.livewire.emit('input',instance.getValue());
        // component.value = instance.getValue()
        document.getElementById('editor').value = instance.getValue()
        // window.livewire.emit('bodyUpdate',instance.getValue());
    })
</script>
