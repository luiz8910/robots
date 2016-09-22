<?php

namespace Admin\Http\Controllers;

use Admin\Repositories\EquipeRepository;
use Illuminate\Http\Request;

use Admin\Http\Requests;
use Admin\Http\Controllers\Controller;

class EquipeController extends Controller
{
    /**
     * @var EquipeRepository
     */
    private $repository;

    public function __construct(EquipeRepository $repository)
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
        return view('admin.equipe.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipe.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\EquipeRequest $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('admin.equipe.index')->withInput();

//        $file = $request->file('img');
//        //$nome = $this->repository->find($id)->nome;
//        $ext = $file->getClientOriginalExtension();
//
//        //$fullName = $id.'-'.$nome.'.'.$ext;
//
//        DB::table('equipes')
//            ->where('id', $id)
//            ->update(['img' => $fullName]);
//
//
//        $request->file('img')->move('uploads/equipe', $fullName);
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
        $file = $request->file('img');
        $nome = $this->repository->find($id)->nome;
        $ext = $file->getClientOriginalExtension();

        $fullName = $id.'-'.$nome.'.'.$ext;

        DB::table('equipes')
            ->where('id', $id)
            ->update(['img' => $fullName]);


        $request->file('img')->move('uploads/equipe', $fullName);
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
