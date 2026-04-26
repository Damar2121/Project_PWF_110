<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
Illuminate\Support\Facades\Schema::table('products', function ($table) {
    $table->dropColumn('category_id');
});
echo "Column dropped\n";
