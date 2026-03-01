@extends('layouts.main') {{-- наслідування базового шаблону --}}

@section('content')
    <h2>Деталі товару №{{ $id }}</h2> {{-- виведення параметру з url  --}}

    {{-- перевірка if--}}
    @if(isset($product))
        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
            {{-- вставка змінних об'єкта --}}
            <h3>Назва: {{ $product->name }}</h3>
            <p>Ціна: <strong>{{ number_format($product->price, 2) }} грн</strong></p>

            <p>Категорія:
                <a href="/category/{{ $product->category->id }}">
                    {{ $product->category->name }}
                </a>
            </p>

            {{-- вивід тегів (many-to-many) --}}
            <div>
                <strong>Теги:</strong>
                @foreach($product->tags as $tag)
                    <span style="background: #eee; padding: 2px 5px; margin-right: 5px; border-radius: 3px;">
                        #{{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>
    @else
        <p>Товар не знайдено.</p>
    @endif

    <br>
    <a href="/">Повернутися до списку</a>
@endsection
