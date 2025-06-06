@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ isset($item) ? 'Edit' : 'Tambah' }} Item</div>
        
        <div class="card-body">
            <form method="POST" action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}">
                @csrf
                @if(isset($item))
                    @method('PUT')
                @endif
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $item->name ?? '') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $item->description ?? '') }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection