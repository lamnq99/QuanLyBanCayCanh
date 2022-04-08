@extends('layouts.app')

@section('content')
    <section class="content" style="padding: 30px">
        <div style="width: 100%; text-align: end">
            <a href="{{ route('staff.create') }}" class="btn" style="width: 10%">Tạo nhân viên</a>
        </div>
        <table class="table table-striped" id="customers_table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">SĐT</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->staffInformation->name }}</td>
                        <td>{{ $item->staffInformation->birthday }}</td>
                        <td>{{ $item->staffInformation->phone }}</td>
                        <td>
                            <a class="btn btn-secondar mx-3"
                                href="{{ route('staff.edit', ['staff' => $item->id]) }}">Sửa</a>
                            <a class="btn btn-secondar btn_delete_staff" data-bs-toggle="modal" data-id="{{ $item->id }}"
                                data-bs-target="#modalDeleteStaff">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('modals.delete-staff')
@endsection
