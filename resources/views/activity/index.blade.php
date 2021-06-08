@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Actvity </h2>
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
            <th>Actvity</th>
            <th>Log Name</th>
            <th>Description</th>
            <th>Subject Type</th>
            <th>Causer Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ isset( $activity->log_name ) ?  $activity->log_name  : ''}}  </td>
                <td>{{ isset( $activity->description ) ?  $activity->description  : ''}}  </td>
                <td>{{ isset( $activity->subject_type  ) ?  $activity->subject_type   : ''}}  </td>
                <td>{{ isset( $activity->causer_type  ) ?  $activity->causer_type   : ''}}  </td>
                <td><a class="btn btn-info" href="#">View</a></td>

            </tr>

        @endforeach
        
    </table>
    
    <div class="pull-center">
        <a class="btn btn-danger" href="{{ route('logout') }}" title="Logout"> Logout <i class="fas fa-plus-circle"></i> </a>
    </div>

@endsection
