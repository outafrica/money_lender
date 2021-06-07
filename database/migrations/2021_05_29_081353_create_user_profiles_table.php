<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');          
            $table->string('id_number')->unique()->unique();
            $table->string('kra_pin');
            $table->integer('age');
            $table->integer('gender');
            $table->integer('nationality');
            $table->integer('marital_status');
            $table->integer('dependents');
            $table->integer('residence_type');
            $table->integer('occupation_length');
            $table->integer('occupation_type');
            $table->string('business_nature');
            $table->integer('mortage_value');
            $table->integer('mortage_status');
            $table->integer('open_credits_number');
            $table->integer('credit_use_rate');
            $table->integer('credit_card_length');
            $table->integer('loan_status');
            $table->integer('income_expenditure_ratio');
            $table->integer('job_title');
            $table->string('employer');
            $table->float('desired_credit_limit');
            $table->float('aprroved_credit_limit')->nullable();
            $table->string('uploads');
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
        Schema::dropIfExists('user_profiles');
    }
}
