@extends('layout')

@section('title')

  Add new Customer
  @endsection

@section('content')


<h1> Add Customers </h1>





<div class="row">

       {{$errors->first('name')}}
       {{$errors->first('email')}}
       {{$errors->first('active')}}
       {{$errors->first('image')}}


      <form action="/customers" method="POST" class="col s12" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder"  id="first_name"name="name" type="text"  value="{{old('name')}}">
            <label for="first_name">First Name</label>
          </div>

        <div class="row">
          <div class="input-field col s16">
            <input id="email" type="email" name="email" class="validate" value="{{old('email')}}">
            <label for="email"> Email </label>
          </div>
        </div>
         </div>

         <div class="input-field col s6">
          <select name="active" required>
            <option disabled-selected >Choose your option</option>
            <option   value="1">Active</option>
            <option value='0'>in active</option>
          </select>
          <label> users </label>
        </div>

        <div class="input-field col s6">
          <select name="company_id" required>
            <option disabled-selected >Choose your option</option>
           @foreach ($companies as $company)
          <option value="{{ $company->id}}"> {{$company->name}}</option>

           @endforeach

          </select>
          <label> Company  </label>
        </div>


        <div class="row">
            <div class="input-field col s16">
              <input id="image" type="file" name="image" class="validate">

            </div>
          </div>
           </div>

         <button class="waves-effect waves-light btn" type="submit"> Add Customer </button>
         @csrf

      </form>
    </div>

 </div>
 @endsection





