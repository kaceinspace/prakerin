@extends('layouts.frontend')

@section('content')
<!-- Breadcrumb Start -->
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
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="single__product sp_top_50 sp_bottom_80">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-xl-6 col-lg-6">
                <div class="featurearea__details__img">
                    <div class="featurearea__big__img">
                        <div class="featurearea__single__big__img">
                            <img src="{{  Storage::url($product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="featurearea__thumb__img featurearea__thumb__img__slider__active slider__default__arrow">
                        <div class="featurearea__single__thumb__img">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-xl-6 col-lg-6">
                <div class="single__product__wrap">
                    <div class="single__product__heding">
                        <h2>{{ $product->name }}</h2>
                    </div>

                    <div class="single__product__price mb-2">
                        <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <hr>

                    <div class="single__product__description mb-3">
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="single__product__special__feature mb-3">
                        <ul>
                            <li class="product__variant__inventory">
                                <strong class="inventory__title">Availability:</strong>
                                <span class="variant__inventory">
                                    {{ $product->stock > 0 ? $product->stock . ' left in stock' : 'Out of Stock' }}
                                </span>
                            </li>
                            <li>
                                @php $averageRating = $product->reviews()->avg('point');

                                @endphp
                                @if($averageRating)
                                <p>Rating rata-rata: <strong>{{ number_format($averageRating, 1) }}/5</strong></p>
                                @endif

                            </li>
                        </ul>
                    </div>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="single__product__quantity mb-3">
                            <div class="qty-container me-3">
                                <button type="button" class="qty-btn-minus btn-qty">-</button>
                                <input type="text" name="qty" value="1" max="{{ $product->stock }}" class="input-qty">
                                <button type="button" class="qty-btn-plus btn-qty">+</button>
                            </div>
                            <button type="submit" class="default__button">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                            <a href="#" class="default__button black__button">Buy it Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review & Contact Section -->
<div class="single__product__contact sp_bottom_80">
    <div class="container">
        <div class="row g-5">
            <!-- Form Review -->
            <div class="col-xl-6">
                <div class="border p-4 rounded shadow-sm">
                    <h5 class="mb-4">Tulis Ulasan Anda</h5>
                    @auth
                    <form action="{{ route('review.store', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            <label for="point" class="form-label">Rating</label>
                            <select name="point" id="point" class="form-select" required>
                                <option value="">Pilih rating</option>
                                @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }} Bintang</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komentar</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
                    </form>
                    @else
                    <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk memberikan ulasan.</p>
                    @endauth
                </div>
            </div>

            <!-- Display Reviews -->
            <div class="col-xl-6">
                <div class="border p-4 rounded shadow-sm">
                    <h5 class="mb-4">Ulasan Pelanggan</h5>
                    @forelse ($product->reviews as $review)
                    <div class="mb-4 pb-3 border-bottom">
                        <div class="d-flex justify-content-between mb-2">
                            <strong>{{ $review->user->name }}</strong>
                            <small class="text-muted">{{ $review->created_at->format('d M Y, H:i') }}</small>
                        </div>
                        <div class="mb-1">
                            @for ($i = 1; $i <= 5; $i++) <i
                                class="fa{{ $i <= $review->point ? 's' : 'r' }} fa-star text-warning"></i>
                                @endfor
                        </div>
                        <p class="mb-0">{{ $review->comment }}</p>
                    </div>
                    @empty
                    <p class="text-muted">Belum ada ulasan untuk produk ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection