@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Staffs </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create_staff') }}" title="Staff Project"> <i class="fas fa-plus-circle"></i>Add Staff
                    </a>
            </div>
        </div>
    </div>

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
                    <form action="" method="POST">

                        @csrf

                        <a href="{{ route('staff.show', $staff->id) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>

                        <a href="{{ route('edit_staff', $staff->id) }}">
                            <i class="fas fa-edit fa-lg"></i>

                        </a>

                        <a href="{{ route('delete_staff', $staff->id) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

 
    <div class="pull-center">
        <a class="btn btn-danger" href="{{ route('logout') }}" title="Logout"> Logout <i class="fas fa-plus-circle"></i> </a>
    </div>

@endsection
