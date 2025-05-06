<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('charity_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('charity_name');
            $table->bigInteger('province')->nullable();
            $table->bigInteger('law_under_which_registered')->nullable();
            $table->string('category_area_operations')->nullable();
            $table->string('fullname')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('cnic')->nullable();
            $table->bigInteger('nature_of_authorization')->nullable();
            $table->bigInteger('network')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('authorization_document')->nullable();
            $table->bigInteger('selected_category_fee')->nullable()->default(0);
            $table->string('applicant_name')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('account_name')->nullable();
            $table->bigInteger('bank_name')->nullable();
            $table->string('bank_branch_name');
            $table->string('bank_branch_code')->nullable();
            $table->bigInteger('amount')->nullable()->default(0);
            $table->date('deposit_date');
            $table->tinyInteger('accept');
            $table->foreignId('created_by')->nullable()->constrained('users', 'id');
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charity_registrations');
    }
};
