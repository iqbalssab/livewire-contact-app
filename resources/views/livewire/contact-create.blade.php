<div class="col-md-6">
    <form wire:submit.prevent='store'>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input wire:model="name" name="name" type="text" class="form-control border-primary @error('name') is-invalid @enderror" id="name" autofocus>
          @error('name')
              <span class="invalid-feedback">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input wire:model="phone" name="phone" type="text" class="form-control border-primary @error('phone') is-invalid @enderror" id="phone">
          @error('phone')
              <span class="invalid-feedback">
                {{ $message }}
              </span>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
