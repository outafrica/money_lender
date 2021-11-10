<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\Answer;
use App\Models\LoanCluster;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserProfile::orderBy('id', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Fetch the users profile for viewing
    public function getProfile(Request $request)
    {
        //
        $profile['age'] =  Answer::where('id', $request->age)->value('description');
        $profile['age_point'] =  Answer::where('id', $request->age)->value('points');
        $profile['nationality'] =  Answer::where('id', $request->nationality)->value('description');
        $profile['nationality_point'] =  Answer::where('id', $request->nationality)->value('points');
        $profile['marital_status'] =  Answer::where('id', $request->marital_status)->value('description');
        $profile['marital_status_point'] =  Answer::where('id', $request->marital_status)->value('points');
        $profile['dependents'] =  Answer::where('id', $request->dependents)->value('description');
        $profile['dependents_point'] =  Answer::where('id', $request->dependents)->value('points');
        $profile['residence_type'] =  Answer::where('id', $request->residence_type)->value('description');
        $profile['residence_type_point'] =  Answer::where('id', $request->residence_type)->value('points');
        $profile['occupation_length'] =  Answer::where('id',$request->occupation_length)->value('description');
        $profile['occupation_length_point'] =  Answer::where('id',$request->occupation_length)->value('points');
        $profile['occupation_type'] =  Answer::where('id',$request->occupation_type)->value('description');
        $profile['occupation_type_point'] =  Answer::where('id',$request->occupation_type)->value('points');
        $profile['mortage_value'] =  Answer::where('id',$request->mortage_value)->value('description');
        $profile['mortage_value_point'] =  Answer::where('id',$request->mortage_value)->value('points');
        $profile['mortage_status'] =  Answer::where('id',$request->mortage_status)->value('description');
        $profile['mortage_status_point'] =  Answer::where('id',$request->mortage_status)->value('points');
        $profile['open_credits_number'] =  Answer::where('id',$request->open_credits_number)->value('description');
        $profile['open_credits_number_point'] =  Answer::where('id',$request->open_credits_number)->value('points');
        $profile['credit_use_rate'] =  Answer::where('id',$request->credit_use_rate)->value('description');
        $profile['credit_use_rate_point'] =  Answer::where('id',$request->credit_use_rate)->value('points');
        $profile['credit_card_length'] =  Answer::where('id',$request->credit_card_length)->value('description');
        $profile['credit_card_length_point'] =  Answer::where('id',$request->credit_card_length)->value('points');
        $profile['loan_status'] =  Answer::where('id',$request->loan_status)->value('description');
        $profile['loan_status_point'] =  Answer::where('id',$request->loan_status)->value('points');
        $profile['income_expenditure_ratio'] =  Answer::where('id',$request->income_expenditure_ratio)->value('description');
        $profile['income_expenditure_ratio_point'] =  Answer::where('id',$request->income_expenditure_ratio)->value('points');
        $profile['job_title'] =  Answer::where('id',$request->job_title)->value('description');
        $profile['job_title_point'] =  Answer::where('id',$request->job_title)->value('points');
        
        $profile['total_points'] = $profile['nationality_point'] + $profile['marital_status_point'] + $profile['age_point'] +
                                    $profile['dependents_point'] + $profile['residence_type_point'] + $profile['occupation_length_point'] + 
                                    $profile['occupation_type_point'] + $profile['mortage_value_point'] + $profile['mortage_status_point'] +
                                    $profile['open_credits_number_point'] + $profile['credit_use_rate_point'] + $profile['credit_card_length_point'] + 
                                    $profile['loan_status_point'] + $profile['income_expenditure_ratio_point'] + $profile['job_title_point'];
        
        $profile['percentage_points'] = ($profile['total_points'] / 950) * 100;
        $profile['percentage_points'] = (int)$profile['percentage_points'];
        
        $profile['deserved_loan'] = LoanCluster::where('min', '<=', $profile['total_points'])->where('max', '>=', $profile['total_points'])->value('value');

        return $profile;

    }
}
