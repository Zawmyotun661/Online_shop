@extends('dashboard.Template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                    <form action="{{url ('color') }}" method="POST">      
                        @csrf
                        <div class="form-group">
                            <label for="name" class="mb-2">Color Type</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Color Type" 
                            value="{{ old('name')}}" required >
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
