<?php

namespace App\Livewire;

use App\Models\Beylik;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateBeylik extends Component
{
    #[Validate('required|string|min:3|max:40')]
    public string $name = '';

    #[Validate('required|integer|exists:geo_provinces,id')]
    public $province_id = '';

    public array $provinces = [];
    public ?int $createdId = null;

    public function mount(): void
    {
        $this->provinces = DB::table('geo_provinces')
            ->orderBy('name')
            ->pluck('name','id')
            ->toArray();
    }

    public function create(): void
    {
        $this->validate();

        $beylik = Beylik::create([
            'name' => $this->name,
            'province_id' => $this->province_id,
            'user_id' => null,
            'is_active' => true,
        ]);

        $this->createdId = $beylik->id;
        $this->reset(['name','province_id']);
        session()->flash('ok', 'Beylik oluşturuldu.');
    }

    public function render()
    {
        return view('livewire.create-beylik');
    }
}
