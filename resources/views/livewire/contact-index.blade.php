    <div>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1>Tambah Kontak</h1>
    <hr />
        @if ($isUpdate)
        <div class="d-flex justify-content-center mb-4 border p-2">
            <livewire:contact-update />
        </div>
        
        @else
        <div class="d-flex justify-content-center mb-4 border p-2">
            <livewire:contact-create />
        </div>

        @endif
        <h1>Daftar Kontak</h1>
        
        <hr />
        
        <div class="row">
            <div class="col">
                <select wire:model="paginate" class="form-select sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="col">
                <form wire:model="search" class="d-flex" role="search">
                    <input class="form-control border-success me-2" type="search" placeholder="Search Contacts Here..." aria-label="Search">
                  </form>
            </div>
        </div>
        
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        {{-- Tampil Data --}}
                        <a href="/contacts/{{ $contact->id }}" class="badge bg-primary text-light mb-1"><span class="bi bi-eye fs-5" width="20px" height="20px"></span></a>
                        {{-- Edit --}}
                        <button wire:click='getContact({{ $contact->id }})' class="badge bg-warning text-dark fw-bold mb-1 border-0"><span class="bi bi-pencil-square fs-5" width="20px" height="20px"></span></button>
                        {{-- Delete --}}
                        <form wire:submit.prevent="destroy({{ $contact->id }})" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Hapus data?')"><span class="bi bi-trash fs-5"></span></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>  
        
        <div>
            {{ $contacts->links() }}
        </div>
          
    </div>