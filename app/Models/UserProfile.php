<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
        'user_id',
        'first_name',
        'last_name',
        'id_number',
        'kra_pin',
        'age',
        'gender',
        'nationality',
        'marital_status',
        'dependents',
        'residence_type',
        'occupation_length',
        'occupation_type',
        'business_nature',
        'mortage_value',
        'mortage_status',
        'open_credits_number',
        'credit_use_rate',
        'credit_card_length',
        'loan_status',
        'income_expenditure_ratio',
        'job_title',
        'employer',
        'desired_credit_limit',
        'aprroved_credit_limit',
        'uploads',
        
    ];
}
