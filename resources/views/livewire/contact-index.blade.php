    <div class="container bg-secondary bg-gradient bg-opacity-25 pb-2">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1>Tambah Kontak</h1>
    <hr />
        {{-- <div class="d-flex justify-content-center mb-4 border p-2">
            <livewire:contact-update />
        </div> --}}
        <div class="d-flex justify-content-center mb-4 border p-2">
            <livewire:contact-create />
        </div>
        

       
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
                        <button wire:click='getContact({{ $contact->id }})' type="button" data-bs-toggle="modal" data-bs-target="#viewModal" class="badge bg-primary text-light fw-bold mb-1 border-0"><span class="bi bi-eye fs-5" width="20px" height="20px"></span>
                        </button>
                        {{-- Edit --}}
                        <button wire:click='getContact({{ $contact->id }})' type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="badge bg-warning text-dark fw-bold mb-1 border-0"><span class="bi bi-pencil-square fs-5" width="20px" height="20px"></span>
                        </button>
                        
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
        
        <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>

  
  <!-- Modal view -->
  <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kontak </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="input-group row">
                <input wire:model="name" type="text" class="form-control ms-2" placeholder="name" aria-label="name">
                <input wire:model="phone" type="text" class="form-control ms-2" placeholder="phone number" aria-label="phone number">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button wire:click.prevent='cancelButton' type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- End Modal View --}}
  
<!-- Modal edit -->
  <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kontak</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="input-group row">
                <input wire:model='name' type="text" class="form-control ms-2" placeholder="name" aria-label="name">
                <input wire:model="phone" type="text" class="form-control ms-2" placeholder="phone number" aria-label="phone number">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button wire:click.prevent='cancelButton' type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button wire:click.prevent='update' type="button" class="btn hidden btn-primary">Update Data</button>
        </div>
      </div>
    </div>
  </div>

</div>
@push('scripts')
    <script>
        window.addEventListener('show-view-modal', e => {
            $('#viewModal').modal('show')
        })
        
        window.addEventListener('hide-edit-modal', e => {
            $('#editModal').modal('hide')
        })
    </script>
@endpush