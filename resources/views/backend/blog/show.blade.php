@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow rounded-4 border-0">
                @if($blog->thumbnail)
                <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt="Thumbnail" class="card-img-top rounded-top-4" style="max-height: 400px; object-fit: cover;">
                @endif

                <div class="card-body p-4">
                    <h2 class="card-title mb-3">{{ $blog->title }}</h2>

                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3">
                            <i class="ti ti-user text-primary"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">{{ $blog->user->name }}</div>
                            <small class="text-muted">Dipublikasikan pada {{ $blog->created_at->format('d M Y') }}</small>
                        </div>
                    </div>

                    <div class="content fs-5 lh-lg">
                        {!! $blog->content !!}
                    </div>

                    <a href="{{ route('backend.blogs.index') }}" class="btn btn-outline-secondary mt-4 rounded-pill px-4">
                        <i class="ti ti-arrow-left me-1"></i> Kembali ke Daftar Blog
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
