<?php

namespace admin\Http\Controllers;


use admin\Repositories\ClienteRepository;
use Illuminate\Http\Request;

use admin\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use admin\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    /**
     * @var ClienteRepository
     */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->clienteRepository->all();

        return view("admin.clientes.index", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.clientes.create");
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

        $this->clienteRepository->create($data);

        Storage::disk("public_local")->put("cli".$file, File::get($file));

        return redirect()->route("admin.clientes.index");
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
        $clientes = $this->clienteRepository->find($id);

        return view("admin.clientes.edit", compact("clientes"));
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
        $imagem = $this->clienteRepository->visible(["imagem"])->find($id);

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

        $this->clienteRepository->update($data, $id);

        Storage::disk("public_local")->put("cli".$file, File::get($file));

        return redirect()->route("admin.clientes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagem = $this->clienteRepository->visible(["imagem"])->find($id);

        if(file_exists(public_path()."/uploads/cli" . $imagem->imagem))
        {
            unlink(public_path()."/uploads/cli" . $imagem->imagem);
            $this->clienteRepository->delete($id);
        }

        return redirect()->route("admin.clientes.index");
    }
}
