@extends('layouts.backend')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <span>Data Blog</span>
                    <a href="{{ route('backend.blogs.create') }}" class="btn btn-info btn-sm">
                        Tambah Blog
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped" id="datatable-blog">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->created_at->translatedFormat('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('backend.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('backend.blogs.show', $blog->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                        <form action="{{ route('backend.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#datatable-blog');

</script>
@endpush
