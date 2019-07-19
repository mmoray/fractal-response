<?php

namespace MJM\FractalResponse\Configuration;

class Constants {

    const COLLECTION_SERIALIZER = 'collection-serializer';
    const COLLECTION_SERIALIZER_REFERENCE = self::FRACTAL_RESPONSE . '.' . self::COLLECTION_SERIALIZER;
    const FRACTAL_RESPONSE = 'fractal-response';
    const ITEM_SERIALIZER = 'item-serializer';
    const ITEM_SERIALIZER_REFERENCE = self::FRACTAL_RESPONSE . '.' . self::ITEM_SERIALIZER;
    const PAGINATE_SERIALIZER = 'paginate-serializer';
    const PAGINATE_SERIALIZER_REFERENCE = self::FRACTAL_RESPONSE . '.' . self::PAGINATE_SERIALIZER;

}