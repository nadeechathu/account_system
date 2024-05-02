<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#remove-advertisement-modal-'.$collect->id}}">
    <i class="fa fa-trash"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="{{'remove-advertisement-modal-'.$collect->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this collect from the system ?
        </div>
        <div class="modal-footer">

          <a href="{{route('collects.remove',$collect->id)}}"><button type="button" class="btn btn-primary">Yes</button></a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  {{-- <div class="modal fade text-left" id="delectCollectData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title font-20" id="exampleModalLabel">Confirm Delect</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p class="font-15">Are you sure you want to delete this collect from the system ?</p>
            <p class="text-danger font-15">This operation cannot be undone.</p>
         </div>
         <div class="modal-footer">
            <a href="" id="delete-collection-btn"><button type="button" class="btn btn-success  btn-secondary px-3 font-13 rounded-2">Yes</button></a>
            <button type="button" class="btn  btn-secondary px-3 font-13 rounded-2" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div> --}}