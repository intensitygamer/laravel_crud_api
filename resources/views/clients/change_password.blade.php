@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Client Change Password</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients') }}" title="Go back">Back</i> </a>
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
    <form action="{{ route('client.change_password') }}" method="POST">

        @csrf

        <div class="row" style="margin-left:20px; margin-right:20px;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>New Password:</strong>
                    <input type="text" name="new_password" class="form-control" placeholder="New Password" value = {{ isset( $client->user_info->first_name ) ?  $client->user_info->first_name : ''}} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm New Password:</strong>
                    <input type="text" name="confirm_new_password" class="form-control" placeholder="Confirm New Password" value = {{ isset( $client->user_info->last_name ) ?    $client->user_info->last_name : ''}} >
                </div>
            </div>

            <input name="id" type="hidden" name = "client_id" value="{{$client->id}}">


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update Password</button>
            </div>


        </div>

    </form>
@endsection
