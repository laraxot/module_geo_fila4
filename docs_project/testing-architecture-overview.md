{nome-progetto}

## Principi Fondamentali

### 1. **Separazione Architetturale**
- **Unit Tests**: Test di logica di business isolata, senza dipendenze esterne
- **Feature Tests**: Test di integrazione che verificano il comportamento end-to-end
- **Module Tests**: Test specifici per ogni modulo Laravel

### 2. **Approccio In-Memory per Unit Tests**
- Utilizzo di oggetti plain PHP per evitare dipendenze da database
- Test di logica di business senza toccare il codice dell'applicazione
- Validazione di regole aziendali in isolamento

### 3. **Enum-Based Validation**
- Utilizzo di enum per garantire type safety nei test
- Validazione di stati e transizioni attraverso enum
- Coerenza con l'architettura dell'applicazione

## Struttura dei Test

### Modulo Geo
```
Modules/Geo/tests/Feature/AddressIntegrationTest.php
```
- **Scopo**: Test di integrazione per gestione indirizzi
- **Approccio**: In-memory con oggetti plain PHP
- **Focus**: Relazioni polimorfiche, geolocalizzazione, Google Places API

{nome-progetto}
- **geo**: Connessione per modulo Geo

### Migrazioni
- Esecuzione automatica di migrazioni per tutti i moduli
- Rollback automatico dopo ogni test
- Isolamento completo tra test

## Helper Functions

### 1. **User Management**
```php
createUser(array $attributes = []): User
makeUser(array $attributes = []): User
createUserOfType(UserTypeEnum $type, array $attributes = []): User
```

### 2. **Module Management**
```php
moduleEnabled(string $module): bool
skipIfModuleDisabled(string $module): void
```

### 3. **Translation Testing**
```php
assertTranslationsExist(string $translationKey, array $locales = ['it', 'en', 'de']): void
```

## Esecuzione dei Test

### Comandi Principali
```bash
# Esegui tutti i test
php artisan test

# Test specifici per modulo
php artisan test --filter=Geo
{nome-modulo}

# Test specifici per file
php artisan test tests/Feature/AddressIntegrationTest.php
```

### Filtri Pest
```bash
# Test con pattern specifico
php artisan test --filter="can attach address"
php artisan test --filter="validates user types"
```

## Monitoraggio e Qualità

### 1. **Coverage Analysis**
- Test di tutti i percorsi critici
- Validazione di business logic complessa
- Test di integrazione tra moduli

### 2. **Performance Testing**
- Benchmark di operazioni critiche
- Test di scalabilità per operazioni batch
- Validazione di timeout e limiti

### 3. **Regression Testing**
- Test automatici per bugfix
- Validazione di modifiche architetturali
- Test di compatibilità all'indietro

## Collegamenti

- [Modulo Geo Testing](../../laravel/Modules/Geo/docs/testing.md)
{nome-modulo}

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 1.0
**Compatibilità**: Pest 3.x, Laravel 12.x, PHP 8.3+
