@extends('layouts.default')

    @section('title', 'Movies')
    @section('content')
    @if(Session::get('succses_message'))
        <div class="alert alert-block alert-info">
        {{Session::get('succses_message')}}
        </div>
    @endif
    <div class="container">
    
        <div class="col-12">   
            <h1 class= "title">Movie List</h1>
            <a href="{{route('movie.create')}}"> <button type="button" class="btn btn-primary btn-pinjam" > Add MOVIES </button> </a>
            <a href="{{route('movie.create')}}"> <button type="button" class="btn btn-primary btn-pinjam" > Client List </button> </a>
        </div>

        <div class="row no-gutters">
            @foreach($movies as $movie)
                <div class="col-12 col-md-4">
                    <div class="col">
                        @if($movie->photo)
                            <a href="{{ route('movie.detail', $movie->id)}}"><img src="{{ $movie->photo }}" class="card-img-top img-movie primary-photo"> </a>

                        @else
                            <a href="{{ route('movie.detail', $movie->id)}}"><img src="/photos/no-avatar.png" class="card-img-top primary-photo" alt="No Avatar"> </a>

                        @endif
                        <div class="card-img-overlay text-center">
                            <h3 class="card-title">{{ $movie->title }}</h3>
                            <p class="card-text">Category : <span class="cat-movie"> {{ $movie->moviesCategories->categories }}, </span></p>
                            <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                            <a href="{{ route('movie.more', $movie->id)}}"> <button type="button" class="btn btn-primary btn-pinjam" > READ MORE </button> </a>
                            <a href="{{ route('movies.edit', $movie->id)}}"> <button type="button" class="btn btn-primary btn-pinjam" > EDIT </button> </a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if ($movies->lastPage() > 1)
                    <ul class="pagination ml-auto">
                        <li class="{{ ($movies->currentPage() == 1) ? ' disabled' : '' }} page-item">
                            <a class=" page-link " href="{{ $movies->url(1) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $movies->lastPage(); $i++)
                            <li class="{{ ($movies->currentPage() == $i) ? ' active' : '' }} page-item">
                                <a class=" page-link " href="{{ $movies->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ ($movies->currentPage() == $movies->lastPage()) ? ' disabled' : '' }} page-item">
                            <a href="{{ $movies->url($movies->currentPage()+1) }}" class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                @endif
            </div>  
        </div>

        
        

@stop