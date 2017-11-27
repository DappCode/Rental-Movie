@extends('layouts.default')

    @section('title', 'Movies List')
    @section('content')
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
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }} </td>
                    <td>
                        @if($student->photo)
                            <img src="{{ $student->photo }}" width="70 " height="70">  

                        @else
                            <img src="/photos/no-avatar.png" width="70 " height="70" alt="No Avatar">        

                        @endif
                    </td>
                    <td> {{ $student->nama }} </td>
                    <td> {{ $student->studentClass->degree }} </td>
                    <td> {{ $student->address }} </td>
                    <td> {{ $student->age }} </td>
                    <td> {{ $student->email }} </td>
            </tbody>
        </table>
    @endsection
