<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiparisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sifaris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sepet_id')->unsigned();
            $table->decimal('siparis_tutari',5,4);
            $table->string('durum',30)->nullable();
            $table->string('banka',20)->nullable();
            $table->integer('taksit_siyahisi')->nullable();
            
            $table->timestamp("yaratma_tarixi")->default(DB::raw('CURRENT_TIMESTAMP'));

             $table->timestamp("yenileme_tarixi")->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));

             $table->timestamp("silinme_tarixi")->nullable();

             $table->unique('sepet_id');
             $table->foreign('sepet_id')->references('id')->on('sepet')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sifaris');
    }
}
