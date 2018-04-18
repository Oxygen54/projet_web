@extends('layouts.shop.header')

@section('title')
    Categories
@endsection

@section('content')
  @foreach($category->chunk(3) as $categoryChunk)
  <div class="row">
      @foreach($categoryChunk as $categories)
      <div class="col-sm-6 col-md-4 text-center">
        <a href="#" class="thumbnail">
        <img src="..\img\{{ $categories->imagePath }}" alt="{{ $categories-> label }}">
        <br>
        <label>{{ $categories->label }}</label>
        </a>
      </div>
      @endforeach
  </div>
  @endforeach
  @endsection
