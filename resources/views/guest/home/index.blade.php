@extends('layouts.guest.master')
@section('title','Hải Sản Tên Lửa')

@section('content')
@include('share.slide')
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

                    <div class="product-sec1">

                        <h3 class="heading-tittle">{{ $categorySelling->name }}</h3>
                        @foreach($productSelling as $product)
                        @foreach($product->product_variants as $variant)
                        @if($variant->status == 1 && $variant->image)

                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img style="width:250px;height:200px" src="{{ asset('image/product/'.$variant->image) }}" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('detail_product',$product->slug) }}" class="link-product-add-cart">Chi Tiết</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{ $product->getHot() }}</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">{{ $product->name }}</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">Giá :  {{ $variant->getPrice() }}</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="{{ $variant->id }}" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="{{ $product->name }}" />
                                                <input type="hidden" name="amount" value="149.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                    <!-- //first section (nuts) -->
                    <!-- second section (nuts special) -->
                    <!-- //second section (nuts special) -->
                    <!-- third section (oils) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">{{ $categorySpecial->name }}</h3>
                        @foreach($productSpecial as $item)
                        @foreach($item->product_variants as $variant)
                        @if($variant->status == 1 && $variant->image)
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img style="width:250px;height:200px" src="{{ asset('image/product/'.$variant->image) }}" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('detail_product',$product->slug) }}" class="link-product-add-cart">Chi Tiết</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{ $product->getHot() }}</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">{{ $product->name }}</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">Giá : {{ $variant->getPrice() }}</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="{{ $product->name }}" />
                                                <input type="hidden" name="amount" value="78.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                    <!-- //third section (oils) -->
                    <!-- fourth section (noodles) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">Pasta & Noodles</h3>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/mk7.jpg" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="single.html" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">Yippee Noodles, 65g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$15.00</span>
                                        <del>$25.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="YiPPee Noodles, 65g" />
                                                <input type="hidden" name="amount" value="15.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/mk8.jpg" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="single.html" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">Wheat Pasta, 500g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$98.00</span>
                                        <del>$120.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Wheat Pasta, 500g" />
                                                <input type="hidden" name="amount" value="98.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/mk9.jpg" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="single.html" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">Chinese Noodles, 68g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$11.99</span>
                                        <del>$15.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Chinese Noodles, 68g" />
                                                <input type="hidden" name="amount" value="11.99" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //fourth section (noodles) -->
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->
    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->

            <h3 class="tittle-w3l">{{ $categorySlide->name }}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach($productSlide as $product)
                    @foreach($product->product_variants as $variant)
                    @if($variant->status == 1 && $variant->image)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="single.html">
                                    <img style="width:280px;height:150px" src="{{ asset('image/product/'.$variant->image) }}" alt="">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="single.html">{{ $product->name }}</a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>Giá : {{ $variant->getPrice() }}</h6>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                                            <input type="hidden" name="amount" value="220.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button" />
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
