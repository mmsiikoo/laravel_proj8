<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
class ProductController extends Controller
{
    // метод для списку товарів (GET)
    public function index(): View
    {
        //всі товари з БД разом із їхніми категоріями (Eager Loading)
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    // метод для одного товару з параметром (GET з параметром)
    public function show(int $id): View
    {
        //пошук товару в базі за id (або помилка, якщо не знайдено)
        $product = Product::with(['category', 'tags'])->findOrFail($id);
        return view('products.show', compact('product', 'id'));
    }


    //метод для навігації для товарів конкретної категорії
    public function category(int $id): View
    {
        $category = Category::findOrFail($id);
        $products = $category->products;

        return view('products.index', compact('products', 'category'));
    }

    //метод для імітації POST запиту
    public function store(Request $request)
    {
        //беру дані з POST
        $name = $request->post('name');

        //перевірка
        if (!$name) {
            return "Помилка: Ім'я не передано!";
        }

        //повернення успішного результату ( через склеювання рядків (конкатенацію) )
        return "Товар '" . htmlspecialchars($name) . "' успішно додано!";
    }
}
