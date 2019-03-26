@extends('layouts.guest.master')
@section('title','Hải Sản Tên Lửa')
@section('content')
@include('component.cart_modal')
<div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Tất Cả Sản Phẩm
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->

            <!-- //product left -->
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-12">
                <div class="wrapper">

                    <!-- first section (nuts) -->
                    @foreach($categories as $cate)
                    <div class="product-sec1">
                        <h3 class="heading-tittle">{{ $cate->name }}</h3>
                        @foreach($products[$cate->id] as $item)
                        @foreach($item->product_variants as $product)
                        @if($product->status == 1 &&  $product->image)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img style="width:250px;height:200px" src="{{ asset('image/product/'.$product->image) }}" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('detail_product',$item->slug) }}" class="link-product-add-cart">Chi Tiết</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{ $item->getHot() }}</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">{{ $item->name }}</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">{{ $product->getPrice() }}</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Almonds, 100g" />
                                                <input type="hidden" name="amount" value="149.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                {{--  <input type="submit" data-toggle="modal" data-target="#myModal" name="submit" value="Thêm Vào Giỏ Hàng" class="button" />  --}}
                                            </fieldset>
                                        </form>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Vào Giỏ Hàng</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
@endsection
