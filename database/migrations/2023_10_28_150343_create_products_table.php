<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('images');
            $table->float('price', 8, 2)->default(0);
            $table->integer('discount')->default(0);
            $table->text('descp')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('sale')->default(false);
            $table->enum('conditions', ['new', 'popular', 'feature', 'winter'])->default('new');
            $table->enum('added_by', ['admin', 'seller'])->default('admin');
            $table->enum('status',[true,false])->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
