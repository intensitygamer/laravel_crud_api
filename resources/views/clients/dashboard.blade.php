@extends('layouts.app')

@section('content')

        <div class='col col-12'>
            
            @if (!Auth::guest() && Auth::user()->user_type_id == 3) 
                 
                <h4> Client Info </h4>

                <table class = 'table table-striped'> 
                    
                    <tr><td>    Client Name: <td> {{ Auth::user()->get_client_details(Auth::id())->name}}
                    <tr><td>    CRM Url: <td> {{ Auth::user()->get_client_details(Auth::id())->crm_url}}


                    <input type='hidden' value="{{ Auth::user()->get_client_details(Auth::id())->crm_token_id}}" name = "crm_token_id" >
                    
                </table>

                <form action = "schedeasy.com/" method = 'POST'> 
                    
                    <button type= 'submit' class = 'btn btn-info'> Login through CRM </button>

                     @csrf
    
                </form>

            @endif  
            
        </div>

 
        <div class="row">

    <div class="container">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2> Staffs </h2>
            </div>

            <a class="btn btn-success" href="{{ route('create_staff') }}" title="Staff Project"> <i class="fas fa-plus-circle"></i>Add Staff
            </a>

        </div>

    </div>

</div>


<div class="row">

<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($staffs as $staff)
            <tr>
                <td>    {{ $staff->id }}</td>
                <td>    {{ isset( $staff->user_info->first_name ) ?  $staff->user_info->first_name  : ''}} {{ isset( $staff->user_info->last_name ) ?  $staff->user_info->last_name  : ''}} </td>
                <td>    {{ isset( $staff->user_details->address ) ? $staff->user_details->address : '' }}</td>
                <td>    {{ isset( $staff->user_info->email ) ?  $staff->user_info->email  : ''}}  </td>
                <td>    {{ date_format($staff->created_at, 'jS M Y') }}</td>
                <td>
                        <form action="{{ route('delete.staff', [ 'id'=> $staff->id ]) }}" method="POST" >

                        @csrf

                        <a class="btn btn-info" href="{{ route('staff.show', $staff->id) }}"> View</a>    

                        <a class="btn btn-primary"  href="{{ route('edit.staff', $staff->id) }}"> Edit</a>
                                
                            <input name="id" type="hidden" name = "staff_id" value="{{$staff->id}}">

                            <input type="hidden" name="_method" value="DELETE">

                            <button type = 'submit' class="btn btn-danger" > Delete </button>

                        </form>

                        <br><br><a class="btn btn-success"  href="{{ route('client.change_password', $staff->id) }}"> Change Password</a>   

                </td>
            </tr>
        @endforeach
    </table>
 
</div>

</div>

@endsection       