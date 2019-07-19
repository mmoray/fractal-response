<?php

namespace MJM\FractalResponse\Wrappers;

use League\Fractal\Manager AS FractalManager;

class Manager extends FractalManager {

    public function parseRequest()
    {
        if (request()->include) {
            $this->parse(request()->include);
        }
        if (request()->exclude) {
            $this->parse(request()->exclude);
        }
    }

    public function serializer(string $serializer)
    {
        if (config($serializer)) {
            $serializer = config($serializer);
            $this->setSerializer(new $serializer);
        }
    }
}