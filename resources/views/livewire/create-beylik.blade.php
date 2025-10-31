<div id="create-beylik-root">
    <h2 style="margin:0 0 12px">Beylik Oluştur</h2>

    @if (session('ok'))
        <div style="background:#122b17;border:1px solid #1f4d2b;color:#a7f3d0;padding:8px 12px;border-radius:8px;margin-bottom:12px">
            {{ session('ok') }}
            @if($createdId)
                <div style="font-size:12px;color:#9aa0a6;margin-top:6px">ID: {{ $createdId }}</div>
            @endif
        </div>
    @endif

    <form wire:submit="create" style="display:grid;gap:10px; margin-bottom:16px">
        <div>
            <label>İsim</label>
            <input type="text" wire:model.defer="name" placeholder="Örn: Karesi" style="width:100%;padding:8px;border-radius:8px;border:1px solid #333;background:#0f1016;color:#f3f4f6" />
            @error('name') <div style="color:#fca5a5;font-size:12px">{{ $message }}</div> @enderror
        </div>
        <div class="muted">Seçilen il: <strong>{{ $selectedProvinceName ?: '—' }}</strong></div>
        <div>
            <button type="submit" style="padding:10px 14px;border-radius:8px;background:#22c55e;color:#0b0b0f;border:0">Oluştur</button>
        </div>
    </form>

    <div wire:ignore>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dnomak/svg-turkiye-haritasi@master/css/svg-turkiye-haritasi.css">
        @include('partials.turkiye-map')
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function(){
        const el = document.getElementById('svg-turkiye-haritasi');
        if (!el) return;
        el.addEventListener('click', function(e){
            const t = e.target;
            if(!t || t.tagName.toLowerCase() !== 'path') return;
            const g = t.parentNode;
            const name = g && g.getAttribute('data-iladi');
            if(!name) return;
            e.preventDefault(); e.stopPropagation();
            const root = document.getElementById('create-beylik-root');
            const lwRoot = root && root.closest('[wire\\:id]');
            const comp = lwRoot && window.Livewire && Livewire.find ? Livewire.find(lwRoot.getAttribute('wire:id')) : null;
            if (comp) { comp.call('setProvince', name); }
        });
    });
    </script>
</div>