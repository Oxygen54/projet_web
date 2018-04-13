@extends('layouts.app')

@section('content')


@php



$files = glob("img/*.*");//import

$receveur = 'olivier.descoups@viacesi.fr';

for ($i=0; $i<count($files); $i++)
{
    $num = $files[$i];
    echo '




    <a href="'.$num.'" download>
    <img src="'.$num.'" alt="random image" width=200>




    '."&nbsp;&nbsp;";


    Mail::to($receveur)->send(new MailTest);


}
@endphp


@endsection