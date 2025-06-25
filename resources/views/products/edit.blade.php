@extends('layouts.app')

@section('title', 'แก้ไขสินค้า')

@section('content')
<div class="mb-3">
    <a href="{{ route('products.index') }}" class="btn btn-secondary">← กลับไปยังรายการสินค้า</a>
</div>

<div class="card">
    <h2 style="margin-bottom: 20px; color: #333;">แก้ไขสินค้า: {{ $product->name }}</h2>

    <form method="POST" action="{{ route('products.update', $product) }}" id="productForm">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">ชื่อสินค้า <span style="color: red;">*</span></label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   name="name"
                   value="{{ old('name', $product->name) }}"
                   required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">รายละเอียดสินค้า</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="description"
                      name="description"
                      rows="4">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">ราคา (บาท) <span style="color: red;">*</span></label>
            <input type="number"
                   class="form-control @error('price') is-invalid @enderror"
                   id="price"
                   name="price"
                   value="{{ old('price', $product->price) }}"
                   step="0.01"
                   min="0.01"
                   required>
            @error('price')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">จำนวนสต็อก <span style="color: red;">*</span></label>
            <input type="number"
                   class="form-control @error('stock') is-invalid @enderror"
                   id="stock"
                   name="stock"
                   value="{{ old('stock', $product->stock) }}"
                   min="0"
                   required>
            @error('stock')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">อัพเดทสินค้า</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">ยกเลิก</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Client-side validation (same as create form)
    $('#productForm').on('submit', function(e) {
        let isValid = true;

        $('.error-message').remove();
        $('.form-control').removeClass('is-invalid');

        const name = $('#name').val().trim();
        if (name === '') {
            showError('#name', 'ชื่อสินค้าเป็นข้อมูลที่จำเป็น');
            isValid = false;
        }

        const price = parseFloat($('#price').val());
        if (isNaN(price) || price <= 0) {
            showError('#price', 'ราคาต้องเป็นตัวเลขและมากกว่า 0');
            isValid = false;
        }

        const stock = parseInt($('#stock').val());
        if (isNaN(stock) || stock < 0) {
            showError('#stock', 'จำนวนสต็อกต้องเป็นจำนวนเต็มและไม่น้อยกว่า 0');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    function showError(fieldId, message) {
        $(fieldId).addClass('is-invalid');
        $(fieldId).after('<div class="error-message">' + message + '</div>');
    }
});
</script>
@endsection
