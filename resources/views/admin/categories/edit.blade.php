@extends('layouts.admin')
{{-- حتى يرث القالب الجديد --}}
{{-- @extends('layouts.app') --}}
@section('content')
    <div class="py-3 px-4">
        <form action="{{ route('category_update', $category->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">اسم الصنف</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            <div class="mb-3">
                <input type="submit" value="احفظ" class="btn btn-info">
            </div>
        </form>
    </div>
@endsection
