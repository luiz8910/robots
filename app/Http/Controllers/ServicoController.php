<?php

namespace admin\Http\Controllers;

use admin\Repositories\ServicoRepository;
use Illuminate\Http\Request;

use admin\Http\Requests;
use admin\Http\Requests\ServicoRequest;

class ServicoController extends Controller
{
    /**
     * @var ServicoRepository
     */
    private $servicoRepository;

    public function __construct(ServicoRepository $servicoRepository)
    {
        $this->servicoRepository = $servicoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$servico = $this->servicoRepository->all();

        //return view("admin.servicos.index", compact("servico"));

        return view('admin.servicos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.servicos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicoRequest $request)
    {
        $data = $request->all();

        $this->servicoRepository->create($data);

        return redirect()->route("admin.servicos.index");
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
        $servico = $this->servicoRepository->find($id);

        return view("admin.servicos.edit", compact("servico"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicoRequest $request, $id)
    {
        $data = $request->all();

        $this->servicoRepository->update($data, $id);

        return redirect()->route("admin.servicos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->servicoRepository->find($id)->delete();

        return redirect()->route("admin.servicos.index");
    }
}
