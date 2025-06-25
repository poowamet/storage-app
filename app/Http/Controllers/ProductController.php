<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            Product::validationRules(),
            Product::validationMessages()
        );

        Product::create($request->only(['name', 'description', 'price', 'stock']));

        return redirect()->route('products.index')
            ->with('success', 'เพิ่มสินค้าสำเร็จ!');
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate(
            Product::validationRules(),
            Product::validationMessages()
        );

        $product->update($request->only(['name', 'description', 'price', 'stock']));

        return redirect()->route('products.index')
            ->with('success', 'แก้ไขสินค้าสำเร็จ!');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'ลบสินค้าสำเร็จ!');
    }
}
