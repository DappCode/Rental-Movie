@extends('layouts.default')

@section('title', 'Tambah Movie')

@section('content')
<div class="container">
    <!-- enctype = untuk mengupload file -->
    <form enctype="multipart/form-data" method="POST" action="{{ route('movie.store') }}">

    <!-- Wajib di isi setiap kali ingin menginput data -->
    {{ csrf_field()}}
    <div class="form-group">
        <label for="exampleInputEmail1">Title: </label>
        <input name="title" type="text" class="form-control" placeholder="Title"> 
        @if($errors->first('title'))
            <p class="text-danger  "> {{ $errors->first('title') }} </p>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Categories: </label>
        <select class="form-control" name="category_id" id="">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->categories }}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description: </label>
        <textarea  class="form-control form-text" name="description" type="text" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
        @if($errors->first('description'))
            <p class="text-danger  "> {{ $errors->first('description') }} </p>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Year: </label>
        <input name="year" type="number" class="form-control" placeholder="Your Year">
        @if($errors->first('age'))
            <p class="text-danger  "> {{ $errors->first('age') }} </p>
        @endif
    </div>

    <div class="form-group">
        <label for="exampleInputEmail">Your Picture: </label>
        <input name="photo" type="file" class="form-control" placeholder="Your photo">
        
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
</div>


@stop