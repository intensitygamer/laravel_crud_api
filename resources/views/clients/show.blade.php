@extends('layouts.app')


@section('content')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>  </h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('clients') }}" title="Go back"> Back </a>
                    </div>
                </div>
            </div>
 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    {{ isset( $client_info->user_info->first_name ) ?    $client_info->user_info->first_name : ''}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    {{ isset( $client_info->user_info->last_name ) ?    $client_info->user_info->last_name : ''}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ isset( $client_info->user_info->email ) ? $client_info->user_info->email : '' }}   
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CRM Url:</strong>
                    {{ isset( $client_info->crm_url) ? $client_info->crm_url : '' }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Client Name:</strong>
                    {{ isset( $client_info->name) ? $client_info->name : '' }}
                </div>
            </div>
         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    {{ isset( $client_info->user_details->address ) ? $client_info->user_details->address : '' }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Street:</strong>
                    {{ isset( $client_info->user_details->street ) ? $client_info->user_details->street : '' }}
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>House No:</strong>
                    {{ isset( $client_info->user_details->house_no ) ? $client_info->user_details->house_no : '' }}
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    {{ isset( $client_info->user_details->city ) ? $client_info->user_details->city : '' }}
                </div>
            </div>

            @if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2)
            
            <h4>User Logs</h4>

                <table class="table table-bordered table-responsive-lg activity_table">

                    <tr>
                        <th>Date</th>
                         <th>Activity</th>
                      </tr>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->created_at }}</td>
                             <td>{{ isset( $activity->description ) ?  $activity->description  : ''}}  </td>
                              
                                <?php 

                                //  if(isset( $activity->properties  ) ){

                                //     $properties = json_encode($activity->properties);

                                //     // print_r($activity->properties);

                                //     // exit;

                                //         foreach($properties as $property){
                                //             echo $property;
                                //         }

                                //  }
                                
                                
                                ?>
                             
                             </td>
 
                        </tr>

                    @endforeach
                    
                </table>


            @endif  


@endsection 
