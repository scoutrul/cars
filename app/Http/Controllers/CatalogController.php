<?php namespace App\Http\Controllers;

use App\Repository\CarModelRepository;
use App\Repository\CompanyRepository;
use App\Repository\MakesRepository;
use App\Repository\SpecsRepository;
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

    public function __construct(MakesRepository $makesRepository, SpecsRepository $specsRepository, CompanyRepository $companyRepository, CarModelRepository $carModelRepository)
    {
        $this->makesRepository = $makesRepository;
        $this->specsRepository = $specsRepository;
        $this->companyRepository = $companyRepository;
        $this->carModelRepository = $carModelRepository;
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
			->with('bread', ['spec' => $spec]);

	}

	public function withspecs($spec, $make) {

		$spec = $this->specsRepository->getFirstByName($spec);
		if(!$spec)
			abort(404);
		$make = $this->makesRepository->getFirstByName($make);
		if(!$make)
			abort(404);
		$models = $this->carModelRepository->getByMakeWithCompanies($make);
		return view('pages.catalog.catalog-companies', [
            'spec' => $spec,
            'models' => $models,
            'make' => $make,
            'bread' => ['spec' => $spec, 'make' => $make],
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByMakeAndSpec($make, $spec, 6)),
        ]);
	}

	public function nospecs($make) {

		$make = $this->makesRepository->getFirstByName($make);
		if(!$make)
			abort(404);
		return view('pages.catalog.catalog-companies', [
            'bread' => ['nospecs' => $make],
            'make' => $make,
            'models' => $this->carModelRepository->getByMakeWithCompanies($make),
            'nospecs' => true,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByMake($make, 6)),
        ]);
	}

	public function withspecsModel($spec, $make, $model) {

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
            'bread' => ['spec' => $spec, 'make' => $make],
            'spec' => $spec,
            'make' => $make,
        ]);
	}

	public function nospecsModel($make, $model) {

		$make = $this->makesRepository->getFirstByName($make);
		if(!$make)
			abort(404);
		$model = $this->carModelRepository->getFirstByNameAndMake($model, $make);
		if(!$model)
			abort(404);
		return view('pages.catalog.catalog-companies', [
            'bread' => ['nospecs' => $make],
            'make' => $make,
            'nospec' => true,
            'companies' => CompanyCatalog::present($this->companyRepository->getActiveByModel($model)),
        ]);
	}

}