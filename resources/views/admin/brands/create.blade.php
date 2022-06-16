@extends('layout.admin')

@section('title',  isset($Brand) ? "Редактировать брэнд ID {$Brand->Brand_id}" : 'Добавить брэнд')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($Brand) ? "Редактировать брэнд ID {$Brand->Brand_id}" : 'Добавить брэнд' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form class="space-y-5 mt-5" method="POST" action="{{ isset($Brand) ? route("admin.brands.update", $Brand) : route("admin.brands.store") }}">
                @csrf

                @if(isset($Brand))
                    @method('PUT')
                @endif

                <div>
                <label class="text-gray-700 text-2xl">Название</label>
                <input name="Name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('Name') border-red-500 @enderror" placeholder="Название категории" value="{{ $Brand->Name ?? '' }}" />
                @error('Name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection