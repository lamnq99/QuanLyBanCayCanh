@extends('layouts.app')

@section('content')
    <section class="content" style="padding: 30px">
        <div style="width: 100%; text-align: end">
            <a href="{{ route('customer.create') }}" class="btn" style="width: 10%">Tạo khách hàng</a>
        </div>
        <table class="table table-striped" id="customers_table">
            <thead>
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a class="btn btn-secondar mx-3"
                                href="{{ route('customer.edit', ['customer' => $item->id]) }}">Sửa</a>
                            <a class="btn btn-secondar btn_delete_customer" data-bs-toggle="modal"
                                data-id="{{ $item->id }}" data-bs-target="#modalDeleteCustomer">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('modals.delete-customer')
@endsection
