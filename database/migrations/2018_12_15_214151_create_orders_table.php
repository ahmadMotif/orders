<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\OrderStatus;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('files')->nullable();
            $table->string('aritrator_decision')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('language_cheker_report')->nullable();
            $table->datetime('finished_at')->nullable();
            $table->tinyInteger('accepted')->default(1);
            $table->tinyInteger('customer_accepted')->default(1);
            $table->tinyInteger('status')->unsigned()->default(OrderStatus::newOrder);

            $table->string('applicant_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('cv')->nullable();
            $table->string('passport_img')->nullable();
            $table->string('photo')->nullable();
            $table->string('delivery_way')->nullable();
            $table->string('band_details')->nullable();
            $table->boolean('translated')->default(0);
            $table->string('contract_img')->nullable();
            $table->string('original_author')->nullable();
            $table->string('source_language')->nullable();

            $table->timestamps();

            $table->softDeletes();
            // $table->index(['deleted_at']);
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
