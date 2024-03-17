<?php

namespace Tutunium\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Tutunium\App\Repositories\Repository;
use Tutunium\App\Services\Service;

class CrudController extends Controller
{

	protected $repository;
	protected $service;
	/**
     * @param Repository $repository
     * @param Service $service
	 * @return void
	 */
	public function __construct(Repository $repository, Service $service)
	{
		$this->repository = $repository;
		$this->service = $service;
	}

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return View
	 */
	public function index(Request $request, ...$ids): View
	{
		return view('tutunium::index');
	}

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return View
	 */
	public function create(Request $request, ...$ids): View
	{
		return view('tutunium::create');
    }

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return RedirectResponse
	 */
	public function store(Request $request, ...$ids): RedirectResponse
	{
		$model = $this->service->instantiateModel($this->repository->getModel());
		$validate = $this->service->requestValidation($request);
		$this->service->fillModel($model, $request->all());
		$this->service->saveModel($model);
		
        return redirect()->route($this->repository->getViewIndex())->with('success', 'Utilisateur créé avec succès !');
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function show(Request $request, ...$ids)
	{
        dd($request, $ids);
    }

	/**
	 *
	 * @param  Request  $request
	 * @param  mixed  $ids
	 * @return 
	 */
	public function edit(Request $request, ...$ids)
	{
        dd($request, $ids);
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function update(Request $request, ...$ids)
	{
        dd($request, $ids);
	}

	/**
	 *
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function destroy(...$ids)
	{
        dd($ids);
	}

}
