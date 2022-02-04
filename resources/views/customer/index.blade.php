@extends('dashboard.Template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
            <h5>Customer List</h5>
                
              
                 <a href="{{url('customer/create')}}">
                    <button class="btn btn-dark btn-sm  mb-2">
                        <i class="fa fa-plus-circle"></i> Add New
                    </button>
                </a> 
            
                <table class="table table-bordered table.hover">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($customer as $customer)
                        <tr>
                            <td>{{ $customer -> name }}</td>
                            <td>{{ $customer -> email }}</td>
                            <td>{{ $customer -> address }}</td>
                            <td>{{ $customer -> phone }}</td>
                     
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    
    @endsection