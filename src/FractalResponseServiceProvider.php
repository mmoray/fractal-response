<?php

namespace MJM\FractalResponse;

use Illuminate\Support\ServiceProvider;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use MJM\FractalResponse\Configuration\Constants;
use MJM\FractalResponse\Wrappers\Manager;

class FractalResponseServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Configuration/fractal-response.php' => config_path('fractal-response.php')
        ]);
    }

    public function register()
    {
        $manager = new Manager;
        $manager->parseRequest();
        response()->macro('item', function($item, TransformerAbstract $transformer, int $status = 200, array $headers = []) use ($manager) {
            $manager->serializer(Constants::ITEM_SERIALIZER_REFERENCE);
            $resource = new Item($item, $transformer);
            return response()->json($manager->createData($resource)->toArray(), $status, $headers);
        });
        response()->macro('collection', function($collection, TransformerAbstract $transformer, int $status = 200, array $headers = []) use ($manager) {
            $manager->serializer(Constants::COLLECTION_SERIALIZER_REFERENCE);
            $resource = new Collection($collection, $transformer);
            return response()->json($manager->createData($resource)->toArray(), $status, $headers);
        });
        response()->macro('paginateCollection', function($collection, TransformerAbstract $transformer, String $include = null, String $exclude = null, Int $status = 200, Array $headers = []) use ($manager) {
            $manager->serializer(Constants::PAGINATE_SERIALIZER_REFERENCE);
            $resource = new Collection($collection->getCollection(), $transformer);
            $resource->setPaginator(new IlluminatePaginatorAdapter($collection));
            return response()->json($manager->createData($resource)->toArray(), $status, $headers);
        });
    }
}