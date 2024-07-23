<!-- Modal edit -->
@foreach ($categories as $category)    
<div class="modal fade" id="modalDelete{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('categories/'.$category->id) }}" method="post">
                <div class="modal-body">
                  @method('DELETE')
                  @csrf
                  <p>Are you sure to delete {{ $category->name }} category</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger btn-sm rounded-0">Delete</button>
                </div>
              </div>
            </form>
    </div>
</div>
@endforeach