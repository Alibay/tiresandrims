<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailModelController extends Controller
{

    public function apiFindByDetailIds (Request $request)
    {
        $type = $request->input('type');

        $ids = $request->input('ids', []);
        if (empty($ids))
            return [];

        $ids = explode(',', $ids);

        $models =  DB::table('car_detail_models')
            ->join('shop_products', 'car_detail_models.id', '=', 'shop_products.detail_model_id')
            ->select('car_detail_models.*')
            ->whereIn('shop_products.detail_id', $ids)
            ->where('car_detail_models.type', $type)
            ->get();

        $brandId = array_unique(array_map(function ( $model ) {
            return $model->detail_brand_id;
        }, $models->toArray()));

        $brands = DetailBrand::whereIn('id', $brandId)->get();

        $brandsMap = [];
        foreach ($models as $model) {
            $brandsMap[$model->detail_brand_id][] = $model;
        }

        $result = [];
        foreach ($brands as $brand) {
            $arrBrand = $brand->toArray();
            $arrBrand['models'] = $brandsMap[$brand->id];
            $result[] = $arrBrand;
        }

        return $result;
    }
}