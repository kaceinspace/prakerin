@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Tambah Kupon</h4>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Tambah Kupon Baru
        </div>
        <div class="card-body">
            <form action="{{ route('backend.coupons.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Kode Kupon</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipe Diskon</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Nominal Tetap</option>
                        <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Persentase</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="value" class="form-label">Nilai</label>
                    <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('backend.coupons.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const valueField = document.getElementById('value');
    const typeField = document.getElementById('type');

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    function cleanNumber(str) {
        return str.replace(/[^\d]/g, '');
    }

    function handleValueInput() {
        let type = typeField.value;
        let raw = cleanNumber(valueField.value);

        if (type === 'fixed') {
            valueField.value = formatRupiah(raw);
        } else if (type === 'percent') {
            if (raw > 100) raw = 100;
            valueField.value = raw + '%';
        }
    }

    valueField.addEventListener('input', handleValueInput);
    typeField.addEventListener('change', function() {
        valueField.value = '';
    });

</script>
@endpush
