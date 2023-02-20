<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;
    public $isUpdate;

    protected $listeners = [
        'getContact' => 'showContact',
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact($contact)
    {
        $this->name = $contact["name"];
        $this->phone = $contact["phone"];
        $this->contactId = $contact["id"];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:15'
        ]);
        if ($this->contactId) {
            $contact = Contact::find($this->contactId);
            
            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);
            
            $this->cancelUpdate();
            $this->emit('update', $this->name);
        }
    }

    public function cancelUpdate()
    {
        $this->isUpdate = false;
        $status = $this->isUpdate;
        $this->emit('cancelUpdate', $status);
    }

    
}
