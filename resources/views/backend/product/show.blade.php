@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Detail Produk</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label><strong>Nama Produk:</strong></label>
                                <div>{{ $product->name }}</div>
                            </div>

                            <div class="mb-3">
                                <label><strong>Harga:</strong></label>
                                <div>Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label><strong>Kategori:</strong></label>
                                <div>{{ $product->category->name ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label><strong>Stok:</strong></label>
                                <div>{{ $product->stock }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label><strong>Gambar:</strong></label><br>
                                @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="Gambar Produk" class="img-thumbnail"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                <div>Tidak ada gambar</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label><strong>Deskripsi:</strong></label>
                                <div>{!! $product->description !!}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection