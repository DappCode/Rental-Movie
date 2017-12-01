@extends('layouts.default')

    @section('title', 'Movies List')
    @section('content')
    @if(Session::get('succses_message'))
        <div class="alert alert-block alert-info">
        {{Session::get('succses_message')}}
        </div>
    @endif
    <h1>Movie List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Year</th>
                    <th scope="col">Description</th>
                    <th scope="col">Poster</th>

                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }} </td>
                    <td> {{ $movie->title }} </td>
                    <td> {{ $movie->moviesCategories->categories }}</td>
                    <td> {{ $movie->year }} </td>
                    <td> {{ $movie->description }} </td>
                   <td>
                   @if($movie->photo)
                        <img src="{{ $movie->photo }}" width="200 " height="200">  

                    @else
                        <img src="/photos/no-avatar.png" width="200 " height="200" alt="No Avatar">        

                    @endif
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>

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
        

@stop