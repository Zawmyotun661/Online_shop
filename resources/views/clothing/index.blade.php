@extends('dashboard.Template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
            <h5>Customer List</h5>
                
              
                 <a href="{{url('clothing/create')}}">
                    <button class="btn btn-dark btn-sm  mb-2">
                        <i class="fa fa-plus-circle"></i> Add New
                    </button>
                </a> 
            
                <table class="table table-bordered table.hover">
                    <thead>
                        <tr>
                            <th>Clothing Type</th>
                        
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    @foreach($clothing as $clothing)
                        <tr>
                           
                            <td>{{ $clothing -> name }}</td>
                            <form action="{{ url('clothing/'.$clothing->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                </td>
                            </form>
                      
                        </tr>
                       
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    
    @endsection