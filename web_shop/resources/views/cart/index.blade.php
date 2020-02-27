@extends('index')

@section('title', ' Shopping')

@section('content')
<div class="container">
    <div class="row">
        @forelse($products as $key => $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="{{ asset('storage/images/'.$product->img) }}">
                        <img class="pic-2" src="https://vozer.vn/images/smileys/73.png" style="width:240px;height:240px">
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="{{ route('addToCart', $product->id) }}" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                <span class="product-discount-label">{{ $product->category->name }}</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                </ul>
                <div class="product-content">
                <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                    <div class="price">${{ number_format($product->price, 0, ',' , '.') }}
                        <span>$${{ number_format($product->price * 2, 0, ',' , '.') }}</span>
                    </div>
                <a class="add-to-cart" href="{{ route('addToCart', $product->id) }}">+ Add To Cart</a>
                </div>
            </div>
        </div>
        @empty
        <p>No data</p>
    @endforelse
    </div>
</div>
@endsection