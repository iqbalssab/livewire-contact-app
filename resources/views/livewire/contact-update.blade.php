<div class="col-md-6">
    <form wire:submit.prevent='update' class="d-inline">
        <input type="hidden" name="contactId" wire:model="contactId">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input wire:model="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
          @error('name')
              <span class="invalid-feedback">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input wire:model="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone">
          @error('phone')
              <span class="invalid-feedback">
                {{ $message }}
              </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Ubah data?')">Update</button>
    </form>
    <button wire:click='cancelUpdate' class="btn btn-danger">Cancel</button>
    
</div>
