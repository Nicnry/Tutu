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
	 */
	public function __construct(Repository $repository, Service $service)
	{
		$this->repository = $repository;
		$this->service = $service;
	}

	/**
	 *
	 * @return View
	 */
	public function index(): View
	{
		$models = $this->service->instantiateModel($this->repository->getModel())::all();
		$repository = $this->repository;
		return view('tutunium::index', compact('models', 'repository'));
	}

	/**
	 *
	 * @return View
	 */
	public function create(): View
	{
		$repository = $this->repository;
		return view('tutunium::create', compact('repository'));
    }

	/**
	 *
	 * @param  Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse
	{
		$model = $this->service->instantiateModel($this->repository->getModel());
		$validate = $this->service->requestValidation($request);
		$this->service->fillModel($model, $request->all());
		$this->service->saveModel($model);
		
        return redirect()->route($this->repository->getRouteIndex())->with('success', 'Created !');
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return View
	 */
	public function show(Request $request, string ...$ids): View
	{
		$model = $this->service
					->instantiateModel($this->repository->getModel())
					->find($ids[0]);
		$repository = $this->repository;
		return view($this->repository->getViewShow(), compact('model', 'repository'));
    }

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return View
	 */
	public function edit(Request $request, string ...$ids): View
	{
		$model = $this->service
			->instantiateModel($this->repository->getModel())
			->find($ids[0]);
		$repository = $this->repository;

		return view($this->repository->getViewEdit(), compact('model', 'repository'));
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return RedirectResponse
	 */
	public function update(Request $request, string ...$ids): RedirectResponse
	{
		$model = $this->service
					->instantiateModel($this->repository->getModel())
					->find($ids[0]);
		//$validate = $this->service->requestValidation($request);
		$this->service->fillModel($model, $request->all());
		if ($model->isDirty()) {
			$this->service->saveModel($model);
		}
        return redirect()->route($this->repository->getRouteIndex())->with('success', 'Edit successfully !');
	}

	/**
	 *
	 * @param  string  $ids
	 * @return RedirectResponse
	 */
	public function destroy(string ...$ids): RedirectResponse
	{
		$model = $this->service
			->instantiateModel($this->repository->getModel())
			->find($ids[0]);

		$this->service->deleteModel($model);
        return redirect()->route($this->repository->getRouteIndex())->with('success', 'Deleted successfully !');
	}

}
