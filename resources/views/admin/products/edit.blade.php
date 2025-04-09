@extends('adminlte::page')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content_header')
    <h1 class="text-primary">Chỉnh sửa sản phẩm</h1>
@endsection

@section('content')
    <div class="card shadow p-4">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tên sản phẩm --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            {{-- Danh mục --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Danh mục</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Ảnh hiện tại --}}
            @if($product->image)
            <div class="mb-3">
                <label class="form-label fw-bold">Hình ảnh hiện tại</label>
                <div>
                    @foreach(explode(',', $product->image) as $img)
                        <img src="{{ asset('storage/' . $img) }}" class="img-thumbnail me-2" width="100">
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Upload hình ảnh mới --}}
            <div class="mb-3">
                <label for="images" class="form-label fw-bold">Chọn hình ảnh mới</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

            {{-- Mô tả --}}
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>
            
            {{-- Input lưu biến thể bị xóa --}}
            <input type="hidden" name="deleted_variants" id="deletedVariants">

            {{-- Nút thêm biến thể --}}
            <div class="mb-3">
                <button type="button" class="btn btn-primary" onclick="addVariant()">
                    <i class="fas fa-plus"></i> Thêm biến thể
                </button>
            </div>

            {{-- Danh sách biến thể --}}
            <div id="variantContainer">
                @foreach ($product->variants as $index => $variant)
                    <div class="border rounded p-3 mb-3 shadow-sm variant-item">
                        <input type="hidden" name="variants[{{ $index }}][id]" value="{{ $variant->id }}">

                        <div class="row g-3 align-items-center">
                            {{-- Màu sắc --}}
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Màu sắc</label>
                                <div class="d-flex align-items-center">
                                    <select name="variants[{{ $index }}][color_id]" class="form-select color-select" 
                                            onchange="showColor(this, {{ $index }})">
                                        <option value="">Chọn màu sắc</option>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" data-color="{{ $color->color_code }}"
                                                    {{ $variant->color_id == $color->id ? 'selected' : '' }}>
                                                {{ $color->color_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="colorPreview-{{ $index }}" class="border ms-2 rounded-circle" 
                                          style="width: 30px; height: 30px; display: inline-block; border: 1px solid #ccc;
                                                 background-color: {{ $variant->color->color_code ?? '#fff' }};">
                                    </span>
                                </div>
                            </div>

                            {{-- Kích thước --}}
                            <div class="col-md-2">
                                <label class="form-label fw-bold">Kích thước</label>
                                <select name="variants[{{ $index }}][size_id]" class="form-select">
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}" {{ $variant->size_id == $size->id ? 'selected' : '' }}>
                                            {{ $size->size_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                      {{-- Giá cũ --}}
                      <div class="col-md-2">
                        <label class="form-label fw-bold">Giá cũ</label>
                        <input type="number" name="variants[{{ $index }}][price]" class="form-control" value="{{ $variant->price }}" min="0" onchange="validatePrice(this)">
                        <span id="price_error_{{ $index }}" class="text-danger error-message" style="display: none;"></span>
                    </div>

                    {{-- Giá --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Giá mới</label>
                        <input type="number" name="variants[{{ $index }}][discount_price]" class="form-control" value="{{ $variant->discount_price }}" min="0" onchange="validatePrice(this)" required>
                        <span id="discount_price_error_{{ $index }}" class="text-danger error-message" style="display: none;"></span>
                    </div>

                            {{-- Số lượng --}}
                            <div class="col-md-2">
                                <label class="form-label fw-bold">Số lượng</label>
                                <input type="number" name="variants[{{ $index }}][stock_quantity]" class="form-control" value="{{ $variant->stock_quantity }}" min="1">
                            </div>

                            {{-- Nút xóa --}}
                            <div class="col-md-1 text-center">
                                <button type="button" class="btn btn-danger mt-4" onclick="removeVariant(this, {{ $variant->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="variantError" class="text-danger fw-bold mt-2" style="display: none;"></div>

            {{-- Nút Lưu --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Cập nhật sản phẩm
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Hủy
                </a>
            </div>
        </form>
    </div>

    {{-- Script xử lý thêm và xóa biến thể --}}
    <script>
let variantIndex = {{ count($product->variants) }};
let deletedVariants = [];

function addVariant() {
    let container = document.getElementById('variantContainer');
    let variantHTML = `
        <div class="border rounded p-3 mb-3 shadow-sm variant-item" id="variant-${variantIndex}">
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Màu sắc</label>
                    <div class="d-flex align-items-center">
                        <select name="variants[${variantIndex}][color_id]" class="form-select color-select" 
                                onchange="showColor(this, ${variantIndex}); checkDuplicateVariants();">
                            <option value="" data-color="#fff" selected>Chọn màu</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" data-color="{{ $color->color_code }}">
                                    {{ $color->color_name }}
                                </option>
                            @endforeach
                        </select>
                        <span id="colorPreview-${variantIndex}" class="border ms-2 rounded-circle" 
                              style="width: 30px; height: 30px; display: inline-block; border: 1px solid #ccc; background-color: #fff;">
                        </span>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <label class="form-label fw-bold">Kích thước</label>
                    <select name="variants[${variantIndex}][size_id]" class="form-select" onchange="checkDuplicateVariants();">
                        <option value="" selected>Chọn size</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                        @endforeach
                    </select>
                </div>
         
               <div class="col-md-2">
                    <label class="form-label fw-bold">Giá cũ</label>
                    <input type="number" name="variants[${variantIndex}][price]" class="form-control" min="0" onchange="validatePrice(this)">
                    <span id="price_error_${variantIndex}" class="text-danger error-message" style="display: none;"></span>
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">Giá mới</label>
                    <input type="number" name="variants[${variantIndex}][discount_price]" class="form-control" min="0" onchange="validatePrice(this)">
                    <span id="discount_price_error_${variantIndex}" class="text-danger error-message" style="display: none;"></span>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Số lượng</label>
                    <input type="number" name="variants[${variantIndex}][stock_quantity]" class="form-control" min="1">
                </div>
                <div class="col-md-1 text-center">
                    <button type="button" class="btn btn-danger mt-4" onclick="removeVariant(this, ${variantIndex})">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', variantHTML);

    setTimeout(() => {
        let newSelect = document.querySelector(`select[name="variants[${variantIndex}][color_id]"]`);
        if (newSelect) {
            showColor(newSelect, variantIndex);
        }
    }, 100);

    variantIndex++;
    checkDuplicateVariants();
}

function validatePrice(input) {
    let variantItem = input.closest('.variant-item');
    if (!variantItem) return;

    let priceInput = variantItem.querySelector('input[name*="[price]"]');
    let discountInput = variantItem.querySelector('input[name*="[discount_price]"]');

    if (!priceInput || !discountInput) return;

    let price = parseFloat(priceInput.value) || 0;
    let discount = parseFloat(discountInput.value) || 0;

    if (price > 0 && discount > price) {
        showError("❌ Giá mới phải nhỏ hơn hoặc bằng giá cũ!");
        discountInput.value = ""; // Xóa giá mới nếu không hợp lệ
        discountInput.focus(); // Đưa con trỏ về input giá mới
    } else {
        clearError();
    }
}

function removeVariant(button, id = null) {
    let variantDiv = button.closest('.variant-item');
    
    if (!variantDiv) {
        console.warn("Không tìm thấy phần tử cần xóa.");
        return;
    }

    if (id) {
        deletedVariants.push(id);
        document.getElementById('deletedVariants').value = deletedVariants.join(',');
    }

    variantDiv.remove();
    checkDuplicateVariants();
}

function showColor(selectElement, index) {
    if (!selectElement) return;

    let selectedOption = selectElement.options[selectElement.selectedIndex];
    let colorCode = selectedOption.getAttribute("data-color") || "#fff";
    let preview = document.getElementById(`colorPreview-${index}`);

    if (!preview) {
        console.warn(`Không tìm thấy phần tử colorPreview-${index}`);
        return;
    }

    preview.style.backgroundColor = colorCode;
}

function checkDuplicateVariants() {
    let variants = document.querySelectorAll('.variant-item');
    let variantSet = new Set();
    let errorDiv = document.getElementById('variantError');
    let submitBtn = document.querySelector("button[type='submit']");
    let hasDuplicate = false;

    variants.forEach(variant => {
        let colorSelect = variant.querySelector('select[name*="[color_id]"]');
        let sizeSelect = variant.querySelector('select[name*="[size_id]"]');

        let color = colorSelect ? colorSelect.value : "";
        let size = sizeSelect ? sizeSelect.value : "";

        if (color && size) {
            let key = `${color}-${size}`; // Kiểm tra sự kết hợp giữa màu và kích thước
            if (variantSet.has(key)) {
                hasDuplicate = true;

                // Reset lại màu và kích thước trùng
                colorSelect.value = ""; // Xóa màu nếu trùng
                sizeSelect.value = "";  // Xóa kích thước nếu trùng

                // Cập nhật lại preview màu thành mặc định (không có màu)
                let colorPreview = document.getElementById(`colorPreview-${variantIndex}`);
                if (colorPreview) {
                    colorPreview.style.backgroundColor = "#fff"; // Set lại màu nền thành trắng
                }

                // Thêm lớp lỗi cho người dùng biết rằng họ cần chọn lại
                colorSelect.classList.add("is-invalid");
                sizeSelect.classList.add("is-invalid");

                // Thông báo để người dùng chọn lại biến thể
                showError("❌ Không thể thêm biến thể trùng! Vui lòng chọn lại màu và kích thước.");
            } else {
                variantSet.add(key);
                colorSelect.classList.remove("is-invalid"); // Xóa lớp lỗi nếu không trùng
                sizeSelect.classList.remove("is-invalid");  // Xóa lớp lỗi nếu không trùng
            }
        }
    });

    if (hasDuplicate) {
        submitBtn.disabled = true; // Chặn nút submit nếu có trùng lặp
    } else {
        clearError();
        submitBtn.disabled = false; // Mở lại nút submit nếu không trùng
    }
}

function showError(message) {
    let errorDiv = document.getElementById('variantError');
    if (errorDiv) {
        errorDiv.textContent = message;
        errorDiv.style.display = "block";
    }
}

function clearError() {
    let errorDiv = document.getElementById('variantError');
    if (errorDiv) {
        errorDiv.style.display = "none";
    }
}

// Kiểm tra khi có thay đổi
document.querySelector("form").addEventListener("submit", function (event) {
    let isValid = true;

    // Kiểm tra tất cả ô nhập liệu có giá trị hay không
    document.querySelectorAll('input, select, textarea').forEach(function(input) {
        if (input.type !== "file" && input.type !== "hidden" && !input.disabled) {
            if (input.value.trim() === '') {
                input.classList.add('is-invalid');  // Thêm lớp lỗi nếu ô trống
                isValid = false;
            } else {
                input.classList.remove('is-invalid');  // Xóa lớp lỗi nếu có giá trị hợp lệ
            }
        }
    });

    // Kiểm tra các trường của mỗi biến thể
    let variantItems = document.querySelectorAll('.variant-item');
    variantItems.forEach(function(variantItem) {
        let colorSelect = variantItem.querySelector('select[name*="[color_id]"]');
        let sizeSelect = variantItem.querySelector('select[name*="[size_id]"]');
        let priceInput = variantItem.querySelector('input[name*="[price]"]');
        let discountPriceInput = variantItem.querySelector('input[name*="[discount_price]"]');
        let stockInput = variantItem.querySelector('input[name*="[stock_quantity]"]');

        if (!colorSelect.value || !sizeSelect.value || !priceInput.value || !discountPriceInput.value || !stockInput.value) {
            colorSelect.classList.add('is-invalid');
            sizeSelect.classList.add('is-invalid');
            priceInput.classList.add('is-invalid');
            discountPriceInput.classList.add('is-invalid');
            stockInput.classList.add('is-invalid');
            isValid = false;
        } else {
            colorSelect.classList.remove('is-invalid');
            sizeSelect.classList.remove('is-invalid');
            priceInput.classList.remove('is-invalid');
            discountPriceInput.classList.remove('is-invalid');
            stockInput.classList.remove('is-invalid');
        }
    });

    // Kiểm tra nếu có các ô giá trống (chỉ dành cho các input loại number)
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        if (input.value.trim() === '') {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    // Kiểm tra trùng lặp biến thể
    if (checkDuplicateVariants()) {
        isValid = false;
        alert("❌ Không thể thêm biến thể trùng! Vui lòng chọn lại màu và kích thước.");
    }

    // Nếu không hợp lệ, chặn gửi form
    if (!isValid) {
        event.preventDefault(); // Chặn form gửi đi
        alert("❌ Vui lòng điền đầy đủ tất cả các trường!");
    }
    return isValid;
});

    </script>
@endsection
@section('css')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('js')
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
          $(document).ready(function() {
$('#description').summernote({
    height: 250,
    placeholder: 'Nhập mô tả sản phẩm ở đây...',
    tabsize: 2,
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
});

// Sửa lỗi event listener không passive
document.addEventListener('wheel', function(event) {}, { passive: true });
});

    </script>
@endsection
