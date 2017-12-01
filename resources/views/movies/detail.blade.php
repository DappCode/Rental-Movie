@extends('layouts.default')

@section('title', 'Detail Movie')

@section('content')
 
<div class="container ">
    <form method="POST" enctype="multipart/form-data" action="{{ route('movie.detail', $movies->id) }}">
    <div class="justify-content-center"> 
        <div class="row movie ">  
            <div class="col">
                @if($movies->photo)
                        <img src="{{ $movies->photo }}" class="movie-img">  

                @else
                        <img src="/photos/no-avatar.png" class="movie-img" alt="No Avatar">   
                @endif
            </div>
            <div class="col">
                <h3>{{ $movies->title }}</h3>
                <p>Actor : <span class="cat-movie" > {{ $movies->title }} </span> </p>
                <p>Category : <span class="cat-movie"> {{ $movies->moviesCategories->categories }}, </span></p>
                <p> Description : <br> <span class="cat-movie"> {{ $movies->description }} </span> </p>
                <button type="button" class="btn btn-warning btn-pinjam">Buy</button>
                <button type="button" class="btn btn-primary btn-pinjam">Borrow</button>
            </div>
            
        </div>
    </div>

</div>    
@stop



