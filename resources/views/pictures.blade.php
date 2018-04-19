@section('title', 'BDE - All the Pictures')
@extends('layouts.header')
@section('content')
    @php
        foreach (File::allFiles(public_path().'/img/') as $file)
        {
            $filename = $file->getRelativePathName();

            echo HTML::image('public/img/'.$filename, $filename);
        }
    @endphp
@endsection