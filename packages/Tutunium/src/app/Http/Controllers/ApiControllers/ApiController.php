<?php

namespace Tutunium\App\Http\Controllers\ApiControllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tutunium\App\Http\Controllers\CrudController;
use Tutunium\App\Repositories\ApiRepositories\ApiRepository;
use Tutunium\App\Services\ApiServices\ApiService;

class ApiController extends CrudController
{

	protected $repository;

	protected $service;

	/**
     * @param ApiRepository $repository
     * @param ApiService $service
	 */
	public function __construct(ApiRepository $repository, ApiService $service)
	{
		$this->repository = $repository;
		$this->service = $service;
	}

	/**
	 *
	 * @return JsonResponse
	 */
	public function index(): JsonResponse
	{
		$parent = parent::index();

		$models = $parent['models'];

		return response()->json($models);
	}

	/**
	 *
	 * @param  Request $request
	 * @return JsonResponse
	 */
	public function store(Request $request): JsonResponse
	{
        $parent = parent::store($request);

		$repository = $parent['repository'];
		$model = $parent['model'];

		return response()->json($model, 201);
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return JsonResponse
	 */
	public function show(Request $request, ...$ids): JsonResponse
	{
        $parent = parent::show($request, ...$ids);

		$repository = $parent['repository'];
		$model = $parent['model'];

		return response()->json($model);
    }

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return JsonResponse
	 */
	public function update(Request $request, string ...$ids): JsonResponse
	{
        $parent = parent::update($request, ...$ids);

		$repository = $parent['repository'];
		$model = $parent['model'];

		return response()->json($model);
	}

	/**
	 *
	 * @param  string  $ids
	 * @return JsonResponse
	 */
	public function destroy(string ...$ids): JsonResponse
	{
        $parent = parent::destroy(...$ids);

		$repository = $parent['repository'];
		$model = $parent['model'];

		return response()->json(null, 204);

	}

}

