<?php

use League\Fractal\Serializer\ArraySerializer;
use MJM\FractalResponse\Configuration\Constants;

return [
    Constants::COLLECTION_SERIALIZER => ArraySerializer::class,
    Constants::ITEM_SERIALIZER => ArraySerializer::class,
    Constants::PAGINATE_SERIALIZER => ArraySerializer::class
];