<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $paginate = 5;
    public $search;
    public $name, $phone, $contactId;
    public $isUpdate = false;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'contactStored' => 'handleStored',
        'cancelUpdate' => 'cancelButton',
        'update' => 'handleUpdate'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.contact-index',  [
            'contacts' => $this->search === null ? 
            Contact::latest()->paginate($this->paginate)->withQueryString() :
            Contact::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->paginate),
            'active' => 'contacts'
        ]);
    }

    public function getContact($id)
    {
        $this->isUpdate = true;
        $contacts = Contact::find($id);
        // $this->emit('getContact', $contacts);
        
        $this->name = $contacts["name"];
        $this->phone = $contacts["phone"];
        $this->contactId = $contacts["id"];
        // $this->dispatchBrowserEvent('show-view-modal');
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
        }
        $this->isUpdate = false;
        session()->flash('success', 'Contact '. $this->name .' successfully Updated !');
        $this->name = '';
        $this->phone = '';
        $this->contactId = '';

        $this->dispatchBrowserEvent('hide-edit-modal');

    }

    public function cancelButton()
    {
        $this->isUpdate = false;
        $this->name = '';
        $this->phone = '';
    }

    public function handleStored($hasil)
    {
        session()->flash('success', 'Contact '. $hasil["name"] .' successfully Added.');
    }

    public function handleUpdate($name)
    {  
        session()->flash('success', 'Contact '. $name .' successfully Updated !');
    }

    public function destroy($id)
    {
        Contact::destroy($id);

        session()->flash('success', 'Contact berhasil dihapus!');
    }
}
