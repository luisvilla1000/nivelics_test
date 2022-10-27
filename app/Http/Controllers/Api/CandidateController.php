<?php

namespace App\Http\Controllers\Api;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CandidateRequest;

class CandidateController extends Controller
{

    private $candidate;
    public function __construct(Candidate $candidate){
        $this->candidate = $candidate;
         $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'agent'){
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => [
                        'User Unauthorized'
                    ]
                ]
            ],401);
        }

        $candidates = Candidate::all();
        return response()->json([
            'meta' => [
                'success' => true,
                'errors' => []
            ],
            "data" => $candidates
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        if(Auth::user()->role == 'agent'){
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => [
                        'User Unauthorized'
                    ]
                ]
            ],401);
        }

        try {
            $candidate = $this->candidate::create([
                'name' => $request['name'],
                'owner' => $request['owner'],
                'source' => $request['source'],
                'created_by' => Auth::user()->_id
            ]);
            return response()->json([
                'meta' => [
                    'success' => true,
                    'errors' => []
                ],
                "data" => $candidate
            ],201);
        } catch (\Throwable $th) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => [
                        'Token Expired'
                    ]
                ]
            ],401);
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
        if(Auth::user()->role == 'manager'){
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => [
                        'User Unauthorized'
                    ]
                ]
            ],401);
        }
        $candidate = Candidate::find($id);
        if($candidate->owner == Auth::user()->id){
            return response()->json([
                'meta' => [
                    'success' => true,
                    'errors' => []
                ],
                "data" => $candidate
            ],201);
        }
        return response()->json([
            'meta' => [
                'success' => false,
                'errors' => [
                    'El usuario que busca no le pertenece'
                ]
            ]
        ],401);
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
