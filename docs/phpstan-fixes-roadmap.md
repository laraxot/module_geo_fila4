# PHPStan Fixes Roadmap - Geo Module

This document outlines the plan to fix the PHPStan errors found in the Geo module.

## Files with Errors

*   **app/Actions/Bing/GetAddressFromBingMapsAction.php**
    *   Error: `Method Modules\Geo\Actions\Bing\GetAddressFromBingMapsAction::extractLocationFromResponse() should return array<string, mixed> but returns array.`
*   **app/Datas/UpdateCoordinatesResult.php**
    *   Error: `Method Modules\Geo\Datas\UpdateCoordinatesResult::getErrorMessages() should return array<int, string> but returns array.`
*   **app/Models/ComuneJson.php**
    *   Error: `Method Modules\Geo\Models\ComuneJson::byRegion() should return Illuminate\Support\Collection<int, array{nome: string, codice: string, regione: array{codice: string, nome: string}, provincia: array{codice: string, nome: string}, cap: array<int, string>, codiceCatastale: string, popolazione: int}> but returns mixed.`
    *   Error: `Method Modules\Geo\Models\ComuneJson::byProvince() should return Illuminate\Support\Collection<int, array{nome: string, codice: string, regione: array{codice: string, nome: string}, provincia: array{codice: string, nome: string}, cap: array<int, string>, codiceCatastale: string, popolazione: int}> but returns mixed.`
    *   Error: `Method Modules\Geo\Models\ComuneJson::searchByName() should return Illuminate\Support\Collection<int, array{nome: string, codice: string, regione: array{codice: string, nome: string}, provincia: array{codice: string, nome: string}, cap: array<int, string>, codiceCatastale: string, popolazione: int}> but returns mixed.`
    *   Error: `Method Modules\Geo\Models\ComuneJson::getGerarchia() should return array{regione: array{codice: string, nome: string}|null, provincia: array{codice: string, nome: string}|null, comune: array{nome: string, codice: string|null, codiceCatastale: string|null, popolazione: int|null}, cap: array<int, string>}|null but returns mixed.`
*   **app/Services/GeoDataService.php**
    *   Error: `Method Modules\Geo\Services\GeoDataService::getRegions() should return Illuminate\Support\Collection<int, array{name: string, code: string}> but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::getProvinces() should return Illuminate\Support\Collection<int, array{name: string, code: string}> but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::getCities() should return Illuminate\Support\Collection<int, array{name: string, code: string}> but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::getCap() should return string|null but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::loadData() should return Illuminate\Support\Collection<int, array<string, mixed>> but returns Illuminate\Support\Collection<(int|string), mixed>.`
*   **app/Services/GeoDataValidator.php**
    *   Error: `Method Modules\Geo\Services\GeoDataValidator::getErrors() should return array<string, array<int, string>> but returns array.`
