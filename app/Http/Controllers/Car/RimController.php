<?php

namespace App\Http\Controllers\Car;

use App\Car\Brand;
use App\Car\Generation;
use App\Car\Model;
use App\Car\Modification;
use App\Http\Controllers\Controller;

class RimController extends Controller
{

    public function searchByCar(
        $brandName = null,
        $modelName = null,
        $generationName = null,
        $modificationName = null )
    {
        $brands = Brand::all();

        $params = [
            'brands' => $brands,
            'selectedBrand' => 0,
            'models' => [],
            'selectedModel' => 0,
            'generations' => [],
            'selectedGeneration' => 0,
            'modifications' => [],
            'selectedModification' => 0,
        ];

        if ($brandName != null) {
            foreach ($brands as $brand) {
                if (strtolower($brand->name) == $brandName) {
                    $params['selectedBrand'] = $brand->id;
                }
            }
        }

        if ($params['selectedBrand']) {
            $params['models'] = Model::where('brand_id', $params['selectedBrand'])->get();

            if ($modelName != null) {
                foreach ($params['models'] as $model) {
                    if (strtolower($model->name) == $modelName) {
                        $params['selectedModel'] = $model->id;
                    }
                }
            }
        }

        if ($params['selectedModel']) {
            $params['generations'] = Generation::where('model_id', $params['selectedModel'])->get();

            if ($generationName != null) {
                list($yearFrom, $yearTo) = explode('-', $generationName);
                if ($yearFrom == 'present')
                    $yearFrom = 0;

                if ($yearTo == 'present')
                    $yearTo = 0;

                foreach ($params['generations'] as $generation) {
                    if ($generation->year_from == $yearFrom && $generation->year_to == $yearTo) {
                        $params['selectedGeneration'] = $generation->id;
                    }
                }
            }
        }

        if ($params['selectedGeneration']) {
            $params['modifications'] = Modification::where('generation_id', $params['selectedGeneration'])->get();

            if ($modificationName != null) {
                foreach ($params['modifications'] as $modification) {
                    if (strtolower($modification->name) == $modificationName) {
                        $params['selectedModification'] = $modification->id;
                    }
                }
            }
        }

        return view('car.rim.searchByCar', $params);
    }

    public function searchByParams()
    {
        $brands = Brand::all();

        return view('car.rim.searchByParams', [
            'brands' => $brands
        ]);
    }
}
