@extends('layout')

@section('content')

<h1> Contact us </h1>

<form action="{{route('contact.store')}}" method="POST" class="col s12"  enctype="multipart/form-data">


    <div class="container">
        {{$errors->first('name')}}
       {{$errors->first('email')}}
       {{$errors->first('active')}}
       {{$errors->first('company_id')}}
    </div>

        <div class="row">
          <div class="input-field col s6">
            <input  id="first_name"name="name" type="text"  value="{{old('name')}}">
            <label for="name"> Name</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <input id="email" type="email" name="email" class="validate" value="{{old('email')}}">
            <label for="email"> Email </label>
          </div>
        </div>


        <div class="row">
            <div class="input-field col s8">
            <textarea id="textarea1" name="message" class="materialize-textarea"> {{old('message')}}</textarea>
              <label for="textarea1"> Message </label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s16">
              <input id="image" type="file" name="image" class="validate">

            </div>




          <button type="submit" class="waves-effect waves-light btn"> Send Message </button>
      @csrf

</form>

@endsection
