@extends('layouts.app')

@section('content')
    <section class="content" style="padding: 30px">
        <div style="width: 100%; text-align: end">
            <a href="{{ route('bill.create') }}" class="btn" style="width: 10%">Tạo hoá đơn</a>
        </div>
        <table class="table table-striped" id="customers_table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã HĐ</th>
                    <th scope="col">SDT KH</th>
                    <th scope="col">Tên KH</th>
                    <th scope="col">Tên NV</th>
                    <th scope="col">Tổng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->customer->number }}</td>
                        <td>{{ $item->customer->name }}</td>
                        <td>{{ Helper::nameStaff($item->staff_id) }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <button @if($item->print == 1) disabled @endif class="btn btn-secondar mx-3"><a href="bill/{{$item->id}}/edit" style="color: white; text-decoration: none">Sửa</a></button>
                            <a class="btn btn-secondar mx-3" href="bill/{{$item->id}}">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('modals.delete-staff')
@endsection
