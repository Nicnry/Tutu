<?php

namespace Tutunium\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
	 * @return array|JsonResponse|View
	 */
	public function index(): array|JsonResponse|View
	{
		$models = $this->service->instantiateModel($this->repository->getModel())::all();
		$repository = $this->repository;
		
		return compact('models', 'repository');
	}

	/**
	 *
	 * @param  Request $request
	 * @return array|JsonResponse|RedirectResponse
	 */
	public function store(Request $request): array|JsonResponse|RedirectResponse
	{
		$repository = $this->repository;
		$model = $this->service->instantiateModel($repository->getModel());
		$validate = $this->service->requestValidation($request);
		$this->service->fillModel($model, $request->all());
		$this->service->saveModel($model);

		return compact('model', 'repository');
	}

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return array|JsonResponse|View
	 */
	public function show(Request $request, string ...$ids): array|JsonResponse|View
	{
		$model = $this->service
					->instantiateModel($this->repository->getModel())
					->find($ids[0]);
		$repository = $this->repository;

		return compact('model', 'repository');
    }

	/**
	 *
	 * @param  Request  $request
	 * @param  string  $ids
	 * @return array|JsonResponse|RedirectResponse
	 */
	public function update(Request $request, string ...$ids): array|JsonResponse|RedirectResponse
	{
		$repository = $this->repository;
		$model = $this->service
					->instantiateModel($this->repository->getModel())
					->find($ids[0]);
		$validate = $this->service->requestValidation($request);
		$this->service->fillModel($model, $request->all());
		if ($model->isDirty()) {
			$this->service->saveModel($model);
		}

		return compact('model', 'repository');
	}

	/**
	 *
	 * @param  string  $ids
	 * @return array|JsonResponse|RedirectResponse
	 */
	public function destroy(string ...$ids): array|JsonResponse|RedirectResponse
	{
		$repository = $this->repository;
		$model = $this->service
			->instantiateModel($repository->getModel())
			->find($ids[0]);

		$this->service->deleteModel($model);

		return compact('model', 'repository');
	}

}
