@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">Tambah Blog</div>
                <div class="card-body">
                    <form action="{{ route('backend.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewThumbnail(event)">
                            <img id="thumbnail-preview" src="{{ isset($blog) && $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : '#' }}" alt="Preview" class="mt-2" style="max-height: 150px; {{ isset($blog) && $blog->thumbnail ? '' : 'display: none;' }}">
                        </div>


                        <div class="mb-3">
                            <label>Konten</label>
                            <textarea name="content" class="form-control tiny-editor"></textarea>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/ctgoj8efdfr1i2jqusoi0hyy1luhjn7lk7r8rnmmhe2f6r35/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    function previewThumbnail(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnail-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script>
    tinymce.init({
        selector: '.tiny-editor'
        , height: 300
        , menubar: false
        , plugins: 'link image code lists'
        , toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code'
        , relative_urls: false
    , });

</script>
@endpush
