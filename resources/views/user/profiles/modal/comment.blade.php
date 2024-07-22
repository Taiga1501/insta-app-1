<div class="modal fade" id="recent-comments{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-black">
                <h2 class="h4 text-secondary">Recent Comments</h2>
            </div>

            <div class="modal-body text-secondary" style="max-height: 40%">
                 @forelse($user->comments->take(5) as $comment)
                    <div class="rounded-2 border border-primary mb-2 px-3 py-2">
                        
                            {{$comment->body}}
                         <hr class="my-2">
                        
                        <span class="small">
                            <p>Replied to <a href="{{route('post.show', $comment->post_id)}}" class="text-decoration-none">{{$comment->post->user->name}}'s post</a></p>
                        </span>
                    </div>
                 @empty
                    <h2 class="h4 text-center">No comments yet.</h2>
                 @endforelse
            </div>
        </div>
    </div>
</div>