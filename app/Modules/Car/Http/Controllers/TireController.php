<?php

namespace App\Modules\Car\Http\Controllers;

use App\Modules\Car\Models\Brand;
use App\Modules\Car\Models\Equipment;
use App\Modules\Car\Models\Generation;
use App\Modules\Car\Models\Model;
use App\Modules\Car\Models\Modification;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class TireController extends Controller
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
            'models' => new Collection(),
            'selectedModel' => 0,
            'generations' => new Collection(),
            'selectedGeneration' => 0,
            'modifications' => new Collection(),
            'selectedModification' => 0,
            'equipments' => new Collection(),
        ];

        if ($brandName != null) {
            foreach ($brands as $brand) {
                if (strtolower($brand->name) == strtolower($brandName)) {
                    $params['selectedBrand'] = $brand->id;
                }
            }
        }

        if ($params['selectedBrand']) {
            $params['models'] = Model::where('brand_id', $params['selectedBrand'])->get();

            if ($modelName != null) {
                foreach ($params['models'] as $model) {
                    if (strtolower($model->name) == strtolower($modelName)) {
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
                    if (strtolower($modification->name) == strtolower($modificationName)) {
                        $params['selectedModification'] = $modification->id;
                    }
                }
            }
        }

        if ($params['selectedModification']) {
            $params['equipments'] = Equipment::with(['rim', 'tire'])
                ->where('modification_id', $params['selectedModification'])
                ->get();
        }

        return view('car.tire.searchByCar', $params);
    }

    public function searchByParams()
    {
        $brands = Brand::all();

        return view('car.rim.searchByParams', [
            'brands' => $brands
        ]);
    }
}
