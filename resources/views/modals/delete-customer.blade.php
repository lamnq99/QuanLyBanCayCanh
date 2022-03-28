<div class="modal fade" id="modalDeleteCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none">
                    <span aria-hidden="true" style="color: black">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form method="post" class="confirm_delete_customer">
                    @method("DELETE")
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Xóa">
                </form>
            </div>
        </div>
    </div>
</div>
