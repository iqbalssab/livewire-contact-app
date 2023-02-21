<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactModal extends Component
{
    public $contact;

    public function render()
    {
        return view('livewire.contact-modal', [
            'contact' => $this->contact
        ]);
    }

    public function getContact($id)
    {
        $contacts = Contact::find($id);
        $this->emit('getContact', $contacts);
    }
}
