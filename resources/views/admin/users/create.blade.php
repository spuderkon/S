@extends('layout.admin')

@section('title',  isset($Product) ? "Пользователь ID {$User->User_id}" : 'Добавить продукт')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($Product) ? "Редактировать продукт ID {$Product->Product_id}" : 'Добавить продукт' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($Product) ? route("admin.products.edit", $Product->Product_id) : route("admin.products.store") }}">
                @csrf

                @if(isset($Product))
                    @method('PUT')
                @endif

                <div>
                <label class="text-gray-700 text-2xl">ID пользователя</label>
                <label clas="text-gray-700 text-2xl">{{$User->Name}}</label>
                <input name="Name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('Name') border-red-500 @enderror" placeholder="Название" value="{{ $User->Name ?? '' }}" />
                @error('Name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <div>
                <label class="text-gray-700 text-2xl">Email</label>
                <input name="Email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('Email') border-red-500 @enderror" placeholder="Email" value="{{ $Product->Category_id ?? '' }}" />
                @error('Category_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>

                <div>
                <label class="text-gray-700 text-2xl">ID Phone</label>
                <input name="Brand_id" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('Brand_id') border-red-500 @enderror" placeholder="ID брэнда" value="{{ $Product->Brand_id ?? '' }}" />
                @error('Brand_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>
            </form>
        </div>
    </div>
@endsection