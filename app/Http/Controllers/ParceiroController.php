<?php

namespace admin\Http\Controllers;

use admin\Repositories\ParceiroRepository;
use Illuminate\Http\Request;

use admin\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use admin\Http\Requests\ClienteRequest;

class ParceiroController extends Controller
{


    /**
     * @var ParceiroRepository
     */
    private $repository;

    public function __construct(ParceiroRepository $repository)
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
        //$parceiros = $this->repository->all();

        return view("admin.parceiros.index", compact("parceiros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.parceiros.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $file = $request->file('imagem');

        $data = [
            "nome" => $request->input("nome"),
            "site" => $request->input("site"),
            "imagem" => $file
        ];

        $this->repository->create($data);

        Storage::disk("public_local")->put("cli".$file, File::get($file));

        return redirect()->route("admin.parceiros.index");
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
        $parceiros = $this->repository->find($id);

        return view("admin.parceiros.edit", compact("parceiros"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $imagem = $this->repository->visible(["imagem"])->find($id);

        //dd(public_path()."/uploads/cli" . $imagem->imagem);

        if(file_exists(public_path()."/uploads/cli" . $imagem->imagem))
        {
            unlink(public_path()."/uploads/cli" . $imagem->imagem);
        }

        $file = $request->file('imagem');

        $data = [
            "nome" => $request->input("nome"),
            "site" => $request->input("site"),
            "imagem" => $file
        ];

        $this->repository->update($data, $id);

        Storage::disk("public_local")->put("cli".$file, File::get($file));

        return redirect()->route("admin.parceiros.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagem = $this->repository->visible(["imagem"])->find($id);

        if(file_exists(public_path()."/uploads/cli" . $imagem->imagem))
        {
            unlink(public_path()."/uploads/cli" . $imagem->imagem);
            $this->repository->delete($id);
        }

        return redirect()->route("admin.parceiros.index");
    }
}
