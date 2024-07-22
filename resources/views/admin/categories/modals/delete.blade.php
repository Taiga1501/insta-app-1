<div class="modal fade" id="delete-category{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger text-black">
            <div class="modal-header border-danger">
                <i class="fa-solid fa-trash-can"></i>  Delete Category
            </div>
            <div class="modal-body text-start">
                <p>Are you sure you want to delete <span class="ftn-bold">{{$category->name}}</span> category?</p> <br>

                <p>This action will affect all the posts under this category. Posts without a category will fall under Uncategorized.</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
       </div>
    </div>
</div> 