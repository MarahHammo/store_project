@extends('layouts.admin')
@section('content')
    <div class="py-3">
        <form action="{{ url('products/update/' . $product->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">اسم المنتج</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">الكمية</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"> السعر</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">وصف المنتج </label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">اختر الصنف</label>
                <select class="form-control" name="category" id="category" >
                    <option value="{{$category_name->id }}">{{$category_name->name }}</option>
                    {{-- طريقة اخرى --}}
                    {{-- <option value = "{{$categories[ $product->category_id-1]->id }}">{{ $categories[ $product->category_id-1]->name }}</option>   --}}
                    @foreach ($categories as $category)
                        <option value = "{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="احفظ" class="btn btn-info">
            </div>
        </form>
    </div>
@endsection
