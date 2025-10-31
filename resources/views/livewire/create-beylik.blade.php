<div>
    <h2 style="margin:0 0 12px">Beylik Oluştur</h2>

    @if (session('ok'))
        <div style="background:#122b17;border:1px solid #1f4d2b;color:#a7f3d0;padding:8px 12px;border-radius:8px;margin-bottom:12px">
            {{ session('ok') }}
            @if($createdId)
                <div style="font-size:12px;color:#9aa0a6;margin-top:6px">ID: {{ $createdId }}</div>
            @endif
        </div>
    @endif

    <form wire:submit="create" style="display:grid;gap:10px">
        <div>
            <label>İsim</label>
            <input type="text" wire:model.defer="name" placeholder="Örn: Karesi" style="width:100%;padding:8px;border-radius:8px;border:1px solid #333;background:#0f1016;color:#f3f4f6" />
            @error('name') <div style="color:#fca5a5;font-size:12px">{{ $message }}</div> @enderror
        </div>
        <div>
            <label>İl</label>
            <select wire:model.defer="province_id" style="width:100%;padding:8px;border-radius:8px;border:1px solid #333;background:#0f1016;color:#f3f4f6">
                <option value="">Seçiniz…</option>
                @foreach($this->provinces as $id => $n)
                    <option value="{{ $id }}">{{ $n }}</option>
                @endforeach
            </select>
            @error('province_id') <div style="color:#fca5a5;font-size:12px">{{ $message }}</div> @enderror
        </div>
        <div>
            <button type="submit" style="padding:10px 14px;border-radius:8px;background:#22c55e;color:#0b0b0f;border:0">Oluştur</button>
        </div>
    </form>
</div>
