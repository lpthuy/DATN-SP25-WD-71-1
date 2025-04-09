@extends('adminlte::page')

@section('title', 'Thêm Hình ảnh Sản phẩm')

@section('content_header')
    <h1>Thêm Hình ảnh Sản phẩm</h1>
@endsection

@section('content')
    <form action="{{ route('products_images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="product_id">Sản phẩm</label>
            <select name="product_id" class="form-control" required>
                <option value="">Chọn sản phẩm</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Chọn Hình ảnh</label>
            <input type="file" name="image" id="imageInput" class="form-control-file" required accept="image/*">
        </div>

        <!-- Khu vực hiển thị ảnh xem trước -->
        <div class="form-group">
            <label>Xem trước hình ảnh:</label>
            <br>
            <img id="imagePreview" src="" width="200" style="display: none; border: 1px solid #ddd; padding: 5px;">
        </div>

        <button type="submit" class="btn btn-success">Lưu Hình ảnh</button>
        <a href="{{ route('products_images.index') }}" class="btn btn-secondary">Hủy</a>
    </form>

    <script>
        document.getElementById("imageInput").addEventListener("change", function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imagePreview = document.getElementById("imagePreview");
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
