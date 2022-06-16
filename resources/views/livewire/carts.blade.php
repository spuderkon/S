<div class="row cart_items_row">
    <div class="col">

        @foreach($UserCarts as $item)
            @php
                $connection = $item->product;
            @endphp
            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_item_image">
                        <div><img src="/images/products/{{$connection->VenCode}}/1.jpg" alt=""></div>
                    </div>
                    <div class="cart_item_name_container">
                        <div class="cart_item_name"><a
                                    href="{{route('product',$connection->VenCode)}}">{{$connection->Name}}</a></div>
                    </div>
                </div>
                <div class="cart_item_price">{{$connection->Price}} руб.</div>
                <div class="cart_item_quantity">
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Кол</span>
                            <input min="0" wire:model="quantities.{{$item->Cart_id}}"
                                   wire:change="update({{$item}},{{$connection->Price}})" type="number"
                                   value="{{$item->Product_amount}}">
                        </div>
                    </div>
                </div>
                <div class="cart_item_total">{{$item->Total}} руб.</div>
            </div>
            <div class="cart_info_columns clearfix"></div>
        @endforeach

    </div>
</div>
<div class="row row_cart_buttons">
    <div class="col">
        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
            <div class="cart_buttons_right ml-lg-auto">
                <div class="button update_cart_button"><a href="{{route('catalog')}}">Добавить игрушки</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row row_extra">
    <div class="col-lg-4">

        <!-- Delivery -->
        <div class="delivery">
            <div class="section_title">Способ доставки</div>
            <div class="section_subtitle">Выберите тот, что Вам больше подходит</div>
            <div class="delivery_options">
                <label class="delivery_option clearfix">Завтра под дверь
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                    <span class="delivery_price">600 руб.</span>
                </label>
                <label class="delivery_option clearfix">Обычная доставка
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                    <span class="delivery_price">200 руб.</span>
                </label>
                <label class="delivery_option clearfix">Забрать с места выдачи
                    <input type="radio" checked="checked" name="radio">
                    <span class="checkmark"></span>
                    <span class="delivery_price">Бесплатно</span>
                </label>
            </div>
        </div>

        <!-- Coupon Code -->
        <div class="coupon">
            <div class="section_title">Код купона</div>
            <div class="section_subtitle">Введите ваш код купона</div>
            <div class="coupon_form_container">
                <form action="#" id="coupon_form" class="coupon_form">
                    <input type="text" class="coupon_input" required="required">
                    <button class="button coupon_button"><span>Подтвердить</span></button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6 offset-lg-2">
        <div class="cart_total">
            <div class="section_title">Итог корзины</div>
            <div class="section_subtitle">Итоговая информация</div>
            <div class="cart_total_container">
                <ul>
                    <!-- <li class="d-flex flex-row align-items-center justify-content-start">
                         <div class="cart_total_title">Subtotal</div>
                         <div class="cart_total_value ml-auto">$790.90</div>
                     </li>
                     <li class="d-flex flex-row align-items-center justify-content-start">
                         <div class="cart_total_title">Shipping</div>
                         <div class="cart_total_value ml-auto">Free</div>
                     </li>-->
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_total_title">Итого:</div>
                        <label wire:model="totalprice" class="cart_total_value ml-auto">{{$totalprice}} руб</label>
                    </li>
                </ul>
            </div>
            <div class="button checkout_button"><a href="#">Оплатить</a></div>
        </div>
    </div>
</div>
</div>
</div>
