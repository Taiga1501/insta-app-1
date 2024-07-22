@extends('layouts.app')

@section('title', 'suggested_users')

@section('content')
   
@if($suggested_users)
   <div class="row justify-content-center">
      <div class="col-4">
         <h3 class="h3 mb-3">Suggested</h3>
     
    @foreach($suggested_users as $user)
              <div class="row mb-3 align-items-center">
                  <div class="col-auto">
                    <a href="{{route('profile.show', $user->id)}}">
                        @if($user->avatar)
                        <img src="{{$user->avatar}}" alt="" class="rounded-circle avatar-md">
                        @else
                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                        @endif
                    </a>
                  </div>
                  <div class="col ps-0 text-truncate">
                     <a href="{{route('profile.show', $user->id)}}" class="text-decoration-none text-dark fw-bold">
                        {{$user->name}}
                     </a>
                     <p class="text-secondary">{{$user->email}}</p>
                     @if($user->followsYou())
                         <p class="text-secondary">Follows you</p>
                     @else
                         @if($user->followers->count() == 0)
                          <p class="text-secondary">No followers yet</p>
                        @elseif($user->followers->count() == 1)
                          <p class="text-secondary">1 follwer</p>
                          @else 
                           {{$user->followers->count()}} followeres
                        @endif
                     @endif
                  </div>
                  <div class="col-auto">
                     <form action="{{route('follow.store', $user->id)}}" method="post">
                        @csrf
                        <button type="submit" class="bg-transparent border-0 shadow-none p-0 text-primary">Follow</button>
                     </form>
                  </div>
               </div>
    @endforeach
    @endif
   </div>
</div>
@endsection