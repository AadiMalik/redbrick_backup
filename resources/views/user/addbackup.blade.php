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
                                <li class="breadcrumb-item"><a href="#">Upload</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Upload Backup
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
                            <h5 class="card-title mb-0">Upload Backup</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-12">
                                @if (session()->has('alert-success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('alert-success') }}
                                    </div>
                                @endif

                                <form id="fileUploadForm" class="form-horizontal" action="{{ url('store-backup') }}"
                                    method="POST" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image" style="color:#fff;">Backup file</label>
                                        <input type="file" class="form-control" required="" name="backup" style="border: 2px solid;">
                                        {!! $errors->first('backup', "<span class='text-danger'>:message</span>") !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="progress" style="height:20px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="upload" class="btn btn-primary">Upload</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
        $(function() {
            $(document).ready(function() {
                $('#fileUploadForm').ajaxForm({

                    beforeSend: function() {
                        var percentage = '0';
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        $('#upload').hide();
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage + '%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function(xhr) {

                        window.location.href = "backups";
                    }
                });
            });
        });
    </script>
@endsection
