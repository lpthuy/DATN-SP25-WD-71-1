@extends('adminlte::page')

@section('title', 'Chỉnh sửa Biến thể')

@section('content_header')
    <h1>Chỉnh sửa Biến thể Sản phẩm</h1>
@endsection

@section('content')
    <form action="{{ route('products_variants.update', $products_variant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Chọn sản phẩm -->
        <div class="form-group">
            <label for="product_id">Sản phẩm</label>
            <select name="product_id" id="product_id" class="form-control" required onchange="updateProductPrice()">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}" 
                        @if($product->id == $products_variant->product_id) selected @endif>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Giá tự động lấy từ danh mục sản phẩm -->
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $products_variant->price }}" >
        </div>

        <!-- Thanh tìm kiếm -->
        <div class="form-group">
            <input type="text" id="search" class="form-control" placeholder="Tìm kiếm kích thước hoặc màu sắc..." onkeyup="filterVariants()">
        </div>

        <!-- Chọn kích thước, màu sắc và số lượng -->
        <div class="form-group">
            <label for="variants">Chỉnh sửa Kích thước, Màu sắc, Số lượng và Giá</label>
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
                            @php
                                $variant = $selected_variants->where('size_id', $size->id)
                                                             ->where('color_id', $color->id)
                                                             ->first();
                            @endphp
                            <tr class="variant-row">
                                <td>
                                    <input type="checkbox" name="variants[{{ $size->id }}][{{ $color->id }}][selected]" 
                                           value="1" class="variant-checkbox" 
                                           onchange="toggleInputs(this)"
                                           {{ $variant ? 'checked' : '' }}>
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
                                           class="form-control variant-quantity" 
                                           min="1" placeholder="Nhập số lượng"
                                           value="{{ $variant->stock_quantity ?? '' }}"
                                           {{ $variant ? '' : 'disabled' }}>
                                </td>
                                <td>
                                    <input type="number" name="variants[{{ $size->id }}][{{ $color->id }}][price]" 
                                           class="form-control variant-price" 
                                           min="0" step="0.01" placeholder="Nhập giá"
                                           value="{{ $variant->price ?? '' }}"
                                           {{ $variant ? '' : 'disabled' }}>
                                </td>
                                <td>
                                    <input type="number" name="variants[{{ $size->id }}][{{ $color->id }}][discount_price]" 
                                           class="form-control variant-discount-price" 
                                           min="0" step="0.01" placeholder="Nhập giá giảm"
                                           value="{{ $variant->discount_price ?? '' }}"
                                           {{ $variant ? '' : 'disabled' }}>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <script>
            function toggleInputs(checkbox) {
                let row = checkbox.closest('tr');
                let inputs = row.querySelectorAll('input[type="number"]');
                inputs.forEach(input => {
                    input.disabled = !checkbox.checked;
                });
            }
        </script>
        


        <button type="submit" class="btn btn-success">Cập nhật</button>
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
