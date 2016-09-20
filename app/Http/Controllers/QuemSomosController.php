<?php

namespace admin\Http\Controllers;

use admin\Repositories\QuemSomosRepository;
use Illuminate\Http\Request;

use admin\Http\Requests;
use admin\Http\Controllers\Controller;

use admin\Http\Requests\QuemSomosRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class QuemSomosController extends Controller
{
    /**
     * @var quemSomosRepository
     */
    private $quemSomosRepository;

    public function __construct(QuemSomosRepository $quemSomosRepository)
    {
        $this->quemSomosRepository = $quemSomosRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quemSomos = $this->quemSomosRepository->first();

        return view("admin.quem-somos.index", compact("quemSomos"));
    }

    public function indexSite()
    {
        $quemSomos = $this->quemSomosRepository->first();

        return view("site.quem-somos", compact("quemSomos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.quem-somos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuemSomosRequest $request)
    {
        $file = $request->file('imagem');

        $data = [
            "imagem" => $file
        ];

        $this->quemSomosRepository->create($data);

        Storage::disk("public_local")->put("quem-somos".$file, File::get($file));

        return redirect()->route("admin.quem-somos.index");
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
        $quemSomos = $this->quemSomosRepository->find($id);

        return view("admin.quem-somos.edit", compact("quemSomos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $form)
    {
        $vetor = explode(',', $form);


         DB::table('quemsomos')
             ->where('id', $id)
            ->update(
                [
                    'description' => $vetor[0],
                    'whyUs' => $vetor[1],
                    'ourValues' => $vetor[2],
                    'vision' => $vetor[3],
                ]
            );

        return 'true';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagem = $this->quemSomosRepository->visible(["imagem"])->find($id);

        if(file_exists(public_path()."/uploads/quem-somos" . $imagem->imagem))
        {
            unlink(public_path()."/uploads/quem-somos" . $imagem->imagem);
            $this->quemSomosRepository->delete($id);
        }

        return redirect()->route("admin.quem-somos.index");
    }
}
