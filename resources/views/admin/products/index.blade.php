@extends('adminlte::page')

@section('title', 'Danh sách sản phẩm')

@section('content_header')
    <h1 class="text-center font-weight-bold text-primary">Danh sách sản phẩm</h1>
@endsection

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus-circle"></i> Thêm sản phẩm</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="align-middle">{{ $product->id }}</td>
                        <td class="align-middle">
                            @if($product->image)
                                <img src="{{ asset('storage/' . explode(',', $product->image)[0]) }}" alt="{{ $product->name }}" width="80" class="rounded shadow">
                            @else
                                <span class="text-muted">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="align-middle">{{ $product->name }}</td>
                        <td class="align-middle">{{ $product->category->name ?? 'Không có danh mục' }}</td>
                        {{-- <td class="align-middle">{!! Str::limit($product->description, 100) !!}</td> --}}
                               <td class="align-middle"><div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{!! $product->description !!}</div></td>
                        <td class="align-middle">
                            <button class="btn btn-info btn-sm open-variants" data-product-id="{{ $product->id }}" data-variants='@json($product->variants->toArray())'>
                                <i class="fas fa-eye"></i> Biến thể
                            </button>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('products.toggleActive', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $product->is_active ? 'btn-secondary' : 'btn-success' }}">
                                    <i class="fas {{ $product->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i> 
                                    {{ $product->is_active ? 'Ẩn' : 'Hiện' }}
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $products->links() }}

    <!-- Modal hiển thị biến thể -->
    <div class="modal fade" id="variantModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Danh sách biến thể</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>Màu</th>
                                <th>Size</th>
                                <th>Giá cũ</th>
                                <th>Giá mới</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody id="variantTableBody">
                            <!-- Dữ liệu sẽ được load vào đây bằng JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.open-variants').forEach(button => {
        button.addEventListener('click', function () {
            let variants = JSON.parse(this.getAttribute('data-variants')) || [];
            let tableBody = document.getElementById("variantTableBody");
            tableBody.innerHTML = "";

            if (variants.length === 0) {
                tableBody.innerHTML = "<tr><td colspan='5' class='text-center text-muted'>Không có biến thể nào</td></tr>";
            } else {
                variants.forEach(variant => {
                    let row = `
                        <tr>
                            <td>
                                <span style="background-color: ${variant.color.color_code}; display: inline-block; width: 20px; height: 20px; border-radius: 5px;"></span> 
                                ${variant.color.color_name}
                            </td>
                            <td>${variant.size ? variant.size.size_name : 'Không có size'}</td>
                            <td style="text-decoration: line-through; color: #999;">${variant.price} đ</td> <!-- Giá cũ bị gạch ngang -->
                            <td>${variant.discount_price} đ</td>
                            <td>${variant.stock_quantity}</td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            }
            $('#variantModal').modal('show');
        });
    });
});
</script>
@endsection