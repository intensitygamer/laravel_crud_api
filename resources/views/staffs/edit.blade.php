@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Staff</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('staffs') }}" title="Go back">Back</i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> There were some problems with your input. </strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('update.staff') }}" method="POST">

        @csrf

        <div class="row" style="margin-left:20px; margin-right:20px;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value = {{ isset( $staff->user_info->first_name ) ?  $staff->user_info->first_name : ''}} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value = {{ isset( $staff->user_info->last_name ) ?    $staff->user_info->last_name : ''}} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email" value =  {{ isset( $staff->user_info->email ) ? $staff->user_info->email : '' }}>
                </div>
            </div>
<!-- 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                </div>
            </div> -->

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" class="form-control" placeholder="Address" value = {{ isset( $staff->user_details->address ) ? $staff->user_details->address : '' }} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Street:</strong>
                    <input type="text" name="street" class="form-control" placeholder="Street" value = {{ isset( $staff->user_details->street ) ? $staff->user_details->street : '' }} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>House No:</strong>
                    <input type="text" name="house_no" class="form-control" placeholder="House No" value = {{ isset( $staff->user_details->house_no ) ? $staff->user_details->house_no : '' }} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    <input type="text" name="city" class="form-control" placeholder="City" value = {{ isset( $staff->user_details->city ) ? $staff->user_details->city : '' }}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Territory:</strong>
                    <input type="text" name="territory" class="form-control" placeholder="Territory" value =  {{ isset( $staff->user_details->territory ) ? $staff->user_details->territory : '' }}>
                </div>
            </div>

 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Postal Code:</strong>
                    <input type="text" name="postal_code" class="form-control" placeholder="Postal Code" value =  {{ isset( $staff->user_details->postal_code ) ? $staff->user_details->postal_code : '' }}>
                </div>
            </div>

 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    <input type="text" name="country" class="form-control" placeholder="Country" {{ isset( $staff->user_details->country ) ? $staff->user_details->country : '' }} >
                </div>
            </div>

              <input name="id" type="hidden" value="{{  isset( $staff->id ) ? $staff->id : '' }}">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Staff</button>
            </div>
        </div>

    </form>
@endsection
