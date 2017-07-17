<?php

namespace App\Util;

class ModelUtil
{
    public static function fromStd ($class, $data, $passedFillable)
    {
        $model = new $class();

        $fillable = $model->getFillable();
        $model->fillable($passedFillable);
        $model->fill((array) $data);
        $model->syncOriginal();
        $model->exists = true;
        $model->fillable($fillable);

        return $model;
    }
}