@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Order</a>
    <h1>Tambah Order Baru</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <!-- Input Fields -->
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}" required>
        </div>
        
        <div class="form-group">
            <label for="nama_client">Nama Client</label>
            <input type="text" name="nama_client" class="form-control capitalize" value="{{ old('nama_client') }}" required>
        </div>
        
        <div class="form-group">
            <label for="no_handphone">No Handphone</label>
            <input type="text" name="no_handphone" class="form-control" value="{{ old('no_handphone') }}" required>
        </div>

        <div class="form-group">
            <label for="merk_sepatu">Merk Sepatu</label>
            <input type="text" name="merk_sepatu" class="form-control capitalize" list="merkList" value="{{ old('merk_sepatu') }}" required>
            <datalist id="merkList">
                @foreach($existingMerk as $merk)
                    <option value="{{ $merk }}">
                @endforeach
            </datalist>
        </div>

        <div class="form-group">
            <label for="jenis_sepatu">Jenis Sepatu</label>
            <input type="text" name="jenis_sepatu" class="form-control capitalize" list="jenisList" value="{{ old('jenis_sepatu') }}" required>
            <datalist id="jenisList">
                @foreach($existingJenis as $jenis)
                    <option value="{{ $jenis }}">
                @endforeach
            </datalist>
        </div>

        <div class="form-group">
            <label for="service">Service</label>
            <select name="service" id="service" class="form-control" required>
                <option value="" selected disabled>Pilih Service</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
                <option value="Repaint + Cuci">Repaint + Cuci</option>
                <option value="Sol Jahit + Cuci">Sol Jahit + Cuci</option>
                <option value="Sol Lem + Cuci">Sol Lem + Cuci</option>
                <option value="Unyellowing">Unyellowing</option>
                <option value="All Package">All Package</option>
                <option value="Promo (2 get 1)">Promo (2 get 1)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Order</button>
    </form>
</div>

<!-- JavaScript for Autofill and Capitalization -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const serviceSelect = document.getElementById('service');
        const hargaInput = document.getElementById('harga');

        serviceSelect.addEventListener('change', function () {
            const service = this.value;
            let harga = 0;

            if (service === 'Easy') {
                harga = 30000;
            } else if (service === 'Medium') {
                harga = 50000;
            } else if (service === 'Hard') {
                harga = 75000;
            } else if (service === 'Repaint + Cuci') {
                harga = 225000;
            } else if (service === 'Sol Jahit + Cuci') {
                harga = 150000;
            } else if (service === 'Sol Lem + Cuci') {
                harga = 125000;
            } else if (service === 'Unyellowing') {
                harga = 180000;
            } else if (service === 'All Package') {
                harga = 300000;
            } else if (service === 'Promo (2 get 1)') {
                harga = 150000;
            } 

            hargaInput.value = harga;
        });

        document.querySelectorAll('.capitalize').forEach(function(input) {
            input.addEventListener('input', function() {
                this.value = this.value.replace(/\b\w/g, function(l) { return l.toUpperCase() });
            });
        });
    });
</script>
@endsection
