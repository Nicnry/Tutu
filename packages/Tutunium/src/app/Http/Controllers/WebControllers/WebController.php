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
		$index = parent::index();
		return $index;
	}

	/**
	 *
	 * @return View
	 */
	public function create(): View
	{
		$create = parent::create();
		return $create;
    }

	/**
	 *
	 * @param  Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse
	{
        $store = parent::store($request);
		return $store;
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return View
	 */
	public function show(Request $request, ...$ids): View
	{
        $show = parent::show($request, ...$ids);
		return $show;
    }

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return View
	 */
	public function edit(Request $request, string ...$ids): View
	{
        $edit = parent::edit($request, ...$ids);
		return $edit;
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return RedirectResponse
	 */
	public function update(Request $request, string ...$ids): RedirectResponse
	{
        $update = parent::update($request, ...$ids);
		return $update;
	}

	/**
	 *
	 * @param  string  $ids
	 * @return RedirectResponse
	 */
	public function destroy(string ...$ids): RedirectResponse
	{
        $destroy = parent::destroy(...$ids);
		return $destroy;
	}

}
