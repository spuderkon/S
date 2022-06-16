@extends('layout.admin')

@section('title',  isset($Category) ? "Редактировать категорию ID {$Category->Category_id}" : 'Добавить категорию')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($Category) ? "Редактировать продукт ID {$Category->Category_id}" : 'Добавить категорию' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form class="space-y-5 mt-5" method="POST" action="{{ isset($Category) ? route("admin.categories.update", $Category) : route("admin.categories.store") }}">
                @csrf

                @if(isset($Category))
                    @method('PUT')
                @endif

                <div>
                <label class="text-gray-700 text-2xl">Название</label>
                <input name="Name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('Name') border-red-500 @enderror" placeholder="Название категории" value="{{ $Category->Name ?? '' }}" />
                @error('Name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>

                <div>
                <label class="text-gray-700 text-2xl">ID родителя</label>
                    <input name="Parent_id" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('Parent_id') border-red-500 @enderror" placeholder="ID производителя" value="{{ $Category->Parent_id ?? '' }}" />       
                @error('Parent_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection