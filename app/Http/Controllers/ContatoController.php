<?php

namespace Admin\Http\Controllers;

use Admin\Repositories\ContatoRepository;
use Admin\Repositories\DetalhesContatoRepository;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

use Admin\Http\Requests;
use Admin\Http\Controllers\Controller;

class ContatoController extends Controller
{
    /**
     * @var ContatoRepository
     */
    private $repository;
    /**
     * @var DetalhesContatoRepository
     */
    private $detalhesContatoRepository;

    public function __construct(ContatoRepository $repository, DetalhesContatoRepository $detalhesContatoRepository)
    {
        $this->repository = $repository;
        $this->detalhesContatoRepository = $detalhesContatoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contato = $this->detalhesContatoRepository->first();

        return view('admin.contato.index', compact('contato'));
    }

    public function indexSite()
    {
        $detalhes = $this->detalhesContatoRepository->first();

        return view('site.contato.index', compact('detalhes'));
    }


    public function lista()
    {
        $lista = $this->repository->all();

//        foreach($lista as $l)
//        {
//            $date = date('Y-m-d', strtotime('+1 month', $date));
//            $l->created_at = date('d-m-Y', $date);
//        }

        return view('admin.contato.lista', compact('lista'));
    }

    public function date($data)
    {
        $dt = new DateTime($data); // <== instance from another API

        $carbon = Carbon::instance($dt);

        return $carbon->toDateTimeString();                      // 2008-01-01 00:00:00
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('site.contato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateDetalhes(Request $request, $id)
    {
        $this->detalhesContatoRepository->update($request->all(), $id);

        return redirect()->route('admin.contato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
