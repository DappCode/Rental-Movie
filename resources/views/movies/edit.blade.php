@extends('layouts.default')

@section('title', 'Edit movies')

@section('content')
<div class="container">
    <form method="POST" enctype="multipart/form-data" action="{{ route('movies.bla', $movies->id) }}">
    <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}
    <!-- Wajib di isi setiap kali ingin menginput data -->   
    <div class="form-group">
        <label>Title : </label>
        <input name="title" type="text" value=" {{ $movies->title }} " class="form-control" placeholder="Your Name"> 
        @if($errors->first('title'))
            <p class="text-danger  "> {{ $errors->first('title') }} </p>
        @endif
    </div>
    
    <div class="form-group">
    <label  for="exampleInputPassword1">Categories: </label>
    <select class="form-control" name="category_id" id="">
    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->categories }}</option>
    @endforeach
    </select>
</div>
    <div class="form-group">
        <label>Year : </label>
        <input value=" {{ $movies->year }} " name="year" type="text" class="form-control" placeholder="Your Age">
        @if($errors->first('year'))
            <p class="text-danger  "> {{ $errors->first('year') }} </p>
        @endif
    </div>

    <div class="form-group">
        <label>Description : </label>
        <textarea  class="form-control form-text" name="description" type="description" id="exampleFormControlTextarea1" rows="3">{{ $movies->description }}</textarea>
        @if($errors->first('description'))
            <p class="text-danger  "> {{ $errors->first('description') }} </p>
        @endif
    </div>
    <div class="form-group">
        <label>Poster:(Kosongkan jika tidak diganti) </label>
        <input value=" {{ $movies->email }} " name="photo" type="file" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <br>
@stop

</div>

