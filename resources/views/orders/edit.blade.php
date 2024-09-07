@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Menggunakan PATCH karena ini adalah update -->

        <!-- Input Fields (pre-filled with existing order data) -->
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $order->tanggal_masuk) }}" required>
        </div>
        <div class="form-group">
            <label for="nama_client">Nama Client</label>
            <input type="text" name="nama_client" class="form-control capitalize" value="{{ old('nama_client', $order->nama_client) }}" required>
        </div>
        <div class="form-group">
            <label for="no_handphone">No Handphone</label>
            <input type="text" name="no_handphone" class="form-control" value="{{ old('no_handphone', $order->no_handphone) }}" required>
        </div>
        <div class="form-group">
            <label for="merk_sepatu">Merk Sepatu</label>
            <input type="text" name="merk_sepatu" class="form-control capitalize" list="merkList" value="{{ old('merk_sepatu', $order->merk_sepatu) }}" required>
            <datalist id="merkList">
                @foreach($existingMerk as $merk)
                    <option value="{{ $merk }}">
                @endforeach
            </datalist>
        </div>
        <div class="form-group">
            <label for="jenis_sepatu">Jenis Sepatu</label>
            <input type="text" name="jenis_sepatu" class="form-control capitalize" list="jenisList" value="{{ old('jenis_sepatu', $order->jenis_sepatu) }}" required>
            <datalist id="jenisList">
                @foreach($existingJenis as $jenis)
                    <option value="{{ $jenis }}">
                @endforeach
            </datalist>
        </div>
        <div class="form-group">
            <label for="service">Service</label>
            <select name="service" id="service" class="form-control" required>
                <option value="" disabled>Pilih Service</option>
                <option value="Basic" {{ old('service', $order->service) == 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Medium" {{ old('service', $order->service) == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Hard" {{ old('service', $order->service) == 'Hard' ? 'selected' : '' }}>Hard</option>
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $order->harga) }}" required>
        </div>
        <div class="form-group">
            <label for="keluar_sepatu">Tanggal Keluar</label>
            <input type="date" name="keluar_sepatu" class="form-control" value="{{ old('keluar_sepatu', $order->keluar_sepatu) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
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

            if (service === 'Basic') {
                harga = 30000;
            } else if (service === 'Medium') {
                harga = 50000;
            } else if (service === 'Hard') {
                harga = 75000;
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
