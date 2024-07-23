<!-- Modal edit -->
@foreach ($categories as $category)    
<div class="modal fade" id="modalEdit{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('categories/'.$category->id) }}" method="post">
                <div class="modal-body">
                  @method('PUT')
                  @csrf
                  <div class="mb-3">
                      <label for="name" class="form-label">Category Name</label>
                      <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $category->name) }}" autofocus>
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm rounded-0">Save</button>
                </div>
              </div>
            </form>
    </div>
</div>
@endforeach