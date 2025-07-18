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
                                <img src="{{ Storage::url($product->image) }}" alt="Gambar Produk" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
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

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label><strong>Galeri Gambar Produk</strong></label>

                            {{-- Dropzone --}}
                            <form action="{{ route('backend.product.images.store', $product->id) }}" class="dropzone" id="image-dropzone" enctype="multipart/form-data">
                                @csrf
                            </form>

                            {{-- List Gambar --}}
                            <div class="row mt-3">
                                @foreach ($product->images as $img)
                                <div class="col-md-2 mb-3 text-center">
                                    <img src="{{ Storage::url($img->image) }}" class="img-fluid rounded" style="height:100px; object-fit:cover">
                                    <form action="{{ route('backend.product.images.destroy', $img->id) }}" method="POST" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-block">Hapus</button>
                                    </form>
                                </div>
                                @endforeach
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
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/backend/libs/dropzone/dist/min/dropzone.min.css') }}" type="text/css">
@endsection

@push('scripts')
<script src="{{ asset('assets/backend/libs/dropzone/dist/min/dropzone.min.js') }}" type="text/javascript"></script>
<script>
    Dropzone.options.imageDropzone = {
        paramName: 'file'
        , maxFilesize: 2, // MB
        acceptedFiles: '.jpeg,.jpg,.png'
        , uploadMultiple: false, // karena 1 per 1 tetap, Dropzone kirim file satu-satu
        parallelUploads: 5
        , timeout: 5000
        , addRemoveLinks: true
        , success: function() {
            // Gunakan AJAX refresh, agar tidak reload halaman penuh
            setTimeout(() => {
                location.reload();
            }, 500);
        }
    };

</script>
@endpush
