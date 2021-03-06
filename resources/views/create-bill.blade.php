@extends('layouts.app')

@section('content')
    <section class="content d-flex flex-column align-items-center">
        <h2 class="my-5">Tạo mới hoá đơn</h2>
        <form style="width: 70%" class="form-products" method="POST" action="{{ route('staff.store') }}">
            @csrf
            <div style="border-bottom: 1px solid #ced4da; padding: 10px;"
                class="genaral-infor d-flex justify-content-between align-items-start mb-5">
                <div style="width: 48%" class="staff-infor">
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Mã HD</label>
                        </div>
                        <input type="text" id="id_bill" class="form-control" value="{{ $bill_id }}" disabled>
                    </div>
                    @foreach ($staff as $item)
                        <div class="input-group input-group-sm mb-4">
                            <div style="width: 80px;">
                                <label class="input-group-text">Mã NV</label>
                            </div>
                            <input type="text" id="id_staff" class="form-control" name="staff_id" value="{{ $item->id }}" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-4">
                            <div style="width: 80px;">
                                <label class="input-group-text">Tên NV</label>
                            </div>
                            <input type="text" class="form-control" value="{{ $item->staffInformation->name }}"
                                disabled>
                        </div>
                    @endforeach
                </div>
                <div style="width: 48%" class="customer-infor">
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">SĐT</label>
                        </div>
                        <input type="text" id="phoneCustomer" class="form-control mr-2" name="phone" value="">
                        <input style="margin-left:3px;" id="getCustomer" type="button" class="btn px-3 py-2" value="Tìm">
                    </div>
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Mã KH</label>
                        </div>
                        <input disabled id="idCustomer" type="text" class="form-control" name="customer_id" value="">
                    </div>
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Tên KH</label>
                        </div>
                        <input disabled id="nameCustomer" type="text" class="form-control" name="customer_name" value="">
                    </div>
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Địa chỉ</label>
                        </div>
                        <input disabled id="addCustomer" type="text" class="form-control" name="customer_address"
                            value="">
                    </div>
                </div>
            </div>
            <div style="border-bottom: 1px solid #ced4da;"
                class="genaral-infor d-flex justify-content-between align-items-start pb-2">
                <div style="width: 48%" class="staff-infor">
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Tên cây</label>
                        </div>
                        <select class="form-select" id="selectProducts" aria-label="Default select example">
                            <option data-id="0" value="0" selected>Loại cây</option>
                            @foreach ($product as $item)
                                <option data-id="{{ $item->id }}" value="{{ $item->name }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Số lượng</label>
                        </div>
                        <input max="" min="1" type="number" id="amountProduct" class="form-control" name="amount"
                            value="1">
                    </div>
                    <div class="input-group input-group-sm">
                        <div style="width: 80px;">
                            <label class="input-group-text">Thành tiền</label>
                        </div>
                        <input type="text" id="totalPrice" disabled class="form-control" name="note" value="">
                    </div>
                </div>
                <div style="width: 48%" class="customer-infor">
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Mã Cây</label>
                        </div>
                        <input type="text" id="idProduct" class="form-control" name="product_id" value="" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-4">
                        <div style="width: 80px;">
                            <label class="input-group-text">Đơn giá</label>
                        </div>
                        <input type="number" id="priceProduct" class="form-control" name="unit_price" value="" disabled>
                    </div>
                    <div class="input-group input-group-sm justify-content-end mb-4">
                        <input type="button" id="addProduct" disabled class="btn px-4 py-2" value="Thêm">
                    </div>
                </div>
            </div>
            <div class="cart">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%">#</th>
                            <th scope="col" style="width: 15%">Mã cây</th>
                            <th scope="col" style="width: 20%">Tên cây</th>
                            <th scope="col" style="width: 15%">Số lượng</th>
                            <th scope="col" style="width: 15%">Đơn giá</th>
                            <th scope="col" style="width: 15%">Thành tiền</th>
                            <th scope="col" style="width: 15%"></th>
                        </tr>
                    </thead>
                    <tbody id="productList" style="width: 100%">
                    </tbody>
                </table>
                <table class="table" style="border: none">
                    <tbody id="productList" style="width: 100%">
                        <tr>
                            <td style="width: 5%"></td>
                            <td style="width: 15%"></td>
                             <td style="width: 20%"></td>
                            <td style="width: 15%"></td>
                            <td style="width: 15%"></td>
                            <td style="width: 15%" id="totalTotal">0</td>
                            <td style="width: 15%"></td>
                          </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a class="btn px-4 mx-3" href="{{ route('bill.index') }}">Hủy</a>
                <input type="button" disabled id="create-bill-btn" class="btn px-4" value="Tạo">
            </div>
        </form>
    </section>
    @include('modals.create-customer')
    @include('modals.has-product')
@endsection
