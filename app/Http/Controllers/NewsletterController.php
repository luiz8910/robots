<?php

namespace Admin\Http\Controllers;

use Admin\Repositories\NewsletterRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Admin\Http\Requests;
use Admin\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    /**
     * @var NewsletterRepository
     */
    private $repository;

    public function __construct(NewsletterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($email)
    {
        $existEmail = $this->repository->findByField('email', $email);

        if(count($existEmail) > 0)
        {
            //O Email já existe no BD
            echo json_encode(['status' => false]);
        }
        else
        {
            //O Email não existe
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('newsletters')
            ->insert(
                [
                    'email' => $email,
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ]
            );

            echo json_encode(['status' => true]);
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
}
