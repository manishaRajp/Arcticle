@extends('Backend.Admin.layouts.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
<div class="main-panel">
    <div class="content-wrapper">
        <br>
        <br>
        <a href="{{ route('admin.article.create') }}" class="btn btn-success float-right">Add Article</a>&nbsp;

        <div class="page-header">
            <h3 style="font-size:150%;" class="page-title">Tables </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 style="font-size:150%;" class="card-title">Article List </h4>
                        <section style="padding-top: 60px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
{!! $dataTable->scripts() !!}
@endpush

