@extends('layout')

@section('title')

  Customer List
  @endsection

@section('content')

<p> <a href="customers/create"> Create Customers </a></p>

 <h2> List of customers </h2>

 <div class="row">

  @foreach($customers as $customer)
    <div class='col s2'>
      {{$customer->id}}
    </div>

    <div class='col s4'>
      <a href="/customers/{{$customer->id}}">
      {{$customer->name}}
      </a>
    </div>

    <div class='col s4'>
      {{$customer->company->name}}
    </div>

    <div class='col s2'>
      {{$customer->active}}
    </div>
  </div>

   
@endforeach







 @endsection





