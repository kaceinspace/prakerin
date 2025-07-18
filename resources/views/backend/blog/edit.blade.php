@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Blog</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Konten</label>
                            <textarea name="content" class="form-control" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewThumbnail(event)">
                            <img id="thumbnail-preview" src="{{ isset($blog) && $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : '#' }}" alt="Preview" class="mt-2" style="max-height: 150px; {{ isset($blog) && $blog->thumbnail ? '' : 'display: none;' }}">
                        </div>



                        <button type="submit" class="btn btn-primary">Update</button>
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
    tinymce.init({
        selector: 'textarea[name=content]'
        , height: 400
        , menubar: false
    });

</script>
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


@endpush
