@extends('layouts.default')

@section('title', 'Detail Movie')

@section('content')
 


<div class="container ">
    <form method="POST" enctype="multipart/form-data" action="{{ route('movie.more', $movies->id) }}">
    <div class="justify-content-center"> 
        <div class="row movie ">  
            <div class="card mb-3">
                @if($movies->photo)
                        <img src="{{ $movies->photo }}" class="movie-img card-img-top">  

                @else
                        <img src="/photos/no-avatar.png" class="movie-img" alt="No Avatar">   
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{ $movies->title }}</h4>    
                    <p class="text-muted"> Description : <p class="card-text">{{ $movies->description }}</p> </p>
                    <p class="text-muted"> Actor : <p class="cat-movie card-text" > {{ $movies->title }} </p> </p>
                    <p>Category : <span class="cat-movie"> {{ $movies->moviesCategories->categories }}, </span></p>
                </div>
                <button type="submit" class="btn btn-danger" onclick="return confirm('kamu yakin ingin menghapus {{ $movies->title }} ?')" >Deleted</button>
                <a href="{{ route('movies.edit', $movies->id)}}" class="btn btn-primary"> EDIT </a>
                
            </div>
        </div>
    </div>
    </form>
</div>    
@stop



