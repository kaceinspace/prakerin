@extends('layouts.frontend')

@section('content')
    <!-- breadcrumb__start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__title">
                        <h1>Product</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li class="color__blue">Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb__end -->

    <!-- single__product__start -->
    <div class="single__product sp_top_50 sp_bottom_80">
        <div class="container">
            <div class="row">
                <!-- Image Section -->
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="featurearea__details__img">
                        <div class="featurearea__big__img">
                            <div class="featurearea__single__big__img">
                                <img src="{{ Storage::exists($product->image) ? Storage::url($product->image) : asset('assets/frontend/img/grid/grid__1.png') }}"
                                    alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="featurearea__thumb__img featurearea__thumb__img__slider__active slider__default__arrow">
                            <div class="featurearea__single__thumb__img">
                                <img src="{{ Storage::exists($product->image) ? Storage::url($product->image) : asset('assets/frontend/img/grid/grid__1.png') }}"
                                    alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="single__product__wrap">
                        <div class="single__product__heding">
                            <h2>{{ $product->name }}</h2>
                        </div>

                        <div class="single__product__price">
                            <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>

                        <hr>

                        <div class="single__product__description">
                            <p>{{ $product->description }}</p>
                        </div>


                        <div class="single__product__special__feature">
                            <ul>
                                <li class="product__variant__inventory">
                                    <strong class="inventory__title">Availability:</strong>
                                    <span
                                        class="variant__inventory">{{ $product->stock > 0 ? $product->stock . ' left in stock' : 'Out of Stock' }}</span>
                                </li>
                            </ul>
                        </div>

                        <hr>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="single__product__quantity">
                                <div class="qty-container">
                                    <button type="button" class="qty-btn-minus btn-qty">-</button>
                                    <input type="text" name="qty" value="1" class="input-qty">
                                    <button type="button" class="qty-btn-plus btn-qty">+</button>
                                </div>
                                <button type="submit" class="default__button">
                                    <i class="fas fa-shopping-cart"></i> Add to cart
                                </button>
                                <a class="default__button black__button" href="#">Buy it now</a>
                            </div>
                        </form>

                        <div class="single__product__bottom__menu">
                            <ul>
                                <li><a href="#"><i class="far fa-heart"></i> Add to wishlist</a></li>
                                <li><a href="#"><i class="fas fa-exchange-alt"></i> Compare</a></li>
                                <li><a href="#"><i class="far fa-envelope"></i> Ask a Question</a></li>
                                <li><a href="#"><i class="far fa-chart-bar"></i> Size Chart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="single__product__contact sp_bottom_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2>For furthermore help, contact with our support team.</h2>
                    <div class="single__product__contact__button">
                        <a href="#" class="default__button">Contact Us</a>
                    </div>
                    <h3 class="single__product__contact__number"><i class="fas fa-phone"></i> +0123-456-789</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
