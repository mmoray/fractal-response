<?php

use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

class FractalResponseServiceProvider extends ServiceProvider {

    public function register()
    {
        $manager = new Manager;
        response()->macro('item', function($item, TransformerAbstract $transformer, int $status = 200, array $headers = []) use ($manager) {
            if (request()->include) {
                $manager->parse(request()->include);
            }
            if (request()->exclude) {
                $manager->parse(request()->exclude);
            }
            $resource = new Item($item, $transformer);
            return response()->json($manager->createData($resource)->toArray(), $status, $headers);
        });
    }
}