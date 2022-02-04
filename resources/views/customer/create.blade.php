@extends('dashboard.Template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                    <form action="{{url ('customer') }}" method="POST">      
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Customer Name" 
                            value="{{ old('name')}}" required >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control"  placeholder="Enter Email" 
                            value="{{ old('email')}}" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"  placeholder="Enter Password" 
                       required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" rows="2" class="form-control"
                            value="{{ old('address')}}" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Contact Number"
                            value="{{ old('phone')}}"  required> 
                        </div>
                       <div class="mt-4">
                    <button class="btn btn-primary">Create</button>
                       </div>
                    </form>
        
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
