<?php


return [
    "guard" => "web",

    "product_table" => "products",
    "user_table" => "users",
    "product_variant_table" => "product_variants",

    "product_model" => \App\Models\Product::class,
    //"product_variant_model" => ProductVariant::class,
    "user_model" => \App\Models\User::class,
];