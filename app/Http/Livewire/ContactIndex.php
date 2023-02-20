<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    public $isUpdate = false;
    public $paginate = 5;
    public $search;

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
        $this->emit('getContact', $contacts);

    }

    public function cancelButton($status)
    {
        $this->isUpdate = $status;
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
