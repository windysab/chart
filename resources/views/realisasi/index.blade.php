<!-- resources/views/realisasi/index.blade.php -->

@extends('layouts.app')

@section('title', 'Data Realisasi')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Realisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Realisasi</a></div>
                <div class="breadcrumb-item">Data Realisasi</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Realisasi</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Data</th>
                                <th>Pagu</th>
                                <th>Realisasi</th>
                                <th>P</th>
                                <th>R</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($realisasiData as $realisasi)
                            <tr>
                                <td>{{ $realisasi->type }}</td>
                                <td>{{ $realisasi->data }}</td>
                                <td>{{ $realisasi->pagu }}</td>
                                <td>{{ $realisasi->realisasi }}</td>
                                <td>{{ $realisasi->P }}</td>
                                <td>{{ $realisasi->R }}</td>
                                <td>
                                    <a href="{{ route('realisasi.edit', $realisasi->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('realisasi.destroy', $realisasi->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->

<!-- Page Specific JS File -->
@endpush
