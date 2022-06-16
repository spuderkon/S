@extends('layout.admin')

@section('title',  isset($Product) ? "Пользователь ID {$User->user_id}" : 'Добавить продукт')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($User) ? "Пользователь ID {$User->user_id}" : 'Посмотреть пользователя' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($Product) ? route("admin.products.update", $Product->Product_id) : route("admin.products.store") }}">
                @csrf

                @if(isset($Product))
                    @method('PUT')
                @endif

                <div>
                <label class="text-gray-700 text-2xl">Email</label>
                <p clas="text-gray-700 text-2xl">{{$User->email}}</p>
                </div>

                <div>
                <label class="text-gray-700 text-2xl">Номер телефона</label>
                <p clas="text-gray-700 text-2xl">{{$User->phone}}</p>
                </div>
            </form>
        </div>
    </div>
@endsection