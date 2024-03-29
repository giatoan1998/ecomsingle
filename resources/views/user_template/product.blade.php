@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <div class="jewellery_img"><img src="{{ asset($product->product_img) }}"></div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                <div class="product-info">
                    <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                    <p class="price_text text-left">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                </div>
                <div class="my-3 product-detail">
                    <p class="lead">
                        {{ $product->product_long_des }}
                    </p>
                    <ul class="py-2 bg-light my-2">
                        <li>Category - {{ $product->product_category_name }}</li>
                        <li>Sub Category - {{ $product->product_subcategory_name }}</li>
                        <li>Available quantity - {{ $product->quantity }}</li>
                    </ul>
                </div>
                <div class="btn_main">
                    <form action="{{ route('addproducttocart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="" value="{{ $product->id }}">
                        <div class="form-group">
                            <input type="hidden" name="price" id="" value="{{ $product->price }}">
                            <label for="quantity">How Many Pics? </label>
                            <input type="number" min="1" placeholder="1" name="quantity" id="quantity" class="form-control">
                        </div>
                        <input type="submit" name="" id="" value="Add To Cart" class="btn btn-warning">
                    </form>
                 </div>
            </div>
        </div>
    </div>

    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
            <h1 class="fashion_taital">Related Products</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @foreach ($related_products as $product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $product->product_name }}</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                            <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                            <div class="btn_main">
                                <div class="buy-bt">
                                    <form action="{{ route('addproducttocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" id="" value="{{ $product->id }}">
                                        <input type="hidden" name="price" id="" value="{{ $product->price }}">
                                        <input type="hidden" name="quantity" id="" value="1">
                                        <br>
                                        <input type="submit" name="" id="" value="Buy Now" class="btn btn-warning">
                                    </form>
                                </div>
                                <div class="seemore_bt"><a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See More</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            </div>
        </div>
     </div>
</div>
@endsection