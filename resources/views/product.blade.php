@extends('layouts.frontend')
@section('content')
    <!-- shop__section__start-->
    <div class="shop sp_top_80">
        <div class="container">
            <div class="row grid__responsive">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">


                    <button type="button" class="default__button sidebar-collapse-btn" data-aos="fade-up"
                        data-aos-duration="1800">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 32 32" width="24">
                            <g id="Layer_2" data-name="Layer 2">
                                <path
                                    d="m28.552 6.184h-2.671a4.556 4.556 0 0 0 -8.659 0h-13.774a1.449 1.449 0 0 0 0 2.9h13.774a4.556 4.556 0 0 0 8.659 0h2.671a1.449 1.449 0 0 0 0-2.9zm-7 3.138a1.69 1.69 0 1 1 1.689-1.69 1.692 1.692 0 0 1 -1.689 1.69z">
                                </path>
                                <path
                                    d="m28.552 14.552h-13.774a4.556 4.556 0 0 0 -8.659 0h-2.671a1.448 1.448 0 0 0 0 2.9h2.671a4.556 4.556 0 0 0 8.659 0h13.774a1.448 1.448 0 0 0 0-2.9zm-18.1 3.138a1.69 1.69 0 1 1 1.686-1.69 1.692 1.692 0 0 1 -1.69 1.69z">
                                </path>
                                <path
                                    d="m28.552 22.919h-2.671a4.556 4.556 0 0 0 -8.659 0h-13.774a1.449 1.449 0 0 0 0 2.9h13.774a4.556 4.556 0 0 0 8.659 0h2.671a1.449 1.449 0 0 0 0-2.9zm-7 3.138a1.69 1.69 0 1 1 1.689-1.689 1.692 1.692 0 0 1 -1.689 1.689z">
                                </path>
                            </g>
                        </svg>
                        FILTER
                    </button>



                    <div class="sidebar sidebar-collapse-hide">
                        <div class="sidebar__widget widget-collapse-show">
                            <div class="sidebar__title">
                                <h4>Categories</h4>
                                <i class="fa fa-angle-down"></i>
                            </div>

                            <div class="sidebar__menu">
                                <ul>
                                    @foreach ($category as $cat)
                                        <li>
                                            <a href="#">{{ $cat->name }}
                                                <span>({{ $cat->product->count() }})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">

                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                            aria-labelledby="projects__one">
                            <div class="row grid__responsive">
                                @foreach ($product as $data)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                        <div class="grid__wraper">
                                            <div class="grid__wraper__img">
                                                <div class="grid__wraper__img__inner">
                                                    <a href="{{ url('/product/' . $data->slug) }}">
                                                        @php
                                                            $image =
                                                                $data->image && Storage::exists($data->image)
                                                                    ? Storage::url($data->image)
                                                                    : asset('assets/frontend/img/grid/grid__1.png');
                                                            $secondaryImage =
                                                                $data->image && Storage::exists($data->image)
                                                                    ? Storage::url($data->image)
                                                                    : asset('assets/frontend/img/grid/grid__2.png');
                                                        @endphp
                                                        <img class="primary__image" src="{{ $image }}"
                                                            alt="{{ $data->name }}">
                                                        <img class="secondary__image" src="{{ $secondaryImage }}"
                                                            alt="{{ $data->name }}">
                                                    </a>
                                                </div>

                                                <div class="grid__wraper__icon">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('cart.add', $data->id) }}"
                                                                onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $data->id }}').submit();"
                                                                data-bs-toggle="tooltip" title="Add To Cart">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>

                                                            <form id="add-to-cart-form-{{ $data->id }}"
                                                                action="{{ route('cart.add', $data->id) }}" method="POST"
                                                                class="d-none">
                                                                @csrf
                                                                <input type="hidden" name="qty" value="1">
                                                            </form>

                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="grid__wraper__badge">
                                                    <span class="sale__badge">New</span>
                                                </div>
                                            </div>
                                            <div class="grid__wraper__info">
                                                <h3 class="grid__wraper__tittle">
                                                    <a href="{{ url('/product/' . $data->slug) }}">{{ $data->name }}</a>
                                                </h3>
                                                <div class="grid__wraper__price">
                                                    <span>Rp {{ number_format($data->price, 0, ',', '.') }}</span>
                                                </div>
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
    </div>
    <!-- shop__section__start-->
@endsection
