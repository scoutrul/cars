<?php namespace App\Http\Controllers;

use App\Repository\CarModelRepository;
use App\Repository\CompanyRepository;
use App\Repository\MakesRepository;
use App\Repository\SpecsRepository;
use App\Repository\TypeRepository;
use App\ViewModel\CompanyCatalog;

class CatalogController extends Controller {

    /**
     * @var MakesRepository
     */
    protected $makesRepository;

    /**
     * @var SpecsRepository
     */
    protected $specsRepository;

    /**
     * @var CompanyRepository
     */
    protected $companyRepository;

    /**
     * @var CarModelRepository
     */
    protected $carModelRepository;

    /**
     * @var TypeRepository
     */
    protected $typeRepository;

    public function __construct(
        MakesRepository $makesRepository, SpecsRepository $specsRepository,
        CompanyRepository $companyRepository, CarModelRepository $carModelRepository,
        TypeRepository $typeRepository)
    {
        $this->makesRepository = $makesRepository;
        $this->specsRepository = $specsRepository;
        $this->companyRepository = $companyRepository;
        $this->carModelRepository = $carModelRepository;
        $this->typeRepository = $typeRepository;
    }

	public function index() {

		return view('pages.catalog.nospecs')
			->with('makes', $this->makesRepository->getForCatalogIndex())
			->with('bread', false);

	}

	public function specs($name) {

        $spec = $this->specsRepository->getForCatalogByName($name);
		if(!$spec)
			abort(404);
		return view('pages.catalog.withspecs')
			->with('spec', $spec)
			->with('makes', $this->makesRepository->getForCatalogBySpec($spec))
            ->with('meta_title', $spec->meta_title ? $spec->meta_title : null)
            ->with('meta_description', $spec->description ? $spec->description: null)
			->with('bread', ['spec' => $spec]);

	}

