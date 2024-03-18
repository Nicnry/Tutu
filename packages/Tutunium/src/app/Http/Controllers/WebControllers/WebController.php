<?php

namespace Tutunium\App\Http\Controllers\WebControllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Tutunium\App\Http\Controllers\CrudController;
use Tutunium\App\Repositories\WebRepositories\WebRepository;
use Tutunium\App\Services\WebServices\WebService;

class WebController extends CrudController
{

	protected $repository;
	protected $service;

	/**
     * @param WebRepository $repository
     * @param WebService $service
	 * @return void
	 */
	public function __construct(WebRepository $repository, WebService $service)
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
		$parent = parent::index();

		$models = $parent['models'];
		$repository = $parent['repository'];

		return view($repository->getViewIndex(), compact('models', 'repository'));
	}

	/**
	 *
	 * @return View
	 */
	public function create(): View
	{
		$repository = $this->repository;

		return view($repository->getViewCreate(), compact('repository'));
    }

	/**
	 *
	 * @param  Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse
	{
        $parent = parent::store($request);

		$repository = $parent['repository'];

        return redirect()->route($repository->getRouteIndex())->with('success', 'Created !');
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return View
	 */
	public function show(Request $request, ...$ids): View
	{
        $parent = parent::show($request, ...$ids);

		$repository = $parent['repository'];
		$model = $parent['model'];

		return view($repository->getViewShow(), compact('model', 'repository'));
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

		return view($repository->getViewEdit(), compact('model', 'repository'));
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return RedirectResponse
	 */
	public function update(Request $request, string ...$ids): RedirectResponse
	{
        $parent = parent::update($request, ...$ids);

		$repository = $parent['repository'];

        return redirect()->route($repository->getRouteIndex())->with('success', 'Edit successfully !');
	}

	/**
	 *
	 * @param  string  $ids
	 * @return RedirectResponse
	 */
	public function destroy(string ...$ids): RedirectResponse
	{
        $parent = parent::destroy(...$ids);

		$repository = $parent['repository'];

        return redirect()->route($repository->getRouteIndex())->with('success', 'Deleted successfully !');
	}

}
