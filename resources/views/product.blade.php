@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="search container-fluid d-flex justify-content-between">
            <form class="d-flex justify-content-around" action="{{ route('products.index') }}" method="get"
                style="width: 70%">
                <select class="form-select" aria-label="Default select example" style="width: 15%" name="type">
                    <option selected value="">Chọn loại</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (request()->input('type') == $type->id) selected="selected" @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group" style="width: 60%">
                    <input type="text" class="form-control" placeholder="Nhập tên loại cây" aria-label="Nhập tên loại cây"
                        aria-describedby="basic-addon2" style="margin-right: 15px" name="name"
                        value="{{ request()->input('name') }}">
                    <div class="input-group-append">
                        <input class="btn btn-search" type="submit" value="Tìm kiếm">
                        <a class="btn" href="{{ route('products.index') }}">Reset</a>
                    </div>
                </div>
            </form>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalProducts"
                style="width: 15%">Thêm sản phẩm</button>
        </div>
        <div class="container-fluid mt-5">
            <div class="row justify-content-start m-0">
                @foreach ($products as $item)
                    <div class="card p-0">
                        <img class="card-img-top" src="{{ $item->image }}" alt="{{ $item->name }}">
                        <div class="card-body">
                            <div class="mb-3" style="height: 230px;">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">Mô tả: {{ $item->description }}</p>
                                <p class="card-text">Chiều cao: {{ $item->height }} cm</p>
                                <p class="card-text">Chiều rộng: {{ $item->width }} cm</p>
                                <p class="card-text">Giá: {{ $item->price }} VND</p>
                                <p class="card-text">Tồn kho: {{ $item->amount }} cây</p>
                                <p class="card-text">Phân loại: {{ Helper::typeProduct($item->product_type_id) }}
                                </p>
                            </div>
                            <a href="#" class="btn btn-product btn-primary btn_delete_product" data-bs-toggle="modal"
                                data-id="{{ $item->id }}" data-bs-target="#modalDelete">Xóa</a>
                            <a href="products/{{$item->id}}/edit" class="btn btn-product btn-primary">Chỉnh sửa</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @include('modals.products', [
            'name' => 'Tạo sản phẩm mới',
            'btn' => 'Tạo',
            'route' => route('products.store'),
            'method' => 'POST',
        ])
        @include('modals.delete')
    </section>
@endsection
