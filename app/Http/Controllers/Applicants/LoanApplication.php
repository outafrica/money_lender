<?php

namespace App\Http\Controllers\Applicants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Answer;
use App\Models\UserProfile;


class LoanApplication extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answer['age'] = Answer::where('category', 'age')->orderBy('id', 'asc')->get();
        $answer['nationality'] = Answer::where('category', 'nationality')->orderBy('id', 'asc')->get();
        $answer['marital_status'] = Answer::where('category', 'marital_status')->orderBy('id', 'asc')->get();
        $answer['dependents'] = Answer::where('category', 'dependents')->orderBy('id', 'asc')->get();
        $answer['residence_type'] = Answer::where('category', 'residence_type')->orderBy('id', 'asc')->get();
        $answer['occupation_length'] = Answer::where('category', 'occupation_length')->orderBy('id', 'asc')->get();
        $answer['occupation_type'] = Answer::where('category', 'occupation_type')->orderBy('id', 'asc')->get();
        $answer['mortage_value'] = Answer::where('category', 'mortage_value')->orderBy('id', 'asc')->get();
        $answer['mortage_status'] = Answer::where('category', 'mortage_status')->orderBy('id', 'asc')->get();
        $answer['open_credits_number'] = Answer::where('category', 'open_credits_number')->orderBy('id', 'asc')->get();
        $answer['credit_use_rate'] = Answer::where('category', 'credit_use_rate')->orderBy('id', 'asc')->get();
        $answer['credit_card_length'] = Answer::where('category', 'credit_card_length')->orderBy('id', 'asc')->get();
        $answer['loan_status'] = Answer::where('category', 'loan_status')->orderBy('id', 'asc')->get();
        $answer['income_expenditure_ratio'] = Answer::where('category', 'income_expenditure_ratio')->orderBy('id', 'asc')->get();
        $answer['job_title'] = Answer::where('category', 'job_title')->orderBy('id', 'asc')->get();

        return $answer;
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
        // var_dump((int)$request->gender);die();
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'id_number' => 'required',
            'loan_amount' => 'required',
            'kra_pin' => 'required',
            'marital_status' => 'required',
            'dependants' => 'required',
            'residence' => 'required',
            'current_job' => 'required',
            'business_nature'=> 'required',
            'employer'=> 'required',
            'occupation_type'=> 'required',
            'job_role'=> 'required',
            'mortage_value'=> 'required',
            'mortage_status'=> 'required',
            'credit_number'=> 'required',
            'credit_use'=> 'required',
            'credit_length' => 'required',
            'loan_status'=> 'required',
            'expenditure'=> 'required',
            'uploads' => 'required'

        ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->first_name . date('Y'));
        $user->save();
        $user_id = $user->id;

        if($request->current_job == 21){

            return UserProfile::create([
            
                'user_id' => $user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => (int) $request->gender,
                'id_number' => $request->id_number,
                'kra_pin' => $request->kra_pin,
                'age' => $request->age,
                'nationality' => $request->nationality,
                'marital_status' => $request->marital_status,
                'dependents' => $request->dependants,
                'residence_type' => $request->residence,
                'occupation_length' => $request->previous_job,
                'occupation_type' => $request->occupation_type,
                'business_nature' => $request->business_nature,
                'mortage_value' => $request->mortage_value,
                'mortage_status' => $request->mortage_status,
                'open_credits_number' => $request->credit_number,
                'credit_use_rate' => $request->credit_use,
                'credit_card_length' => $request->credit_length,
                'loan_status' => $request->loan_status,
                'income_expenditure_ratio' => $request->expenditure,
                'job_title' => $request->job_role,
                'employer' => $request->employer,
                'desired_credit_limit' => $request->loan_amount,
                'uploads' => $request->uploads,
    
            ]);

        }else{

            return UserProfile::create([
            
                'user_id' => $user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => (int) $request->gender,
                'id_number' => $request->id_number,
                'kra_pin' => $request->kra_pin,
                'age' => $request->age,
                'nationality' => $request->nationality,
                'marital_status' => $request->marital_status,
                'dependents' => $request->dependants,
                'residence_type' => $request->residence,
                'occupation_length' => $request->current_job,
                'occupation_type' => $request->occupation_type,
                'business_nature' => $request->business_nature,
                'mortage_value' => $request->mortage_value,
                'mortage_status' => $request->mortage_status,
                'open_credits_number' => $request->credit_number,
                'credit_use_rate' => $request->credit_use,
                'credit_card_length' => $request->credit_length,
                'loan_status' => $request->loan_status,
                'income_expenditure_ratio' => $request->expenditure,
                'job_title' => $request->job_role,
                'employer' => $request->employer,
                'desired_credit_limit' => $request->loan_amount,
                'uploads' => $request->uploads,
    
            ]);
        }

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

    /**
     * Store a newly created resource in file storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:pdf|',
        ]);
        
        $file = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads'), $file);
        $path = '/uploads/' . $file;

        return $path;
    }
}
