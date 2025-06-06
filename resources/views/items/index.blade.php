@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Item</h1>
        @auth
            <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Item</a>
        @endauth
    </div>
    
    <div class="list-group">
        @foreach($items as $item)
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->description }}</p>
                    </div>
                    @auth
                        <div>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection