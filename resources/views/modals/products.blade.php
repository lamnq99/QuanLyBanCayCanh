<div class="modal fade @if ($errors->any()) show @endif" id="modalProducts" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true" @if ($errors->any()) style="display: block" @endif>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $name }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none">
                    <span aria-hidden="true" style="color: black">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column justify-content-start form-products" action={{ $route }}
                    method={{ $method }} enctype="multipart/form-data" style="width: 100%">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <div>
                            <label class="input-group-text">Ảnh</label>
                        </div>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div>
                            <label class="input-group-text">Tên</label>
                        </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" input-group input-group-sm mb-3 d-flex justify-content-between">
                        <div class="d-flex input-number">
                            <div>
                                <label class="input-group-text">Cao</label>
                            </div>
                            <input type="number" class="form-control @error('height') is-invalid @enderror"
                                name="height" value="{{ old('height') }}">
                        </div>
                        <div class="d-flex input-number">
                            <div>
                                <label class="input-group-text">Rộng</label>
                            </div>
                            <input type="number" class="form-control @error('width') is-invalid @enderror" name="width"
                                value="{{ old('width') }}">
                        </div>
                    </div>
                    <div class=" input-group input-group-sm mb-3 d-flex justify-content-between">
                        <div class="d-flex input-number">
                            <div>
                                <label class="input-group-text">Giá</label>
                            </div>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                name="price" value="{{ old('price') }}">
                        </div>
                        <div class="d-flex input-number">
                            <div>
                                <label class="input-group-text">Số lượng</label>
                            </div>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount"
                                value="{{ old('amount') }}">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description-product">Miêu tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description-product" rows="3"
                            name="description"> {{ old('description') }} </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <select class="form-select @error('type') is-invalid @enderror" aria-label="Default select example"
                        name="type">
                        <option selected value="">Chọn loại</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                @if (old('type') == $type->id) selected="selected" @endif>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="modal-footer pt-3 mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="{{ $btn }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
