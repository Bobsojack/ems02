
@extends('layouts.iframe')
@section('title','website')
    

@section('content')
<h2>Document</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ipsa necessitatibus corporis deleniti animi
    ut omnis veritatis! Molestias dolore quibusdam et consectetur in sequi asperiores quam molestiae quis!
    Voluptatum, quidem.</p>

<hr>
@foreach ($blogs as $item)
    <h3>{{$item['title']}}</h3>
    <p>{{$item['content']}}</p>
    @if ($item['status'] == true)
        <p class="text-success">เผยแผร่</p>
        
    @else
        <p class='text-danger'>ฉบับล่าง</p>
    @endif
    <hr>
    
@endforeach



@endsection












