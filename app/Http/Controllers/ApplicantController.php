<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applicants.index');
    }

    // public function register_app()
    // {
    //     return view('applicants.applicant-form');
    // }

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
    // public function store(Request $request)
    // {
    //     $addApplicant = new Applicant();
    //     $addApplicant->sn_number = $request->input('sn_number');
    //     $addApplicant->first_name = $request->input('first_name');
    //     $addApplicant->middle_name = $request->input('middle_name');
    //     $addApplicant->last_name = $request->input('last_name');
    //     $addApplicant->contact_number = $request->input('contact_number');
    //     $addApplicant->email_address = $request->input('email_address');
    //     $addApplicant->home_address = $request->input('home_address');
    //     $addApplicant->city = $request->input('city');
    //     $addApplicant->province = $request->input('province');   
    //     $addApplicant->zip_code = $request->input('zip_code'); 
    //     $addApplicant->save();
        
    //     return back()->with('client_added', 'New Applicant has been added');
    // }

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
}
