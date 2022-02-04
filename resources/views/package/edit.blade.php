@extends('dashboard.Template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                    <form action="{{url ('package/'.$package->id) }}" method="POST">      
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <input type="date" name="order_date" class="form-control"  placeholder="Enter Order Date" 
                        value="{{ $package->order_date ?? old('order_date')}}" id="order_date">
                        <div class="errors" id="order_date_errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="expected_delivery_date"> Expected Delivery Date</label>
                        <input type="date" name="expected_delivery_date" class="form-control"  placeholder="Enter Expected Delivery Date" 
                        value="{{ $package->expected_delivery_date ?? old('expected_delivery_date')}}" id="expected_delivery_date">
                        <div class="errors" id="expected_delivery_date_errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_date"> Delivery Date</label>
                        <input type="date" name="delivery_date" class="form-control"  placeholder="Enter Delivery Date" 
                        value="{{ $package->delivery_date ?? old('delivery_date')}}" id="delivery_date">
                        <div class="errors" id="delivery_date_errors"></div>
                    </div>
                 
                        <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" 
                            value="{{ $package->customer_name ?? old('customer_name')}}" id="customer_name" required >
                            <div class="errors" id="customer_name_errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="facebook_name">Facebook Name</label>
                            <input type="text" name="facebook_name" class="form-control" placeholder="Enter Facebook Name" 
                            value="{{ $package->facebook_name ?? old('facebook_name')}}" id="facebook_name" required >
                            <div class="errors" id="facebook_name_errors"></div>
                        </div>
                       
                        <div class="form-group">
                    <label for="customer_phone">Customer Phone Number</label>
                    <input type="text" name="customer_phone" class="form-control"  placeholder="Enter Phone Number" 
                    value="{{ $package->customer_phone ?? old('customer_phone')}}" id="customer_phone" required>
                    <div class="errors" id="customer_phone_errors"></div>
                </div> 
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" rows="2" class="form-control"
                            value="{{ $package->address ?? old('address')}}"  id="address" required></textarea>
                            <div class="errors" id="address_errors"></div>
                        </div>

                    

                    <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control"  placeholder="Enter Quantity" 
                    value="{{ $package->quantity ?? old('quantity')}}" id="quantity" required>
                    <div class="errors" id="quantity_errors"></div>
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" name="cost" class="form-control"  placeholder="Enter Cost" 
                    value="{{ $package->cost ?? old('cost')}}" id="cost" required>
                    <div class="errors" id="cost_errors"></div>
                </div>
                <div class="form-group mb-2">    
                        <label for="customer_type" class="col-md-4 col-form-label ">{{ __('Customer Type') }}</label>
                        <select  class="form-select" aria-label="Default select example" name="customer_type" id="customer_type">
                        <option value="normal">Normal</option>    
                        <option value="whole_sale">Whole Sale</option>
                        </select>
                        <div class="errors" id="customer_type_errors"></div>
                    </div>

                <div class="form-group mb-4">    
                        <label for="clothing_type" class="col-md-4 col-form-label ">{{ __('Clothing Type') }}</label>
                        <select  class="form-select" aria-label="Default select example" name="clothing_type" id="clothing_type">
                        @foreach($clothing as $clothing)
                        <option value="{{ $clothing->name}}">{{ $clothing->name}}</option>
                        @endforeach   
                        </select>
                        <div class="errors" id="clothing_type_errors"></div>
                    </div>
                    
                    <div class="form-group mb-2">    
                        <label for="color" class="col-md-4 col-form-label ">{{ __('Color Type') }}</label>
                        <select  class="form-select" aria-label="Default select example" name="color" id="color">
                        @foreach($color as $color)
                        <option value="{{ $color->name}}">{{ $color->name}}</option>
                        @endforeach   
                        </select>
                        <div class="errors" id="color_errors"></div>
                    </div>
                    <div class="form-group mb-2">    
                        <label for="delivery_status" class="col-md-4 col-form-label ">{{ __('Delivery Status') }}</label>
                        <select  class="form-select" aria-label="Default select example" name="delivery_status" id="delivery_status">
                        <option value="Pending">Pending</option>
                        <option value="Deliverd">Delivered</option>
                     
                       
                        </select>
                        <div class="errors" id="delivery_status_errors"></div>
                    </div>

                    <div class="form-group mb-2">    
                        <label for="payment_status" class="col-md-4 col-form-label ">{{ __('Delivery Status') }}</label>
                        <select  class="form-select" aria-label="Default select example" name="payment_status" id="payment_status">
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                     
                       
                        </select>
                        <div class="errors" id="payment_status_errors"></div>
                    </div>
                    <div class="form-group mb-2">    
                        <label for="payment_type" class="col-md-4 col-form-label ">{{ __('Payment Type') }}</label>
                        <select  class="form-select" aria-label="Default select example" name="payment_type" id="payment_type">
                        <option value="Kpay">Kpay</option>
                        <option value="Wave_money">Wave Money</option>
                        <option value="AYA_Bank">AYA Bank</option>    
                        <option value="CB_Bank">CB Bank</option>
                       
                        </select>
                        <div class="errors" id="payment_type_errors"></div>
                    </div>

                    <div class="form-group">
                    <label for="delivery_fee">Delivery Fee</label>
                    <input type="number" name="delivery_fee" class="form-control"  placeholder="Enter Delivery Fee" 
                    value="{{ $package->delivery_fee ?? old('delivery_fee')}}" id="delivery_fee" required>
                    <div class="errors" id="delivery_fee_errors"></div>
                </div>

                       <div class="mt-4">
                          
                    <button class="btn btn-primary" >Update</button>
                    </div>
                      
                    </form>
        
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
   

@endsection
