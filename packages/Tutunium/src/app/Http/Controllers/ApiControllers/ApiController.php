<?php

namespace Tutunium\App\Http\ApiControllers\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Tutunium\App\Http\Controllers\CrudController;
use Tutunium\App\Repositories\WebRepositories\WebRepository;
use Tutunium\App\Services\WebServices\WebService;

class ApiController extends CrudController
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
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return View
	 */
	public function index(Request $request, ...$ids): View
	{
		$index = parent::index($request, ...$ids);
		return $index;
	}

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return View
	 */
	public function create(Request $request, ...$ids): View
	{
		$create = parent::create($request, ...$ids);
		return $create;
    }

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return RedirectResponse
	 */
	public function store(Request $request, ...$ids): RedirectResponse
	{
        $store = parent::store($request, ...$ids);
		return $store;
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function show(Request $request, ...$ids)
	{
        $show = parent::show($request, ...$ids);
		return $show;
    }

	/**
	 *
	 * @param  Request  $request
	 * @param  mixed  $ids
	 * @return 
	 */
	public function edit(Request $request, ...$ids)
	{
        $edit = parent::edit($request, ...$ids);
		return $edit;
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function update(Request $request, ...$ids)
	{
        $update = parent::update($request, ...$ids);
		return $update;
	}

	/**
	 *
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function destroy(...$ids)
	{
        $destroy = parent::destroy(...$ids);
		return $destroy;
	}

}
