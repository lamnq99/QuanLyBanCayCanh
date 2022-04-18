@extends('layouts.app')

@section('content')
    <section style="padding: 30px;" id="bill-container" class="content">
        <div id="print" style="width: 60%; margin: auto; padding: 20px; display: flex; flex-direction: column">
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center"
                class="bill-header">
                <div class="name-shop" style="width: 50%">
                    <p style="font-weight: bold; font-size: 25px">Cửa hàng bán cây cảnh</p>
                </div>
                <div class="add-shop" style="width: 50%">
                    <p>Địa chỉ: 96 Định Công, Hoàng Mai, Hà Nội</p>
                </div>
            </div>
            <div style="width: 100%; text-align: center; width: 100%; margin-top: 20px">
                <h2 style="font-weight: bold;">Hoá đơn bán hàng</h2>
            </div>
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-top: 30px">
                <div class="infor-left">
                    <div style="margin-bottom: 20px">
                        <span style="width: 40px">Ngày tạo: </span>
                        <span>{{ $bill->updated_at }}</span>
                    </div>
                    <div>
                        <span>Mã hoá đơn: </span>
                        <span>{{ $bill->id }}</span>
                    </div>
                </div>
                <div class="infor-right">
                    <div style="margin-bottom: 20px">
                        <span style="width: 40px">Tên nhân viên: </span>
                        <span>{{ $staff['0']->name }}</span>
                    </div>
                    <div>
                        <span>Tên khách hàng: </span>
                        <span>{{ $customer['0']->name }}</span>
                    </div>
                </div>
            </div>
            <table style="width: 100%; margin-top: 30px; width: 100%;" class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%">#</th>
                        <th scope="col" style="width: 30%; text-align: left;">Tên cây</th>
                        <th scope="col" style="width: 30%; text-align: left;">Số lượng</th>
                        <th scope="col" style="width: 30%; text-align: left;">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $key => $item)
                        <tr>
                            <th style="width: 10%" scope="row">{{ $key + 1 }}</th>
                            <td style="width: 30%">{{ Helper::nameProduct($item->product_id) }}</td>
                            <td style="width: 30%">{{ $item->amount }}</td>
                            <td style="width: 30%">{{ $item->amount * $item->unit_price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="width: 100%; total-bill">
                <table class="table" style="border: none; margin-top: 30px; width: 100%">
                    <tbody>
                        <tr>
                            <td scope="col" style="width: 10%"></td>
                            <td scope="col" style="width: 30%"></td>
                            <td scope="col" style="width: 30%">Tổng tiền:</td>
                            <td scope="col" style="width: 30%">{{ $bill->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="width: 60%; margin: auto;display: flex; justify-content: end; align-items: center;">
            <a href="/bill" class="btn btn-secondar mx-3">Thoát</a>
            <a data-id="{{ $bill->id }}" class="btn btn-secondar mx-3" id="printBtn">In hoá đơn</a>
        </div>
    </section>
@endsection
