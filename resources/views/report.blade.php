@extends('layouts.app')

@section('content')
    <section class="content">
        <h3>Số lượng hoá đơn trong ngày: {{ $numberBill }}</h3>
        <h3>Tổng doanh số trong ngày: {{ $total }} VNĐ</h3>
        <h3 class="mt-5">Hoá đơn theo ngày</h3>
        <form action="{{ route('billday') }}" method="get" style="width: 100%; display: flex; justify-content: space-between;">
            <div>
                <label for="from">Ngày bắt đầu</label>
                <input type="date" id="from" name="from">
            </div>
            <div>
                <label for="end">Ngày kết thúc</label>
                <input type="date" id="end" name="end">
            </div>
            <input class="btn" value="Xem" type="submit">
        </form>
        <div class="mt-5">
            <h3>Tồn kho</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%" scope="col">#</th>
                        <th style="width: 30%" scope="col">Mã cây</th>
                        <th style="width: 30%" scope="col">Tên cây</th>
                        <th style="width: 30%" scope="col">Tồn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table" style="border: none;">
                <tbody>
                    <tr>
                        <th style="width: 10%" scope="col"></th>
                        <th style="width: 30%" scope="col"></th>
                        <th style="width: 30%" scope="col"></th>
                        <th style="width: 30%" scope="col">Tổng: {{ $totalProducts }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
