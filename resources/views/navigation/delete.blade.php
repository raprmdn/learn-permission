<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#navigation-{{ $navigation->id }}Modal">
    Remove
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="navigation-{{ $navigation->id }}Modal" tabindex="-1" aria-labelledby="navigation-{{ $navigation->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="navigation-{{ $navigation->id }}ModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="row">
             <div class="justify-content-between">
                 <form action="{{ route('navigation.delete', $navigation) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
         </div>
        </div>
      </div>
    </div>
  </div>