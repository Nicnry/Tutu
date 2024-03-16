<?php

namespace Tutunium\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tutunium\Repositories\Repository;

class CrudController extends Controller
{

	protected $repository;

	/**
     * @param Repository $repository
	 * @return void
	 */
	public function __construct(Repository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function index(Request $request, ...$ids)
	{
        dd($request, $ids);
	}

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function create(Request $request, ...$ids)
	{
        dd($request, $ids);
    }

	/**
	 *
	 * @param  Request $request
	 * @param  mixed  $ids
	 * @return mixed
	 */
	public function store(Request $request, ...$ids)
	{
        dd($request, $ids);
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
