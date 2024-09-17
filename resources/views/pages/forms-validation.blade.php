
@extends('layouts.app')

@section('title', 'Form Update Data Realisasi 01 dan 04')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Realisasi 01 dan 04</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Form Validation</div>
            </div>
        </div>

        <div class="section-body">
            <div class="d-flex">
                <div class="col-6">
                    <div class="card">
                        <form action="{{ route('realisasi.store') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h4>Create Realisasi</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="text" name="data" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Pagu</label>
                                    <input type="text" name="pagu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Realisasi</label>
                                    <input type="text" name="realisasi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>P</label>
                                    <input type="text" name="P" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>R</label>
                                    <input type="text" name="R" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <form action="{{ route('realisasi.update', $realisasi->id ?? '') }}" method="POST" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Realisasi</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" class="form-control" value="{{ $realisasi->type ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        What's the type?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="text" name="data" class="form-control" value="{{ $realisasi->data ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        What's the data?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pagu</label>
                                    <input type="text" name="pagu" class="form-control" value="{{ $realisasi->pagu ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        What's the pagu?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Realisasi</label>
                                    <input type="text" name="realisasi" class="form-control" value="{{ $realisasi->realisasi ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        What's the realisasi?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>P</label>
                                    <input type="text" name="P" class="form-control" value="{{ $realisasi->P ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        What's the P?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>R</label>
                                    <input type="text" name="R" class="form-control" value="{{ $realisasi->R ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        What's the R?
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
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
