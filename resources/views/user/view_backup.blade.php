@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Backups</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Backup
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Last Branch Backups</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('alert-success'))
                                <div class="alert alert-success" style="margin-bottom:0;">
                                    {{ session()->get('alert-success') }}
                                </div>
                            @endif
                            <table class="table table-responsive-lg table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <!--<th scope="col">Sr. No</th>-->
                                        <th scope="col">User Name</th>
                                        <th scope="col">File</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($backup->where('user_id', Auth()->user()->id)->take(1) as $index => $item)
                                        <tr style=" font-weight:bold;">
                                            <!--<td>{{ $item->id }}</td>-->
                                            <td>{{ $item->user_name->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ number_format((float) $item->size / 1024, 2, '.', '') }} kb</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($user as $item1)
                                        @foreach ($backup->where('user_id', $item1->id)->take(1) as $index => $item)
                                            <tr style=" font-weight:bold;">
                                                <!--<td>{{ $item->id }}</td>-->
                                                <td>{{ $item->user_name->name }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ number_format((float) $item->size / 1024, 2, '.', '') }} kb</td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-script')
@endsection
