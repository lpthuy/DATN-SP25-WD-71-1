@extends('adminlte::page')

@section('title', 'Danh sách Hình ảnh Sản phẩm')

@section('content_header')
    <h1>Danh sách Hình ảnh Sản phẩm</h1>
@endsection

@section('content')
    <a href="{{ route('products_images.create') }}" class="btn btn-primary mb-3">Thêm Hình ảnh</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images->groupBy('product_id') as $productId => $group)
                <tr>
                    <td>{{ $group->first()->id }}</td>
                    <td>{{ $group->first()->product->name }}</td>
                    <td>
                        @foreach($group as $image)
                            <img src="{{ asset('storage/' . $image->image_url) }}" width="80" height="80" class="mr-2" style="border:1px solid #ccc;">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('products_images.edit', $group->first()->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        
                        <!-- Nút mở modal chọn ảnh để xóa -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $group->first()->product_id }}">
                            Xóa
                        </button>

                        <!-- Modal chọn ảnh để xóa -->
                        <div class="modal fade" id="deleteModal{{ $group->first()->product_id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Xóa Hình Ảnh Sản Phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Chọn hình ảnh cần xóa:</p>
                                        <form action="{{ route('products_images.destroy', $group->first()->product_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <input type="checkbox" id="select-all-{{ $group->first()->product_id }}" onclick="toggleSelectAll({{ $group->first()->product_id }})">
                                                    <label for="select-all-{{ $group->first()->product_id }}">Chọn tất cả</label>
                                                </div>
                                                @foreach($group as $image)
                                                    <div class="col-md-4 text-center">
                                                        <input type="checkbox" name="image_ids[]" value="{{ $image->id }}" class="image-checkbox-{{ $group->first()->product_id }}">
                                                        <img src="{{ asset('storage/' . $image->image_url) }}" width="80" height="80" class="img-thumbnail">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="submit" class="btn btn-danger mt-3">Xóa Ảnh Đã Chọn</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function toggleSelectAll(productId) {
            let checkboxes = document.querySelectorAll('.image-checkbox-' + productId);
            let selectAll = document.getElementById('select-all-' + productId).checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll;
            });
        }
    </script>
@endsection
