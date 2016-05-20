<?php

namespace Admin\Http\Controllers;

use Admin\Models\Cliente;
use Admin\Models\ClienteImagem;
use Admin\Repositories\ClienteRepository;
use Illuminate\Http\Request;

use Admin\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * @var ClienteRepository
     */
    private $clienteRepository;
    /**
     * @var ClienteImagem
     */
    private $clienteImagem;

    public function __construct(ClienteRepository $clienteRepository, ClienteImagem $clienteImagem)
    {
        $this->clienteRepository = $clienteRepository;
        $this->clienteImagem = $clienteImagem;
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
    public function store(Request $request)
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
