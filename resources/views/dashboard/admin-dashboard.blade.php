@extends('dashboard.Template')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="row mb-3">
              <div class="col-md-6 mx-auto">
             
               
              </div>
          </div>
     
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                       
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                       
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        @foreach ($user->roles as $role)
                           <span class="badge" style="background:#1F1C2C ;">{{$role->name}}</span>
                        
                        @endforeach
                    </td>
                        <td><a href="{{url('admin/'.$user->id.'/manage-role')}}" style="background: #928DAB;" class="btn btn-sm">Manage Roles</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

