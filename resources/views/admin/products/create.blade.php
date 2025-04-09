@extends('adminlte::page')

@section('title', 'Thêm sản phẩm')

@section('content_header')
    <h1 class="text-primary">Thêm sản phẩm</h1>
@endsection

@section('content')
    <div class="card shadow p-4">
        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateVariants()">
            @csrf

            {{-- Tên sản phẩm --}}
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            {{-- Danh mục --}}
            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">Danh mục</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Upload Hình ảnh --}}
            <div class="mb-3">
                <label for="images" class="form-label fw-bold">Hình ảnh sản phẩm</label>
                <input type="file" name="images[]" class="form-control" multiple required>
            </div>

            {{-- Mô tả --}}
        {{-- Mô tả --}}
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

       

            {{-- Nút bấm thêm biến thể --}}
            <div class="mb-3">
                <button type="button" class="btn btn-primary" onclick="addVariant()">
                    <i class="fas fa-plus"></i> Thêm biến thể
                </button>
            </div>

            {{-- Thông báo lỗi --}}
            <div id="variantError" class="text-danger fw-bold mb-3" style="display: none;"></div>

            {{-- Danh sách biến thể --}}
            <div id="variantContainer"></div>

            {{-- Nút Submit --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu sản phẩm
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Hủy
                </a>
            </div>
        </form>
    </div>

    {{-- Script --}}
    <script>
        let variantIndex = 0;

        function addVariant() {
            let container = document.getElementById('variantContainer');
            let variantHTML = `
                <div class="border rounded p-3 mb-3 shadow-sm variant-item">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Màu sắc</label>
                            <div class="d-flex align-items-center">
                                <select name="variants[${variantIndex}][color_id]" class="form-select" onchange="showColor(${variantIndex}); checkDuplicateVariants();">
                                    <option value="">Chọn màu sắc</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}" data-color="{{ $color->color_code }}">
                                            {{ $color->color_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span  id="colorPreview-${variantIndex}" class="border ms-2 rounded-circle" 
                                    style="width: 30px; height: 30px; display: inline-block; border: 1px solid #ccc;">
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-bold">Kích thước</label>
                            <select name="variants[${variantIndex}][size_id]" class="form-select" onchange="checkDuplicateVariants()">
                                <option value="">Chọn kích thước</option>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-bold">Giá</label>
                            <input type="number" name="variants[${variantIndex}][price]" class="form-control" placeholder="Giá" min="1" step="0.01" oninput="validatePrice(${variantIndex})">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-bold">Giảm giá</label>
                            <input type="number" name="variants[${variantIndex}][discount_price]" class="form-control" placeholder="Giảm giá" min="0" step="0.01" oninput="validatePrice(${variantIndex})">
                            <span id="priceError-${variantIndex}" class="text-danger" style="display: none;"></span>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-bold">Số lượng</label>
                            <input type="number" name="variants[${variantIndex}][stock_quantity]" class="form-control" placeholder="Số lượng" min="1">
                        </div>

                        <div class="col-md-1 text-center">
                            <button type="button" class="btn btn-danger mt-4" onclick="removeVariant(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', variantHTML);
            variantIndex++;
        }

        function showColor(index) {
            let colorSelect = document.querySelector(`select[name="variants[${index}][color_id]"]`);
            let selectedOption = colorSelect.options[colorSelect.selectedIndex];
            let colorCode = selectedOption.getAttribute("data-color");

            document.getElementById(`colorPreview-${index}`).style.backgroundColor = colorCode;
        }

        function removeVariant(button) {
            button.closest('.variant-item').remove();
            checkDuplicateVariants();
        }

        function checkDuplicateVariants() {
            let variants = document.querySelectorAll('.variant-item');
            let variantSet = new Set();
            let errorDiv = document.getElementById('variantError');

            for (let variant of variants) {
                let color = variant.querySelector('select[name^="variants"][name$="[color_id]"]').value;
                let size = variant.querySelector('select[name^="variants"][name$="[size_id]"]').value;

                if (color && size) {
                    let key = `${color}-${size}`;
                    if (variantSet.has(key)) {
                        errorDiv.textContent = "Không thể thêm biến thể trùng màu và kích thước!";
                        errorDiv.style.display = "block";
                        return false;
                    }
                    variantSet.add(key);
                }
            }

            errorDiv.style.display = "none";
            return true;
        }

        function validatePrice(index) {
            let priceInput = document.querySelector(`input[name="variants[${index}][price]"]`);
            let discountInput = document.querySelector(`input[name="variants[${index}][discount_price]"]`);
            let errorSpan = document.getElementById(`priceError-${index}`);

            // Kiểm tra xem giá giảm có hợp lệ không
            if (discountInput.value && parseFloat(discountInput.value) > parseFloat(priceInput.value)) {
                errorSpan.textContent = "Giá giảm phải nhỏ hơn hoặc = giá cũ!";
                errorSpan.style.display = "block";
            } else {
                errorSpan.style.display = "none";
            }
        }

        function validateVariants() {
            let isValid = true;
            let errorMessages = [];

            // Kiểm tra các trường bắt buộc của sản phẩm
            document.querySelectorAll('#productForm input[required], #productForm select[required]').forEach(function(input) {
                if (input.type !== "file" && input.value.trim() === '') {
                    isValid = false;
                    input.classList.add('is-invalid');
                    errorMessages.push(`${input.previousElementSibling.textContent} không được để trống`);
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            // Kiểm tra danh mục bắt buộc phải chọn
            let categorySelect = document.querySelector('select[name="category_id"]');
            if (categorySelect && categorySelect.value.trim() === '') {
                isValid = false;
                categorySelect.classList.add('is-invalid');
                errorMessages.push("Danh mục không được để trống");
            } else {
                categorySelect.classList.remove('is-invalid');
            }

            // Kiểm tra hình ảnh bắt buộc phải chọn
            let imageInput = document.querySelector('input[name="images[]"]');
            if (imageInput && imageInput.files.length === 0) {
                isValid = false;
                imageInput.classList.add('is-invalid');
                errorMessages.push("Vui lòng chọn hình ảnh sản phẩm");
            } else {
                imageInput.classList.remove('is-invalid');
            }

            // Kiểm tra biến thể bắt buộc phải có ít nhất một biến thể
            let variants = document.querySelectorAll('.variant-item');
            if (variants.length === 0) {
                isValid = false;
                errorMessages.push("Vui lòng thêm ít nhất một biến thể");
            }

            // Kiểm tra tất cả các biến thể
            variants.forEach(function(variant) {
                let color = variant.querySelector('select[name^="variants"][name$="[color_id]"]').value;
                let size = variant.querySelector('select[name^="variants"][name$="[size_id]"]').value;
                let price = variant.querySelector('input[name^="variants"][name$="[price]"]').value;
                let discount_price = variant.querySelector('input[name^="variants"][name$="[discount_price]"]').value;
                let stock_quantity = variant.querySelector('input[name^="variants"][name$="[stock_quantity]"]').value;

                if (!color || !size || !price || !discount_price || !stock_quantity) {
                    isValid = false;
                    variant.classList.add('is-invalid');
                    errorMessages.push("Tất cả các trường của biến thể phải được điền đầy đủ");
                } else {
                    variant.classList.remove('is-invalid');
                }
            });

            // Kiểm tra biến thể trùng
            let variantValid = checkDuplicateVariants();
            if (!variantValid) {
                isValid = false;
                errorMessages.push("Không thể thêm biến thể trùng màu và kích thước!");
            }

            // Hiển thị tất cả thông báo lỗi nếu có
            if (!isValid) {
                let errorDiv = document.getElementById('variantError');
                errorDiv.innerHTML = errorMessages.join('<br>');
                errorDiv.style.display = "block";
            } else {
                let errorDiv = document.getElementById('variantError');
                errorDiv.style.display = "none";
            }

            return isValid; // Chặn gửi form nếu không hợp lệ
        }
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

<style>
    /* Giãn cách giữa select và preview màu */
.d-flex.align-items-center > select.form-select {
    margin-right: 12px;
}

/* Preview màu vẫn giữ nguyên kích thước và viền */
.d-flex.align-items-center > span.rounded-circle {
    min-width: 30px;
    min-height: 30px;
}

</style>
@endsection