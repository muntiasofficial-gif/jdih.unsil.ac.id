<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrepareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_peraturan', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('subjek', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('tipe_peraturan', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('document_peraturan', function (Blueprint $table) {
            $table->id();
            $table->text('path')->nullable();
            $table->timestamps();
        });
        Schema::create('peraturan', function (Blueprint $table) {
            $table->id();
            $table->text('judul')->nullable();
            $table->string('badan')->comment('T.E.U. Badan/Pengarang')->nullable();
            $table->string('nomor_peraturan')->nullable();
            $table->string('tempat_penetapan')->nullable();
            $table->integer('tahun')->nullable();
            $table->date('tanggal_ditetapkan')->nullable();
            $table->date('tanggal_diundangkan')->nullable();
            $table->enum('status', ['Berlaku', 'Tidak Berlaku'])->nullable();
            $table->string('bahasa')->nullable();
            $table->string('lokasi')->nullable();
            $table->bigInteger('count')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('subjek_id')->nullable();
            $table->foreignId('tipe_peraturan_id')->nullable();
            $table->foreignId('jenis_peraturan_id')->nullable();
            $table->foreignId('document_peraturan_id')->nullable();
            $table->foreignId('parent_id')->nullable()->comment('peraturan yang berkaitan');
            $table->timestamps();
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('tipe_peraturan_id')
                ->references('id')
                ->on('tipe_peraturan')
                ->onDelete('cascade');
            $table->foreign('subjek_id')
                ->references('id')
                ->on('subjek')
                ->onDelete('cascade');
            $table->foreign('jenis_peraturan_id')
                ->references('id')
                ->on('jenis_peraturan')
                ->onDelete('cascade');
            $table->foreign('document_peraturan_id')
                ->references('id')
                ->on('document_peraturan')
                ->onDelete('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peraturan');
        Schema::dropIfExists('jenis_peraturan');
        Schema::dropIfExists('tipe_peraturan');
        Schema::dropIfExists('tipe_peraturan');

        //
    }
}
