@extends('layouts.app')

@section('content')	






<div class="container">

<form class="row g-3" action="savecompany" method="POST">

	  {{csrf_field()}}

  <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
            <input type="text"  name="name" class="form-control" id="inputEmail4" value="{{ old('name') }}">
          @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
  </div>
  
  <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Phone</label>
            <input type="number" name="phone" class="form-control" id="inputPassword4" value="{{ old('phone') }}">
            @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif</div>
   
  <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">

           @if($errors->has('address'))
                  <span class="text-danger">{{ $errors->first('address') }}</span>
              @endif  </div>
 
 
    <div class="col-md-4">
          <label for="country">Country</label>
            <select class="form-control" name="country" id="country-dropdown">
            <option value="">Select Country</option>
            
            @foreach ($countries as $country)
              @if (old('country') == $country->id)
              <option value="{{$country->id}}" selected>{{$country->name}}</option>
                @else
                <option value="{{$country->id}}">{{$country->name}}</option>
              @endif
            @endforeach
            </select>

           @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
    </div>

    <div class="col-md-4">
       <label for="state">State</label>
          <select class="form-control" name="state" id="state-dropdown">
          	<option value="">Select State</option>
          @foreach ($states as $state) 
                @if (old('state') == $state->id)
                        <option value="{{$state->id}}" selected>{{$state->name}}</option>
                          @else
                          <option value="{{$state->id}}">{{$state->name}}</option>
                        @endif
                      @endforeach
          </select>
            
           @if($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                @endif
    </div>

<div class="col-md-4">
      <label for="city">City</label>
            <select class="form-control" name="city" id="city-dropdown">
            	<option value="">Select City</option>
            @foreach ($cities as $city) 
             @if (old('city') == $city->id)
                          <option value="{{$city->id}}" selected>{{$city->name}}</option>
                            @else
                            <option value="{{$city->id}}">{{$city->name}}</option>
                          @endif
            @endforeach
            </select>

             @if($errors->has('city'))
                      <span class="text-danger">{{ $errors->first('city') }}</span>
                  @endif
    </div>
  	<div class="col-md-4">
        <label for="inputCity" class="form-label">CR Number</label>
            <input type="number" name="crnumber" class="form-control" id="inputPassword4" value="{{ old('crnumber') }}">
          @if($errors->has('crnumber'))
                  <span class="text-danger">{{ $errors->first('crnumber') }}</span>
              @endif
     </div>
    <div class="col-md-4">
         <label for="inputState" class="form-label">Registration Date</label>
            <input type="date" name="crregistration" class="form-control" id="inputPassword4" value="{{ old('crregistration') }}">
           @if($errors->has('crregistration'))
                  <span class="text-danger">{{ $errors->first('crregistration') }}</span>
              @endif
      </div>
  <div class="col-md-4">
            <label for="inputZip" class="form-label">Expiry Date</label>
         <input type="date" name="crexpiry" class="form-control" id="inputPassword4" value="{{ old('crexpiry') }}">
          @if($errors->has('crexpiry'))
                  <span class="text-danger">{{ $errors->first('crexpiry') }}</span>
              @endif 
      </div>





  <div class="col-md-4">
   <label for="inputCity" class="form-label">Vatin Number</label>
        <input type="number" name="vname" class="form-control" id="inputPassword4" value="{{ old('vname') }}">
       @if($errors->has('vname'))
              <span class="text-danger">{{ $errors->first('vname') }}</span>
          @endif
    </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Vatin Registration </label>
        <input type="date" name="vregistration" class="form-control" id="inputPassword4" value="{{ old('vregistration') }}">
       @if($errors->has('vregistration'))
              <span class="text-danger">{{ $errors->first('vregistration') }}</span>
          @endif
    </div>
  <div class="col-md-4">
    <label for="inputZip" class="form-label">Vatin Expiry</label>
       <input type="date" name="vexpiry" class="form-control" id="inputPassword4" value="{{ old('vexpiry') }}">
         @if($errors->has('vexpiry'))
                <span class="text-danger">{{ $errors->first('vexpiry') }}</span>
            @endif
    </div>
  <div class="col-12 text-right">
      <button type="submit"  class="btn btn-primary">Save Company</button>
  </div>
</form>
</div>
 


<script>
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$("#state-dropdown").html('');
$.ajax({
url:"{{url('get-states-by-country')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#state-dropdown').html('<option value="">Select State</option>'); 
$.each(result.states,function(key,value){
$("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$("#city-dropdown").html('');
$.ajax({
url:"{{url('get-cities-by-state')}}",
type: "POST",
data: {
state_id: state_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#city-dropdown').html('<option value="">Select City</option>'); 
$.each(result.cities,function(key,value){
$("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
}
});
});
});
</script>

@endsection('content')