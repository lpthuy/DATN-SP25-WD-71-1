@extends('adminlte::page')

@section('title', 'Chỉnh sửa Hình ảnh Sản phẩm')

@section('content_header')
    <h1>Chỉnh sửa Hình ảnh Sản phẩm</h1>
@endsection

@section('content')
    <form action="{{ route('products_images.update', $product_image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_id">Sản phẩm</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" @if($product->id == $product_image->product_id) selected @endif>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Hình ảnh hiện tại -->
        <div class="form-group">
            <label for="current_image">Hình ảnh hiện tại</label>
            <br>
            @if($product_image->image_url && Storage::disk('public')->exists($product_image->image_url))
                <img id="currentImage" src="{{ asset('storage/' . $product_image->image_url) }}" width="150" alt="Hình ảnh sản phẩm">
            @else
                <span class="text-danger">Không có hình ảnh</span>
            @endif
        </div>

        <!-- Chọn ảnh mới -->
        <div class="form-group">
            <label for="image">Chọn Hình ảnh mới (nếu cần)</label>
            <input type="file" name="image" id="imageInput" class="form-control-file" accept="image/*">
        </div>

        <!-- Khu vực hiển thị ảnh xem trước -->
        <div class="form-group">
            <label>Xem trước hình ảnh mới:</label>
            <br>
            <img id="imagePreview" src="" width="150" style="display: none; border: 1px solid #ddd; padding: 5px;">
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('products_images.index') }}" class="btn btn-secondary">Hủy</a>
    </form>

    <script>
        document.getElementById("imageInput").addEventListener("change", function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imagePreview = document.getElementById("imagePreview");
                    let currentImage = document.getElementById("currentImage");

                    // Hiển thị ảnh mới và ẩn ảnh cũ
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                    if (currentImage) {
                        currentImage.style.display = "none";
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
