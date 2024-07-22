@if(!$post->trashed())
<div class="modal fade" id="hide-post{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h4 text-danger"><i class="fa-solid fa-eye-slash"></i> Hide Post</h3>
            </div>
            <div class="modal-body text-black">
                Are you sure you want to hide this post? &nbsp;
                <img src="{{$post->image}}" alt="" class="d-block image-lg mt-4 mb-2"> <br>
                <span class="text-secondary">{{$post->description}}</span>
            </div>
            <div class="modal-footer border-0">
                <form action="{{route('admin.posts.hide', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Hide</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

@else
<div class="modal fade" id="unhide-post{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-primary">
                <h3 class="h4 text-primary"><i class="fa-solid fa-eye"></i> Unhide User</h3>
            </div>
            <div class="modal-body">
                Are you sure you want to Unhide this post? &nbsp;
                <img src="{{$post->image}}" alt="" class="d-block image-lg mt-4 mb-2"> <br>
                <span class="text-secondary">{{$post->description}}</span>
            </div>
            <div class="modal-footer border-0">
                <form action="{{route('admin.posts.show', $post->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-primary">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif