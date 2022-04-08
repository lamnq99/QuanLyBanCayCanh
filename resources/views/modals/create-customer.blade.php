<div class="modal fade" id="modalCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tạo khách hàng</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none">
                    <span aria-hidden="true" style="color: black">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-start form-products" style="width: 100%">
                    <div class="input-group input-group-sm mb-3">
                        <div>
                            <label class="input-group-text">Tên</label>
                        </div>
                        <input type="text" id="inputNameCustomer" class="form-control" name="name" value="">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div>
                            <label class="input-group-text">SĐT</label>
                        </div>
                        <input type="text" id="inputPhoneCustomer" class="form-control" name="number" value="">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div>
                            <label class="input-group-text">Địa chỉ</label>
                        </div>
                        <input type="text" id="inputAddCustomer" class="form-control" name="address" value="">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div>
                            <label class="input-group-text">Email</label>
                        </div>
                        <input type="email" id="inputEmailCustomer" class="form-control" name="email" value="">
                    </div>
                    <div class="alert alert-danger" id="err-customer" style="display: none;" role="alert">
                        Cần nhập đúng thông tin
                    </div>
                    <div class="modal-footer pt-3 mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="button" id="createCustomerBtn" class="btn btn-primary" value="Tạo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
