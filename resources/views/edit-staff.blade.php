@extends('layouts.app')

@section('content')
    <section class="content d-flex flex-column align-items-center">
        <h2 class="my-5">Sửa thông tin nhân viên</h2>
        <form style="width: 50%" class="form-products" method="POST"
            action="{{ route('staff.update', ['staff' => $users->id]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="password" value="{{ $users->password }}">
            <div class="input-group input-group-sm mb-4">
                <div style="width: 80px;">
                    <label class="input-group-text">Email</label>
                </div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $users->email) }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mb-4">
                <div style="width: 80px;">
                    <label class="input-group-text">Tên</label>
                </div>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $infor[0]->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mb-4">
                <div style="width: 80px;">
                    <label class="input-group-text">Ngày sinh</label>
                </div>
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                    value="{{ old('birthday', $infor[0]->birthday) }}">
                @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mb-4">
                <div style="width: 80px;">
                    <label class="input-group-text">SĐT</label>
                </div>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone', $infor[0]->phone) }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn px-4 mx-3" href="{{ route('staff.index') }}">Hủy</a>
                <input type="submit" class="btn px-4" value="Sửa">
            </div>
        </form>
    </section>
@endsection
