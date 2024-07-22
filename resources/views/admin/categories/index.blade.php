@extends('layouts.app')

@section('title', 'Admin : Categories')

@section('content')

    <form action="{{route('admin.categories.store')}}" method="post" class="row mb-4 gx-2">
        @csrf
        <div class="col-3">
            <input type="text" name="name" id="name" class="form-control" placeholder="Add a category…" value="{{old('name')}}">
            @error('name')
            <p class="text-danger small">{{$message}}</p>  
            @enderror
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
        </div>
        
    </form>


<table class="table table-hover border text-secondary bg-white align-middle text-center">
    <thead class="table-warning text-secondary small text-uppercase">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Count</th>
            <th>Last updated</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($all_categories as $category)
           <tr>
               <td>{{$category->id}}</td>
               <td class="text-black">{{$category->name}}</td>
               <td>{{$category->categoryposts->count()}}</td>
               <td>{{$category->updated_at}}</td>
               <td class="d-flex align-items-center">
                   <button type="submit" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit-category{{$category->id}}">
                        <i class="fa-solid fa-pen"></i>
                   </button>
                   @include('admin.categories.modals.edit')
                   
                    <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-category{{$category->id}}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                    @include('admin.categories.modals.delete')
              </td>
           </tr>
        @empty
            <tr>
                <td class="text-center" colspan="6">No categories found.</td>
            </tr>
        @endforelse
        <tr>
            <td>0</td>
            <td>Uncategorized</td>
            <td>{{$uncategorized_count}}</td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
{{$all_categories->links()}}

@endsection