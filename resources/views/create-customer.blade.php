@extends('layouts.app')

@section('content')
    <section class="content d-flex flex-column align-items-center">
        <h2 class="my-5">Tạo mới khách hàng</h2>
        <form style="width: 50%" class="form-products" method="POST" action="{{ route('customer.store') }}">
            @csrf
            <div class="input-group input-group-sm mb-4">
                <div style="width: 60px;">
                    <label class="input-group-text">Tên</label>
                </div>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mb-4">
                <div style="width: 60px;">
                    <label class="input-group-text">SĐT</label>
                </div>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mb-4">
                <div style="width: 60px;">
                    <label class="input-group-text">Địa chỉ</label>
                </div>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    value="{{ old('address') }}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mb-4">
                <div style="width: 60px;">
                    <label class="input-group-text">Email</label>
                </div>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn px-4 mx-3" href="{{ route('customer.index') }}">Hủy</a>
                <input type="submit" class="btn px-4" value="Tạo">
            </div>
        </form>
    </section>
@endsection
