<?php

declare(strict_types=1);

namespace Modules\Geo\Transformers;

/*
<<<<<<< HEAD
 *  GEOJSON e' uno standard
 * https://it.wikipedia.org/wiki/GeoJSON
 */
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *  GEOJSON e' uno standard
 * https://it.wikipedia.org/wiki/GeoJSON
 */
=======
*  GEOJSON e' uno standard
* https://it.wikipedia.org/wiki/GeoJSON
*/
>>>>>>> a12f125f4a (.)
=======
 *  GEOJSON e' uno standard
 * https://it.wikipedia.org/wiki/GeoJSON
 */
>>>>>>> b93ef594b4 (.)
=======
*  GEOJSON e' uno standard
* https://it.wikipedia.org/wiki/GeoJSON
*/
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class GeoJsonCollection.
 */
class GeoJsonCollection extends ResourceCollection
{
    /**
     * Undocumented variable.
     *
     * @var string
     */
    public $collects = GeoJsonResource::class;

    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'FeatureCollection',
            'features' => $this->collection,
            /*'links' => [
<<<<<<< HEAD
             * 'self' => 'link-value',
             * ],*/
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
             * 'self' => 'link-value',
             * ],*/
=======
                'self' => 'link-value',
            ],*/
>>>>>>> a12f125f4a (.)
=======
             * 'self' => 'link-value',
             * ],*/
>>>>>>> b93ef594b4 (.)
=======
                'self' => 'link-value',
            ],*/
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
        ];
    }
}
