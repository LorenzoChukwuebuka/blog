@extends('layout')

@section('title')
Edit Customer
  @endsection

@section('content')
    

<h1> Edit Customers </h1> 


    
 

<div class="row">
   
    <div class="container">
        {{$errors->first('name')}}
       {{$errors->first('email')}}
       {{$errors->first('active')}}
       {{$errors->first('company_id')}}  
    </div>


<form action="/customers/{{$customer->id}}" method="POST" class="col s12">
    @method('PATCH')
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder"  id="first_name"name="name" type="text"  value="{{old('name') ?? $customer->name }}">
            <label for="first_name">First Name</label>
          </div>
           
        <div class="row">
          <div class="input-field col s16">
            <input id="email" type="email" name="email" class="validate" value="{{old('email') ?? $customer->email}}">
            <label for="email"> Email </label>
          </div>
        </div>
         </div>   

         <div class="input-field col s6">
          <select name="active">
            <option   value="1" {{ $customer->active == 'Active' ? 'selected': ''}}>Active</option>
            <option value='0'{{ $customer->active == 'Inactive' ? 'selected': ''}}>Inactive</option>
          </select>
          <label> users </label>
        </div>

        <div class="input-field col s6">
          <select name="company_id">  
           @foreach ($companies as $company)
          <option value="{{ $company->id}}" {{$company->id == $customer->company_id ? 'selected': ' '}}> {{$company->name}}</option>
               
           @endforeach
         
          </select>
          <label> Company  </label>
        </div>

         <button class="waves-effect waves-light btn" type="submit"> Save Customer </button>
         @csrf

      </form>
    </div>
 
 </div>
 @endsection

 

 

 