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
        $team = $this->repository->all();

        return view('admin.equipe.index', compact('team'));
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

        $data['img'] = $data['nome'];

        $this->repository->create($data);

        $request->file('img')->move('uploads/equipe', $data['nome'].'.png');

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
        $data = $request->all();

        $data['img'] = $data['nome'];

        $this->repository->update($data, $id);

        $request->file('img')->move('uploads/equipe', $data['nome'].'.png');

        return redirect()->route('admin.equipe.index')->withInput();
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
