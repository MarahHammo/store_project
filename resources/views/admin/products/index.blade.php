@extends('layouts.admin')
{{-- حتى يرث القالب الجديد --}}
{{-- @extends('layouts.app') --}}
@section('content')
    <div class="py-3 px-4">
        <a href="{{route('product_create')}}" class="btn btn-secondary">اضافة منتج جديد</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">الصنف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الاحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    {{-- الطريقة القديمة بدون علاقات --}}
                    {{-- <td>{{$categories[$product->category_id-1]->name}}</td> --}}
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <a href="{{ route('product_delete', $product->id) }}" class="btn btn-danger">حذف</a>
                        <a href="{{ route('product_edit', $product->id) }}" class="btn btn-info">تعديل</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
