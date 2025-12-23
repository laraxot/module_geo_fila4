{nome-progetto}

## Overview

Questo progetto utilizza **Pest PHP** come framework di testing principale per garantire una copertura completa del codice e la qualità del software.

## Struttura Test

### Directory Structure
```
laravel/
├── tests/                          # Test globali
│   ├── Feature/
│   ├── Unit/
│   └── Browser/
├── Modules/
│   ├── Chart/tests/
│   │   ├── Unit/
│   │   ├── Feature/
│   │   ├── Pest.php
│   │   └── TestCase.php
{nome-progetto}
│   ├── User/tests/
│   └── Geo/tests/
└── scripts/run-tests.sh            # Script per esecuzione test
```

### Moduli Testati

#### ✅ Chart Module
- **Unit Tests**: ChartModelTest.php
- **Feature Tests**: ChartFactoryTest.php, ChartIntegrationTest.php
- **Coverage**: Modello Chart, Factory, Accessors, Metodi business logic

{nome-progetto}
- **Unit Tests**: PatientModelTest.php, AppointmentModelTest.php
- **Feature Tests**: AppointmentIntegrationTest.php
- **Coverage**: Modelli core, Relazioni, Enums, State management

{nome-progetto}
```php
createAppointment($attributes = [])
createPatient($attributes = [])
createDoctor($attributes = [])
```

### User Module
```php
createUser($attributes = [])
createTeam($attributes = [])
createProfile($attributes = [])
```

### Geo Module
```php
createCountry($attributes = [])
createRegion($attributes = [])
createCity($attributes = [])
```

## Custom Expectations

```php
expect($chart)->toBeChart()
expect($user)->toBeUser()
expect($address)->toBeCountry()
// ... e altri
```

## CI/CD Integration

### GitHub Actions
Il workflow `.github/workflows/tests.yml` esegue:
- Test su PHP 8.2 e 8.3
- PHPStan analysis level 9
- Test completi con coverage
- Upload coverage a Codecov

### Requisiti CI
- MySQL 8.0 service
- PHP extensions: dom, curl, libxml, mbstring, zip, pcntl, pdo, sqlite, bcmath, soap, intl, gd, exif, iconv
- Xdebug per coverage

## Best Practices

### Naming Conventions
- Test files: `*Test.php`
- Test methods: `it('should do something', function() {})`
- Describe blocks: `describe('Model Name', function() {})`

### Test Structure
```php
describe('Model Name', function () {
    it('can be created with factory', function () {
        $model = createModel();
        
        expect($model)->toBeInstanceOf(Model::class)
            ->and($model->exists)->toBeTrue();
    });
    
    describe('Relationships', function () {
        // Test delle relazioni
    });
    
    describe('Business Logic', function () {
        // Test della logica di business
    });
});
```

### Coverage Goals
- **Minimum**: 70% overall coverage
- **Target**: 85% overall coverage
- **Critical paths**: 95% coverage
- **Models**: 90% coverage
- **Controllers**: 80% coverage

## Troubleshooting

### Common Issues
1. **Memory Limit**: Aumentare memory_limit in php.ini
2. **Database**: Verificare configurazione database testing
3. **Permissions**: Controllare permessi directory storage/

### Debug Tests
```bash
# Verbose output
vendor/bin/pest --verbose

# Stop on first failure
vendor/bin/pest --stop-on-failure

# Debug specifico test
vendor/bin/pest --filter="test_name" --verbose
```

## Metriche Attuali

### Moduli Completati
- ✅ Chart: Unit + Feature tests
{nome-progetto}
- ✅ User: Authentication + Authorization
- ✅ Geo: Address + Geolocation

### Coverage Target
- **Current**: ~75% (stimato)
- **Target**: 85%
- **Critical**: 95% per core business logic

## Prossimi Passi

1. **Espandere test esistenti**
   - Aggiungere edge cases
   - Test di performance
   - Test di sicurezza

2. **Nuovi moduli**
   - Cms module
   - Notify module
   - Altri moduli custom

3. **Integration tests**
   - API endpoints
   - Filament resources
   - Workflow completi

4. **Browser tests**
   - Laravel Dusk
   - E2E testing
   - UI testing

---

**Ultimo aggiornamento**: 18 Agosto 2025  
**Versione Pest**: 3.8  
**Versione PHPUnit**: 11.x