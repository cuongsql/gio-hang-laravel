@extends('index')
@section('title', 'Carts')
    @section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Name</th>
                                <th scope="col">Available</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-right">Price</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->items as $item)                                
                            <tr>
                                <td><img src="{{ asset('storage/images/'. $item['item']->img) }}" width="100px" height="100px"/> </td>
                                <td>{{ $item['item']->name }}</td>
                                <td>In stock</td>
                                <td><input class="form-control change-quantity-product" data-id="{{ $item['item']->id }}" type="number" value="{{ $item['totalQty'] }}" /></td>
                                <td class="text-right" id="total-item-price-{{ $item['item']->id}}" >$ {{ number_format($item['totalPrice'], 0, ',' , '.')   }}</td>
                                <td class="text-right"><a href="{{ route('removeItemCart', $item['item']->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                            </tr>
                            @endforeach
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right" id="total-price"><strong>$ {{ number_format($cart->totalPrice, 0, ',' , '.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <button class="btn btn-block btn-light">Continue Shopping</button>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection