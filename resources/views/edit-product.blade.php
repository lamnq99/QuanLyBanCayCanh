@extends('layouts.app')

@section('content')
    <section class="content">
        <form class="d-flex flex-column justify-content-start form-products mt-5" style="width: 50%; margin: auto;"
            action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data" style="width: 100%">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @method('PUT')
            <div class="input-group input-group-sm mb-3 d-flex flex-column">
                <div class="d-flex jus">
                    <img src="{{ asset($product->image) }}" alt="image" height="230px" width="230px">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                        style="width: 45%; margin-left: 20px; height: fit-content;">
                </div>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-sm mt-4">
                <div>
                    <label class="input-group-text">Tên</label>
                </div>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $product->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class=" input-group input-group-sm mt-4 d-flex justify-content-between">
                <div class="d-flex input-number">
                    <div>
                        <label class="input-group-text">Cao</label>
                    </div>
                    <input type="number" class="form-control @error('height') is-invalid @enderror" name="height"
                        value="{{ old('height', $product->height) }}">
                </div>
                <div class="d-flex input-number">
                    <div>
                        <label class="input-group-text">Rộng</label>
                    </div>
                    <input type="number" class="form-control @error('width') is-invalid @enderror" name="width"
                        value="{{ old('width', $product->width) }}">
                </div>
            </div>
            <div class=" input-group input-group-sm mt-4 d-flex justify-content-between">
                <div class="d-flex input-number">
                    <div>
                        <label class="input-group-text">Giá</label>
                    </div>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price', $product->price) }}">
                </div>
                <div class="d-flex input-number">
                    <div>
                        <label class="input-group-text">Số lượng</label>
                    </div>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount"
                        value="{{ old('amount', $product->amount) }}">
                </div>
            </div>
            <div class="form-group mt-4">
                <label for="description-product" class="mb-1">Miêu tả</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description-product" rows="3"
                    name="description"> {{ old('description', $product->description) }} </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <div>
                    <label class="input-group-text">Loại</label>
                </div>
                <select class="form-select @error('type') is-invalid @enderror" aria-label="Default select example"
                    name="type">
                    <option selected value="">Chọn loại</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type', $product->product_type_id) == $type->id) selected="selected" @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pt-3 mt-3" style="text-align: right">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Thoát</a>
                <input type="submit" class="btn btn-primary" value="Lưu">
            </div>
        </form>
    </section>
@endsection
