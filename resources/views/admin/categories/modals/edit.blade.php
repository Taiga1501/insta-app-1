<div class="modal fade" id="edit-category{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-warning">
                <i class="fa-regular fa-pen-to-square"></i> Edit Category
            </div>
            <div class="modal-body">
                <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="text" name="name{{$category->id}}" class="form-control" value="{{$category->name}}">
                    @error('name'.$category->id)
                      <p class="text-sm text-danger text-start">{{$message}}</p>
                    @enderror
            </div>
            <div class="modal-footer">
                   <button type="button" data-bs-dismiss="modal" class="btn btn-outline-warning">Cancel</button>
                   <button type="submit" class="btn btn-warning">Update</button>
                 </form>
            </div>
        </div>
    </div>
</div>