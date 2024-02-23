@if(session('success'))
<div class="mt-2" style="max-width: 250px;">
    <x-adminlte-callout theme="info" title="Info" dismissable>
        {{ session('success') }}
    </x-adminlte-callout>
</div>
@elseif(session('error'))
<div class="mt-2" style="max-width: 250px;">
    <x-adminlte-callout theme="danger" title="Error" dismissable>
        {{ session('error') }}
    </x-adminlte-callout>
</div>
@endif
