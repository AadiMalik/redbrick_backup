@extends('layouts.app')

@section('content')
    <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row pb-4">
            <div class="col-12">
                <!-- email -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i
                                class="mdi mdi-email fs-4"></i></span>
                    </div>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-lg" placeholder="Email Address"
                        aria-label="Email" aria-describedby="basic-addon1" required />
                        @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                class="mdi mdi-lock fs-4"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password"
                        aria-describedby="basic-addon1" required />
                        @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </div>
        <div class="row border-top border-secondary">
            <div class="col-12">
                <div class="form-group">
                    <div class="pt-3 d-grid">
                        <button type="submit" class="btn btn-block btn-lg btn-info" type="submit">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
