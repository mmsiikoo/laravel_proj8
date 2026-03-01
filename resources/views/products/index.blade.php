@extends('layouts.main') {{-- наслідування від базового шаблону --}}

@section('content')
    <h2>@isset($category)
            Товари в категорії: "{{ $category->name }}"
        @else
            Список усіх товарів:
        @endisset
    </h2>

    @if(isset($products) && count($products) > 0)
        <ul>
            @foreach($products as $product)
                <li>
                    {{-- динамічне посилання за id товару --}}
                    <a href="/products/{{ $product->id }}">
                        <strong>{{ $product->name }}</strong>
                    </a>
                    — {{number_format($product->price) }} грн

                    @if($product->category)
                        (Категорія: <a href="/category/{{ $product->category->id }}">{{ $product->category->name }}</a>)
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>На жаль, товарів поки немає.</p>
    @endif

    <br>
    <a href="/">Повернутися на головну</a>
@endsection