	public function withspecs($spec, $type, $make) {

		$spec = $this->specsRepository->getFirstByName($spec);
        $type = $this->typeRepository->getFirstByName($type);
        if(!$type)
            abort(404);
		if(!$spec)
			abort(404);
		$make = $this->makesRepository->getFirstByName($make);
		if(!$make)
			abort(404);
		$models = $this->carModelRepository->getByMakeWithCompanies($make, $type);
		return view('pages.catalog.catalog-companies', [
            'spec' => $spec,
            'models' => $models,
            'make' => $make,
            'bread' => ['spec' => $spec, 'type' => $type, 'make' => $make],
            'type' => $type,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByMakeAndSpecType($make, $spec, $type, 6)),
            'meta_title'=> $make->meta_title ? $make->meta_title : null,
            'meta_description'=> $make->description ? $make->description : null,
        ]);
	}

    public function nospecsType($type)
    {
        $type = $this->typeRepository->getFirstByName($type);
        if(!$type)
            abort(404);
        return view('pages.catalog.nospecs')
            ->with('makes', $this->makesRepository->getForCatalogByType($type))
            ->with('no_type', true)
            ->with('bread', ['type' => $type]);
    }


    public function specsType($spec, $type)
    {
        $type = $this->typeRepository->getFirstByName($type);
        $spec = $this->specsRepository->getFirstByName($spec);
        if(!$type)
            abort(404);
        if(!$spec)
            abort(404);
        return view('pages.catalog.withspecs', [
            'makes' => $this->makesRepository->getForCatalogBySpecAndType($type, $spec),
            'no_type' => true,
            'spec' => $spec,
            'meta_title' => $spec->meta_title ? $spec->meta_title : null,
            'meta_description' => $spec->description ? $spec->description: null,
            'bread' => ['spec' => $spec, 'type' => $type]
        ]);
//            ->with('makes', $this->makesRepository->getForCatalogByType($type))
//            ->with('no_type', true)
//            ->with('bread', ['type' => $type]);
    }

	public function nospecs($type, $make)
    {

		$make = $this->makesRepository->getFirstByName($make);
        $type = $this->typeRepository->getFirstByName($type);
        if(!$type)
            abort(404);
		if(!$make)
			abort(404);
		return view('pages.catalog.catalog-companies', [
            'bread' => ['type' => $type,'nospecs' => $make],
            'make' => $make,
            'type' => $type,
            'models' => $this->carModelRepository->getByMakeWithCompanies($make, $type),
            'nospecs' => true,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByMakeAndType($make, $type, 6)),
            'meta_title'=> $make->meta_title ? $make->meta_title : null,
            'meta_description'=> $make->description ? $make->description : null,
        ]);
	}

    public function nospecsNoType($make)
    {

        $make = $this->makesRepository->getFirstByName($make);
        if(!$make)
            abort(404);
        return view('pages.catalog.catalog-companies', [
            'bread' => ['nospecs' => $make],
            'make' => $make,
            'models' => $this->carModelRepository->getByMakeWithCompanies($make),
            'nospecs' => true,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByMake($make, 6)),
            'meta_title'=> $make->meta_title ? $make->meta_title : null,
            'meta_description'=> $make->description ? $make->description : null,
        ]);
    }

    public function makeNoType($make)
    {
        $make = $this->makesRepository->getFirstByName($make);
        if(!$make)
            abort(404);
        return view('pages.catalog.catalog-companies', [
            'bread' => ['nospecs' => $make],
            'make' => $make,
            'models' => $this->carModelRepository->getByMakeWithCompanies($make),
            'nospecs' => true,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByMake($make, 6)),
            'meta_title'=> $make->meta_title ? $make->meta_title : null,
            'meta_description'=> $make->description ? $make->description : null,
        ]);
    }

	public function withspecsModel($spec, $type, $make, $model) {

		$spec = $this->specsRepository->getFirstByName($spec);
		if(!$spec)
			abort(404);
        $type = $this->typeRepository->getFirstByName($type);
        if(!$type)
            abort(404);
		$make = $this->makesRepository->getFirstByName($make);
		if(!$make)
			abort(404);
		$model = $this->carModelRepository->getFirstByNameAndMake($model, $make);
		if(!$model)
			abort(404);

		return view('pages.catalog.catalog-companies', [
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByModelAndSpecType($model, $spec, $type, 6)),
            'bread' => ['spec' => $spec, 'make' => $make, 'type' => $type, 'model' => $model],
            'spec' => $spec,
            'type' => $type,
            'make' => $make,
            'model' => $model,
            'meta_title'=> $model->meta_title ? $model->meta_title : null,
            'meta_description'=> $model->description ? $model->description : null,
        ]);
	}

    public function withspecsModelNoType($spec, $make, $model) {

        $spec = $this->specsRepository->getFirstByName($spec);
        if(!$spec)
            abort(404);
        $make = $this->makesRepository->getFirstByName($make);
        if(!$make)
            abort(404);
        $model = $this->carModelRepository->getFirstByNameAndMake($model, $make);
        if(!$model)
            abort(404);

        return view('pages.catalog.catalog-companies', [
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByModelAndSpec($model, $spec, 6)),
            'bread' => ['spec' => $spec, 'make' => $make, 'model' => $model],
            'spec' => $spec,
            'make' => $make,
            'model' => $model,
            'meta_title'=> $model->meta_title ? $model->meta_title : null,
            'meta_description'=> $model->description ? $model->description : null,
        ]);
    }

	public function nospecsModel($type, $make, $model) {

		$make = $this->makesRepository->getFirstByName($make);
		if(!$make)
			abort(404);
        $type = $this->typeRepository->getFirstByName($type);
        if(!$type)
            abort(404);
		$model = $this->carModelRepository->getFirstByNameAndMake($model, $make);
		if(!$model)
			abort(404);
		return view('pages.catalog.catalog-companies', [
            'bread' => ['nospecs' => $make, 'type' => $type, 'model' => $model],
            'make' => $make,
            'model' => $model,
            'nospec' => true,
            'type' => $type,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByModelAndType($model, $type)),
            'meta_title'=> $model->meta_title ? $model->meta_title : null,
            'meta_description'=> $model->description ? $model->description : null,
        ]);
	}

    public function nospecsModelNoType($make, $model) {

        $make = $this->makesRepository->getFirstByName($make);
        if(!$make)
            abort(404);
        $model = $this->carModelRepository->getFirstByNameAndMake($model, $make);
        if(!$model)
            abort(404);
        return view('pages.catalog.catalog-companies', [
            'bread' => ['nospecs' => $make, 'model' => $model],
            'make' => $make,
            'model' => $model,
            'nospec' => true,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByModel($model)),
            'meta_title'=> $model->meta_title ? $model->meta_title : null,
            'meta_description'=> $model->description ? $model->description : null,
        ]);
    }

}