<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Http\Request;

class ContactCreate extends Component
{
   public $name;
   public $phone;

   protected $rules = [
    'name' => 'required|max:100',
    'phone' => 'required|max:15'
   ];

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store ()
    {
        $this->validate();

        // kalo validasi berhasil
        $hasil = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        // reset form
        $this->reset(['name', 'phone']);
 
        // reload table nya aja
        $this->emit('contactStored', $hasil);
    }
}
