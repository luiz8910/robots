<?php

namespace Admin\Http\Controllers;

use Admin\Repositories\InstitucionalRepository;
use Illuminate\Http\Request;

use Admin\Http\Requests;
use Admin\Http\Controllers\Controller;

use Admin\Http\Requests\institucionalRequest;

class institucionalController extends Controller
{

    /**
     * @var InstitucionalRepository
     */
    private $repository;

    public function __construct(InstitucionalRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $inst = $this->repository->find(1);

        return view("admin.institucional.edit", compact("inst"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(institucionalRequest $request)
    {
        $data = $request->all();

        $this->repository->update($data, 1);

        return redirect()->route("admin.institucional.edit");
    }

}
