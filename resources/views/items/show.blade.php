@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Detail Item</div>
        
        <div class="card-body">
            <h3>{{ $item->name }}</h3>
            <p>{{ $item->description }}</p>
            
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection