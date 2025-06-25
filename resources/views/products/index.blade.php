@extends('layouts.app')

@section('title', 'รายการสินค้า')

@section('content')
<div class="mb-3">
    <a href="{{ route('products.create') }}" class="btn btn-primary">เพิ่มสินค้าใหม่</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <h2 style="margin-bottom: 20px; color: #333;">รายการสินค้าทั้งหมด</h2>

    @if($products->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสินค้า</th>
                    <th>รายละเอียด</th>
                    <th>ราคา</th>
                    <th>จำนวนสต็อก</th>
                    <th>วันที่สร้าง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $num => $product)
                <tr>
                    <td>{{ $num + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::limit($product->description, 50) ?? 'ไม่มีรายละเอียด' }}</td>
                    <td>฿{{ number_format($product->price, 2) }}</td>
                    <td>{{ number_format($product->stock) }}</td>
                    <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">แก้ไข</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}"
                              style="display: inline-block;"
                              onsubmit="return confirmDelete('{{ $product->name }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center" style="padding: 50px;">
            <h3 style="color: #6c757d;">ยังไม่มีสินค้าในระบบ</h3>
            <p style="color: #6c757d;">คลิกปุ่ม "เพิ่มสินค้าใหม่" เพื่อเริ่มต้นเพิ่มสินค้า</p>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function confirmDelete(productName) {
    return confirm('คุณแน่ใจหรือไม่ที่จะลบสินค้า "' + productName + '"?');
}

// Show success message animation
$(document).ready(function() {
    $('.alert-success').hide().slideDown(300).delay(3000).slideUp(300);
});
</script>
@endsection
