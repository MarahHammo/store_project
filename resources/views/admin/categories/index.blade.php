@extends('layouts.admin')
{{-- حتى يرث القالب الجديد --}}
{{-- @extends('layouts.app') --}}
@section('content')
    <div class="py-3 px-4">
        <a href="{{route('category_create')}}" class="btn btn-secondary">اضافة صنف جديد</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">الاحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('category_delete', $category->id) }}" class="btn btn-danger">حذف</a>
                        <a href="{{ route('category_edit', $category->id) }}" class="btn btn-info">تعديل</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
@endsection
