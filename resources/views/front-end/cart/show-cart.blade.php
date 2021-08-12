@extends('front-end.master')
@section('body')

	<!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Add To Cart</span></h3>
        </div>
    </div>
<!--banner-->

<!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row"> 
                <div class="col-md-11 col-md-offset-1">
                    <h3 class="text-center text-success"> My Shopping Cart</h3>
                    <hr/>
                    <table class="table table-bordered">
                        <tr class="bg-primary text-center">
                            <th>SL No </th>
                            <th>name </th>
                            <th>Image </th>
                            <th>Price </th>
                            <th>Quantity </th>
                            <th> Total Price </th>
                            <th>Action </th>
                        </tr>
                        @php($i=1)
                            
                       @php($sum=0)
                        @foreach ($cartProducts as $cartProduct)
                            
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$cartProduct->name}}</td>
                           <td><img src="{{asset($cartProduct->options->image)}}" alt="" height="50" width="50 "/></td>
                            <td>TK. {{$cartProduct->price}}</td>
                            <td>
                                <form action="{{route('update-cart')}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="number" name="qty" value="{{ $cartProduct->qty}}" min="1" />
                                   <input type="hidden" name="rowId" value="{{ $cartProduct->rowId}}" min="1" />
                                   <input type="submit" name="btn" value="Update"/>
                                
                                </form>
                            </td>
                            <td>TK. {{$total=$cartProduct->price*$cartProduct->qty}}</td>
                            <td>
                                <a href="{{ route('delete-cart-item',['rowId'=>$cartProduct->rowId])}}" class="btn btn-danger btn-xs" title="Delete">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </a>
                            </td>

                        </tr>
                        <?php $sum = $sum+$total; ?>
                        @endforeach

                    </table>
                    <hr/>
                    <table class="table table-bordered">
                        <tr>
                            <th>Item Total (TK.)</th>
                            <td>{{$sum }}</td>
                        </tr>
                        <tr>
                            <th>Vat Total(TK.)</th>
                            <td>{{$vat=0 }}</td>
                        </tr>
                        <tr>
                            <th>Grand Total(TK.)</th>
                            <td>{{$orderTotal=$sum+$vat}}</td>
                            <?php
                                Session::put('orderTotal', $orderTotal);
                            ?>
                        </tr>
                    </table>
                </div>
                </div>
               
                        </div>

                        <div class="row"> 
                            <div class="col-md-11 col-md-offset-1">
                                @if (Session::get('customerId') && Session::get('shippingId'))
                                    
                              
                                <a href="{{route('checkout-payment')}}" class="btn btn-success pull-right"> checkout</a>

                                @elseif(Session::get('customerId'))
                                <a href="{{route('checkout-shipping')}}" class="btn btn-success pull-right"> checkout</a>
                                @else
                                <a href="{{route('checkout')}}" class="btn btn-success pull-right"> checkout</a>

                                @endif
                                <a href="" class="btn btn-success "> Continue Shopping</a>

                            </div>
                            </div>
                           


                    </div>
                
                <!--Product Description-->
                  
        <!--new-arrivals-->
    </div>
    
@endsection