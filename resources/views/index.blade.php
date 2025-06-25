@extends('layouts.frontend')
@section('content')
<!-- herobanner__start -->
<div class="herobanner">
    <div class=" container-fluid hero__fullwidth__spacing">

        <div class="herobanner__inner">


            <div class="container herobannerarea__slider  slider__default__arrow slider__default__dot">
                <div class="herobannerarea__slider__single">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 herobanner__text__side">
                            <div class="herobanner__text__wraper ltn__slide-animation">
                                <h1 class="herobanner__title herobanner__title__color animated">Men Collection
                                </h1>
                                <div class="herobanner__text herobanner__text__color  animated">
                                    <p>Enchanting Styles for Dreamy Souls.</p>
                                </div>
                                <div class="herobanner__button herobanner__button__color  animated">
                                    <a href="#" class="default__button" tabindex="0">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 herobanner__img__side">
                            <div class="herobanner__img">
                                <img src="{{asset('assets/frontend/img/herobanner/main_herobanner__2.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="herobannerarea__slider__single">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 herobanner__text__side">
                            <div class="herobanner__text__wraper ltn__slide-animation">
                                <h1 class="herobanner__title herobanner__title__color animated">Women Collection
                                </h1>
                                <div class="herobanner__text herobanner__text__color  animated">
                                    <p>Enchanting Styles for Dreamy Souls.</p>
                                </div>
                                <div class="herobanner__button herobanner__button__color  animated">
                                    <a href="#" class="default__button" tabindex="0">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 herobanner__img__side">
                            <div class="herobanner__img">
                                <img src="{{asset('assets/frontend/img/herobanner/main_herobanner__1.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="herobannerarea__slider__single">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 herobanner__text__side">
                            <div class="herobanner__text__wraper ltn__slide-animation">
                                <h1 class="herobanner__title herobanner__title__color animated">Kids Collection
                                </h1>
                                <div class="herobanner__text herobanner__text__color  animated">
                                    <p>Enchanting Styles for Dreamy Souls.</p>
                                </div>
                                <div class="herobanner__button herobanner__button__color  animated">
                                    <a href="#" class="default__button" tabindex="0">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 herobanner__img__side">
                            <div class="herobanner__img">
                                <img src="{{asset('assets/frontend/img/herobanner/main_herobanner__3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- herobanner__end -->


<!-- best__selling__start -->
<div class="best__selling sp_bottom_80">
    <div class="container">

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="section__title">
                    <h2>Best Selling</h2>
                </div>
            </div>
          
        </div>

        <div class="tab-content " id="myTabContent">
            <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                <div class="row grid__responsive">
                    {{-- loop --}}
                    @foreach ($product as $data)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="grid__wraper">
                            <div class="grid__wraper__img">
                                <div class="grid__wraper__img__inner">
                                    <a href="/product/{{ $data->slug }}">
                                        <img class="primary__image" src="{{ Storage::url($data->image) }}"
                                            alt="Primary Image">
                                        <img class="secondary__image" src="{{Storage::url($data->image)}}"
                                            alt="Secondary Image">
                                    </a>
                                </div>
                                <div class="grid__wraper__icon">
                                    <ul>
                                        <li>
                                            <span data-bs-toggle="modal"
                                                data-bs-target="#productModal-{{ $data->slug }}">
                                                <a class="quick__view__action" href="#" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Quick View"
                                                    data-bs-original-title="Quick View">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </span>
                                        </li>

                                        <li>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Add To Cart" data-bs-original-title="Add To Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="grid__wraper__badge">
                                    <span class="new__badge">New</span>
                                </div>
                            </div>
                            <div class="grid__wraper__info">
                                <h3 class="grid__wraper__tittle">
                                    <a href="/product/{{ $data->slug }}" tabindex="0">
                                        {{ $data->name }}
                                    </a>
                                </h3>
                                <div class="grid__wraper__price">

                                    <span>Rp.{{number_format($data->price,0,'.','.')}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- endloop --}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="best__selling__button">
                    <a class="default__button" href="#">View All</a>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- best__selling__start -->


<!-- fetaure__section__start -->
<div class="feature__2 sp_bottom_80">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="feature__2__single">
                    <div class="feature__2__icon">
                        <img src="{{asset('assets/frontend/img/feature/feature__1.svg')}}" alt="">
                    </div>
                    <div class="feature__2__text">
                        <h4>Free Shipping</h4>
                        <p>On orders over <strong>$99.</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="feature__2__single">
                    <div class="feature__2__icon">
                        <img src="{{asset('assets/frontend/img/feature/feature__2.svg')}}" alt="">
                    </div>
                    <div class="feature__2__text">
                        <h4>Money Back</h4>
                        <p>Money back in 15 days..</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="feature__2__single">
                    <div class="feature__2__icon">
                        <img src="{{asset('assets/frontend/img/feature/feature__3.svg')}}" alt="">
                    </div>
                    <div class="feature__2__text">
                        <h4>Secure Checkout</h4>
                        <p>100% Payment Secure.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="feature__2__single">
                    <div class="feature__2__icon">
                        <img src="{{asset('assets/frontend/img/feature/feature__4.svg')}}" alt="">
                    </div>
                    <div class="feature__2__text">
                        <h4>Online Support</h4>
                        <p>Ensure the product quality.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fetaure__section__end -->

<!-- modal__section__start -->
@foreach ($product as $data)
<div class="grid__quick__view__modal modalarea modal fade" id="productModal-{{ $data->slug }}" tabindex="-1"
    aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="grid__quick__img">
                            <img src="{{ Storage::url($data->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="grid__quick__content">
                            <h3>{{$data->name}}</h3>
                            <div class="quick__price">
                                Rp. {{number_format($data->price,0,'.','.')}}
                            </div>
                            <p>{{$data->description}}</p>
                            <div class="featurearea__quantity">
                                <div class="qty-container">
                                    <button class="qty-btn-minus btn-qty" type="button"><i
                                            class="fa fa-minus"></i></button>
                                    <input type="text" name="qty" value="1" class="input-qty">
                                    <button class="qty-btn-plus btn-qty" type="button"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                                <a class="default__button" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
