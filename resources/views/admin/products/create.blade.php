@extends('layout.admin')

@section('title',  isset($Product) ? "Редактировать продукт ID {$Product->Product_id}" : 'Добавить продукт')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($Product) ? "Редактировать продукт ID {$Product->Product_id}" : 'Добавить продукт' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST"
                  action="{{ isset($Product) ? route("admin.products.update", $Product) : route("admin.products.store") }}">
                @csrf

                @if(isset($Product))
                    @method('PUT')
                @endif
                <div>
                    <label class="text-gray-700 text-2xl">ID категории</label>
                    <select name="Category_id" class="w-full h-12 border border-gray-800 rounded px-3">
                        @foreach($Categories as $category)
                            @if(isset($Product))
                                @if(is_null($category->Parent_id))
                                    @if(($Product->Category_id) == $category->Category_id)
                                        <option value="{{$category->Category_id}}"
                                                selected>{{$category->Category_id.' - '.$category->Name}}</option>
                                    @else
                                        <option value="{{$category->Category_id}}">{{$category->Category_id.' - '.$category->Name}}</option>
                                    @endif
                                @else
                                    @if(($Product->Category_id) == $category->Category_id)
                                        <option selected
                                                value="{{$category->Category_id}}">{{$category->Category_id.' - '.$category->Name.' - '.$category->Parent_id}}</option>
                                    @else
                                        <option value="{{$category->Category_id}}">{{$category->Category_id.' - '.$category->Name.' - '.$category->Parent_id}}</option>
                                    @endif
                                @endif
                            @else
                                @if(is_null($category->Parent_id))
                                    <option value="{{$category->Category_id}}">{{$category->Category_id.' - '.$category->Name}}</option>
                                @else
                                    <option value="{{$category->Category_id}}">{{$category->Category_id.' - '.$category->Name.' - '.$category->Parent_id}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-gray-700 text-2xl">Название</label>
                    <input name="Name" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('Name') border-red-500 @enderror"
                           placeholder="Название" value="{{ $Product->Name ?? '' }}"/>
                    @error('Name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-2xl">ID производителя</label>
                    <select name="Manufacturer_id" class="w-full h-12 border border-gray-800 rounded px-3">
                        @foreach($Manufacturers as $manufacturer)
                            @if(isset($Product))
                                @if($Product->Manufacturer_id == $manufacturer->Manufacturer_id)
                                    <option selected
                                            value="{{$manufacturer->Manufacturer_id}}">{{$manufacturer->Manufacturer_id .' - '. $manufacturer->Name}}</option>
                                @else
                                    <option value="{{$manufacturer->Manufacturer_id}}">{{$manufacturer->Manufacturer_id .' - '. $manufacturer->Name}}</option>
                                @endif
                            @else
                                <option value="{{$manufacturer->Manufacturer_id}}">{{$manufacturer->Manufacturer_id .' - '. $manufacturer->Name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">ID материала</label>
                    <select name="Material_id" class="w-full h-12 border border-gray-800 rounded px-3">
                        @foreach($Materials as $material)
                            @if(isset($Product))
                                @if($Product->Age_audience_id == $material->Material_id)
                                    <option selected
                                            value="{{$material->Material_id}}">{{$material->Material_id .' - '. $material->Name}}</option>
                                @else
                                    <option value="{{$material->Material_id}}">{{$material->Material_id .' - '. $material->Name}}</option>
                                @endif
                            @else
                                <option value="{{$material->Material_id}}">{{$material->Material_id .' - '. $material->Name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">ID брэнда</label>
                    <select name="Brand_id" class="w-full h-12 border border-gray-800 rounded px-3">
                        @foreach($Brands as $brand)
                            @if(isset($Product))
                                @if($Product->Brand_id == $brand->Brand_id)
                                    <option selected
                                            value="{{$brand->Brand_id}}">{{$brand->Brand_id .' - '. $brand->Name}}</option>
                                @else
                                    <option value="{{$brand->Brand_id}}">{{$brand->Brand_id .' - '. $brand->Name}}</option>
                                @endif
                            @else
                                <option value="{{$brand->Brand_id}}">{{$brand->Brand_id .' - '. $brand->Name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">ID возрастной категории</label>
                    <select name="Age_audience_id" class="w-full h-12 border border-gray-800 rounded px-3">
                        @foreach($AgeAudiences as $ageAudience)
                            @if(isset($Product))
                                @if($Product->Age_audience_id == $ageAudience->Age_audience_id)
                                    <option selected
                                            value="{{$ageAudience->Age_audience_id}}">{{$ageAudience->Age_audience_id .' - '. $ageAudience->Age}}</option>
                                @else
                                    <option value="{{$ageAudience->Age_audience_id}}">{{$ageAudience->Age_audience_id .' - '. $ageAudience->Age}}</option>
                                @endif
                            @else
                                <option value="{{$ageAudience->Age_audience_id}}">{{$ageAudience->Age_audience_id .' - '. $ageAudience->Age}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">Цена</label>
                    <input name="Price" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('Price') border-red-500 @enderror"
                           placeholder="Цена" value="{{ $Product->Price ?? '' }}"/>
                    @error('Price')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">Вес</label>
                    <input name="Weight" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('Weight') border-red-500 @enderror"
                           placeholder="Вес" value="{{ $Product->Weight ?? '' }}"/>
                    @error('Weight')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-2xl">Размер</label>
                    <input name="Size" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('Size') border-red-500 @enderror"
                           placeholder="Размер" value="{{ $Product->Size ?? '' }}"/>
                    @error('Size')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">Размер упаковки</label>
                    <input name="Packing_size" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('Packing_size') border-red-500 @enderror"
                           placeholder="Размер упаковки" value="{{ $Product->Packing_size ?? '' }}"/>
                    @error('Packing_size')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-2xl">Количество деталей</label>
                    <input name="Details_amount" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('Details_amount') border-red-500 @enderror"
                           placeholder="Количество деталей" value="{{ $Product->Details_amount ?? '' }}"/>
                    @error('Details_amount')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-2xl">Описание</label>
                    <input name="Description" type="text"
                           class="w-full h-20 border border-gray-800 rounded px-3 @error('Description') border-red-500 @enderror"
                           placeholder="Описание" value="{{ $Product->Description ?? '' }}"/>
                    @error('Description')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-2xl">Артикул</label>
                    <input name="VenCode" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('VenCode') border-red-500 @enderror"
                           placeholder="Артикул" value="{{ $Product->VenCode ?? '' }}"/>
                    @error('VenCode')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">Дата прибытия(Создаётся автоматически при создании)</label>
                    @if(isset($Product))
                        <p class="text-gray-700 text-2xl">{{date('d-m-y', $Product->Delivered_date ?? '')}}</p>
                    @endif
                    @error('Delivered_date')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 text-2xl">Картинки</label>
                    <div class="images">
                        @if(isset($Product))
                            @for($i = 1; $i <= App\Http\Controllers\Controller::getFileCount($Product->VenCode);$i++)
                                <div class="image" data-image="/images/products/{{$Product->VenCode}}/{{$i}}.jpg"><img
                                            src="/images/products/{{$Product->VenCode}}/{{$i}}.jpg" alt=""></div>
                            @endfor
                        @endif
                    </div>
                    <input name="Images[]" type="file" class="w-full h-12" placeholder="Обложка" multiple/>
                </div>
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection