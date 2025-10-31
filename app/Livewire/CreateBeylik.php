<?php

namespace App\Livewire;

use App\Models\Beylik;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;

class CreateBeylik extends Component
{
    public ?string $selectedProvinceName = null;

    #[On('provinceSelected')]
    public function setProvince($payload): void
    {
        $name = is_array($payload) ? ($payload['name'] ?? null) : $payload;
        if ($name && isset($this->nameToId[$name])) {
            $this->selectedProvinceName = $name;
            $this->province_id = $this->nameToId[$name];
        }
    }
    #[Validate('required|string|min:3|max:40')]
    public string $name = '';

    #[Validate('required|integer|exists:geo_provinces,id')]
    public $province_id = '';

    public array $nameToId = [];
    public ?int $createdId = null;

    public function mount(): void
    {
        $this->nameToId = DB::table('geo_provinces')->pluck('id','name')->toArray();
    }

        public function create(): void
    {
        $this->validate();

        if (!$this->province_id && $this->selectedProvinceName && isset($this->nameToId[$this->selectedProvinceName])) {
            $this->province_id = $this->nameToId[$this->selectedProvinceName];
        }

        $this->validate([
            'province_id' => 'required|integer|exists:geo_provinces,id',
        ]);

        $beylik = Beylik::create([
            'name' => $this->name,
            'province_id' => $this->province_id,
            'user_id' => null,
            'is_active' => true,
        ]);

        $this->createdId = $beylik->id;
        $this->reset(['name','province_id']);
        $this->selectedProvinceName = null;
        session()->flash('ok', 'Beylik oluşturuldu.');
    }

    public function render()
    {
        return view('livewire.create-beylik');
    }
}
