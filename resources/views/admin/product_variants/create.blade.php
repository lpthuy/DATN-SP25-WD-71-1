@extends('adminlte::page')

@section('title', 'Thêm Biến thể')

@section('content_header')
    <h1>Thêm Biến thể Sản phẩm</h1>
@endsection

@section('content')
    <form action="{{ route('products_variants.store') }}" method="POST">
        @csrf

        <!-- Chọn sản phẩm -->
        <div class="form-group">
            <label for="product_id">Sản phẩm</label>
            <select name="product_id" id="product_id" class="form-control" required onchange="updateProductPrice()">
                <option value="">Chọn Sản phẩm</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Thanh tìm kiếm -->
        <div class="form-group">
            <input type="text" id="search" class="form-control" placeholder="Tìm kiếm kích thước hoặc màu sắc..." onkeyup="filterVariants()">
        </div>

        <!-- Chọn kích thước, màu sắc và số lượng -->
        <div class="form-group">
            <label for="variants">Chọn Kích thước, Màu sắc, Số lượng và Giá</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Chọn</th>
                        <th>Size</th>
                        <th>Màu sắc</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Giá giảm</th>
                    </tr>
                </thead>
                <tbody id="variantTable">
                    @foreach($sizes as $size)
                        @foreach($colors as $color)
                            <tr class="variant-row">
                                <td>
                                    <input type="checkbox" name="variants[{{ $size->id }}][{{ $color->id }}][selected]" 
                                           value="1" class="variant-checkbox" onchange="toggleInputs(this)">
                                </td>
                                <td class="size-name">{{ $size->size_name }}</td>
                                <td class="color-name">
                                    <div style="display: flex; align-items: center;">
                                        <div style="width: 20px; height: 20px; background-color: {{ $color->color_code }}; margin-right: 5px;"></div>
                                        {{ $color->color_name }}
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="variants[{{ $size->id }}][{{ $color->id }}][stock_quantity]" 
                                           class="form-control variant-quantity" min="1" placeholder="Nhập số lượng" >
                                </td>
                                <td>
                                    <input type="number" name="variants[{{ $size->id }}][{{ $color->id }}][price]" 
                                           class="form-control variant-price" min="0" step="0.01" placeholder="Nhập giá" >
                                </td>
                                <td>
                                    <input type="number" name="variants[{{ $size->id }}][{{ $color->id }}][discount_price]" 
                                           class="form-control variant-discount-price" min="0" step="0.01" placeholder="Nhập giá giảm" >
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Giá tự động lấy từ danh mục sản phẩm -->
        <div class="form-group">
            <label for="price">Giá (Tự động lấy từ sản phẩm)</label>
            <input type="number" name="price" id="price" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Lưu Biến thể</button>
        <a href="{{ route('products_variants.index') }}" class="btn btn-secondary">Hủy</a>
    </form>

    <script>
        function updateProductPrice() {
            let selectedProduct = document.getElementById("product_id");
            let selectedOption = selectedProduct.options[selectedProduct.selectedIndex];
            let price = selectedOption.getAttribute("data-price");
            document.getElementById("price").value = price ? price : '';
        }

        function toggleQuantityInput(checkbox) {
            let quantityInput = checkbox.closest('tr').querySelector('.variant-quantity');
            quantityInput.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                quantityInput.value = ''; // Xóa giá trị khi bỏ chọn
            }
        }

        function filterVariants() {
            let searchValue = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll(".variant-row");

            rows.forEach(row => {
                let sizeName = row.querySelector(".size-name").innerText.toLowerCase();
                let colorName = row.querySelector(".color-name").innerText.toLowerCase();

                if (sizeName.includes(searchValue) || colorName.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
@endsection
