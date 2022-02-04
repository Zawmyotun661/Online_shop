@extends('dashboard.Template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
            <h5>Package List</h5>
                
              
                 <a href="{{url('package/create')}}">
                    <button class="btn btn-dark btn-sm  mb-2">
                        <i class="fa fa-plus-circle"></i> Add New
                    </button>
                </a> 
                <div class="row mb-3 mt-5">
               
                 
                   
                    <label for="date"> Filter by Date</label>


                    <div class="form-group col-md-3">
                        <input type="date" name="date" class="form-control"  placeholder="Enter Date" id="date">
                    </div>
                  
                    <div class="form-group col-md-3">
                        <select  class="form-select" aria-label="Default select example" name="status" id="status">
                            <option value="">Filter by Delivery Status</option>
                          
                            <option value="Pending">Pending</option>
                            <option value="Deliverd">Delivered</option>
                        </select>
                    </div>
              <div class="col-md-6 mx-auto">
                 <div class="input-group" id="myDiv">
                 <input class="form-control border" type="search" id="name" placeholder="Filter by name" value="" style="border-radius: 3px;">
                  <div class="pl-4">
                  <button class="btn btn-primary border px-2" id="search" style="width: 130px; padding:10px; border-radius:20px">
                         <i class="fa fa-search">Search</i>
                  </button>
                            </div>
                        </div>
                    </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Expected Delivery Date</th>
                            <th>Delivery Date</th>
                            <th>Customer Name</th>
                            <th>Facebook Name</th>
                            <th>Customer Phone</th>
                            <th>Address</th>
                            <th>Customer Type</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Clothing Type</th>
                            <th>Color</th>
                            <th>Delivery Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Delivery Fee</th>
                            <th>Total Cost</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($package as $package)
                        <tr>
                            <td>{{ $package -> order_date }}</td>
                            <td>{{ $package -> expected_delivery_date }}</td>
                            <td>{{ $package -> delivery_date }}</td>
                            <td>{{ $package -> customer_name }}</td>
                            <td>{{ $package -> facebook_name }}</td>
                            <td>{{ $package -> customer_phone }}</td>
                            <td>{{ $package -> address }}</td>
                            <td>{{ $package -> customer_type }}</td>
                            <td>{{ $package -> quantity }}</td>
                            <td>{{ $package -> cost }}</td>
                           
                            <td>{{ $package -> clothing_type }}</td>
                            <td>{{ $package -> color}}</td>
                            <td>{{ $package -> delivery_status }}</td>
                            <td>{{ $package -> payment_type }}</td>
                            <td>{{ $package -> payment_status }}</td>
                            <td>{{ $package -> delivery_fee }}</td>
                            <td>{{ $package -> total_cost }}</td>
                            <td>
                                <a href="{{url('package/'.$package->id.'/edit')}}" style="text-decoration: none;">
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                </a>
                                <form action="{{ url('package/'.$package->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="table_footer">
                
                <tr>
                    <th>Total Amount</th>
                    <th colspan="12">{{$total}}</th>
                </tr>
              
        
            </tfoot>
              
                </table>
            </div>
            
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('click', function(){
            var query = $('#name').val();
            var date = $('#date').val();
            var status = $('#status').val();
            var table = document.getElementById('tbody');
            table.innerHTML = '';
            var tableFooter = document.getElementById('table_footer');
        tableFooter.innerHTML = '';

            $.ajax({
                url:'{{route('search_package')}}',
                type:'GET',
                data:{'name':query,'date':date, 'status':status,},
                success:function(data) {
                    console.log(data)
                    
                    data.forEach(item => {
              
                    
                    
                    table.innerHTML+=
                    '<tr>'+
                    '<td>'+item.order_date+'</td>'+
                    '<td>'+item.expected_delivery_date+'</td>'+
                    '<td>'+item.delivery_date+'</td>'+
                    '<td>'+item.customer_name+'</td>'+
                    '<td>'+item.facebook_name+'</td>'+
                    '<td>'+item.customer_phone+'</td>'+
                    '<td>'+item.address+'</td>'+
                    '<td>'+item.customer_type+'</td>'+
                    '<td>'+item.quantity+'</td>'+
                    '<td>'+item.cost+'</td>'+
                    '<td>'+item.clothing_type+'</td>'+
                    '<td>'+item.color+'</td>'+
                    '<td>'+item.delivery_status+'</td>'+
                    '<td>'+item.payment_type+'</td>'+
                    
                    '<td>'+item.payment_status+'</td>'+
                    '<td>'+item.delivery_fee+'</td>'+
                    '<td>'+item.total_cost+'</td>'+
                   '</tr>';
                   tableFooter.innerHTML =  
                      '<tr><th>Total</th><th colspan="12">'+item.total+'</th></tr>';
                    
                      })
                        
            }
              })
    }); 
});
</script>
    @endsection