@extends('layout')

@section('title')

customer details for {{$customer->name}}

@endsection

@section('content')

   <div class="container">
       <h3> Details for {{$customer->name}} </h3>
       <p><a href="/customers/{{ $customer->id}}/edit"> edit </a> </p>

       <form action="/customers/{{$customer->id}}" method="POST">
        @method('DELETE')
        @csrf

        <button type="submit" class="waves-effect waves-light btn"> Delete </button>

       </form>

       <div class="row">
           <div class="col s12">
               <p><strong> Name </strong> {{$customer->name}}</p>
               <p><strong> email </strong> {{$customer->email}}</p>
               <p><strong> company </strong> {{$customer->company->name}}</p>
       </div>
       </div>
         @if($customer->image)
            <div class='row'>
                <div class="col s12">
                <img src="{{ asset('storage/'.$customer->image)}}">
                </div>
            </div>
            @endif
   </div>


    @endsection
