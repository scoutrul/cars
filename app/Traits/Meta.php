<?php


namespace App\Traits;


use App\MetaTag;

trait Meta {


    /**
     *
     * Get meta tags by existing parameters
     *
     * @param $spec
     * @param $type
     * @param $make
     * @param $model
     */
    public function composeMeta($spec = null, $type = null, $make = null, $model = null)
    {
        $meta = MetaTag::whereNotNull('description');

        if(!is_null($spec)){
            $meta->where('spec_id', $spec->id);
        }else{
            $meta->whereNull('spec_id');
        }

        if(!is_null($type)){
            $meta->where('type_id', $type->id);
        }else{
            $meta->whereNull('type_id');
        }

        if(!is_null($make)){
            $meta->where('make_id', $make->id);
        }else{
            $meta->whereNull('make_id');
        }

        if(!is_null($model)){
            $meta->where('model_id', $model->id);
        }else{
            $meta->whereNull('model_id');
        }

        $meta = $meta->first();

        view()->share('meta_tag_description', $meta);
    }

}