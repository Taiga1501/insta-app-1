<div class="modal fade" id="like-post{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <button type="button" data-bs-dismiss="modal" class="btn btn-sm ms-auto fw-bold text-primary">
                X</button>
            </div>
            
            <div class="modal-body">
               <div class="w-75 mx-auto">
               @foreach($post->likes as $like)
                 <div class="row align-items-center mb-3">
                    <div class="col-auto">
                        <a href="{{route('profile.show', $like->user->id)}}">
                            @if($like->user->avatar)
                             <img src="{{$like->user->avatar}}" alt="" class="rounded-circle avatar-sm">
                             @else
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                             @endif
                        </a>
                    </div>
                    <div class="col ps-0">
                        <a href="{{route('profile.show', $like->user->id)}}" class="text-decoration-none text-dark fw-bold">{{$like->user->name}}</a>
                    </div>
                    <div class="col-auto">
                        @if($like->user->id != Auth::user()->id)
                           @if($like->user->isFollowing())
                               {{-- unfollow --}}
                               <form action="{{route('follow.destroy', $like->user->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn p-0 text-secondary">Following</button>
                               </form>
                           @else
                               {{-- follow --}}
                               <form action="{{route('follow.store', $like->user->id)}}" method="post">
                                   @csrf
                                   <button type="submit" class="btn p-0 text-primary">Follow</button>
                               </form>
                           @endif
                        @endif
                    </div>
                 </div>
               @endforeach
            </div>
            </div>
        </div>
    </div>
</div>