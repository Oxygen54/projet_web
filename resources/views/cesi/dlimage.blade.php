@extends('layouts.app')

@section('content')


@php
$files = glob("images/*.*");
for ($i=1; $i<count($files); $i++)
{
    $num = $files[$i];
    echo '<img src="'.$num.'" alt="random image"  href="'.$num.'"  download>'."&nbsp;&nbsp;";
}
@endphp


@endsection