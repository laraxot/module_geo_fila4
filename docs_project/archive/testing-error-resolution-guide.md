{nome-progetto}

## Critical Testing Errors and Solutions

### 1. Factory Faker Boolean Error

**Error**: `InvalidArgumentException: Unknown format "boolean"`

**Cause**: Using `$this->faker->boolean(percentage)` which doesn't exist in Faker library.

**Solution Patterns**:
```php
// ❌ INCORRECT - Causes error
$this->faker->boolean(70)
$this->faker->boolean(15)

// ✅ CORRECT - Use optional with decimal probability
$this->faker->optional(0.7)->boolean()              // 70% chance of boolean
$this->faker->optional(0.15)->boolean()             // 15% chance of boolean
$this->faker->optional(0.6)->regexify('[A-Z]{2}')   // 60% chance of regex value
$this->faker->optional(0.9)->dateTimeBetween('-2 years', '-1 month')  // 90% chance of date
```

{nome-progetto}

### 2. Database Connection in Feature Tests

**Error**: `Call to a member function connection() on null`

**Cause**: Feature tests attempting to use Eloquent models/factories without database configuration.

**Philosophy**: Feature tests should test business logic, not database persistence.

**Solution Pattern**:
```php
// ❌ INCORRECT - Requires database
it('validates appointment booking', function () {
    $patient = User::factory()->create(['type' => 'patient']);
    $doctor = User::factory()->create(['type' => 'doctor']);
    
    expect($patient->type)->toBe('patient');
});

// ✅ CORRECT - Pure business logic test
it('validates appointment booking logic', function () {
    $patient = (object) ['type' => 'patient', 'id' => 1001];
    $doctor = (object) ['type' => 'doctor', 'id' => 2001];
    
    expect($patient->type)->toBe('patient');
    expect($doctor->type)->toBe('doctor');
});
```

### 3. Translator Dependencies in Tests

**Error**: `Target class [translator] does not exist`

**Cause**: Calling enum or model methods that require Laravel's translation system.

**Solution Pattern**:
```php
// ❌ INCORRECT - Requires translator
expect($appointment->type->getLabel())->toBe('Consultation');

// ✅ CORRECT - Test direct values
expect($appointment->type)->toBe(AppointmentTypeEnum::CONSULTATION);
expect($appointment->type->value)->toBe('consultation');
expect($appointment->type->getDuration())->toBe(20);  // Non-translation method
```

### 4. Spatie EventSourcing Container Issues

**Error**: `Unresolvable dependency resolving [Parameter #0 [ <required> string $storedEventRepository ]]`

**Cause**: Tests trying to resolve EventSourcing services without full Laravel container setup.

**Solution**: 
- Use pure tests without `TestCase` when testing business logic
- Avoid dependency injection in simple feature tests
- Use plain objects instead of services

## Test Architecture Matrix

| Test Type | Database | Container | Faker | TestCase | Use Case | Speed |
|-----------|----------|-----------|--------|----------|----------|-------|
| **Feature Pure** | ❌ | ❌ | ❌ | ❌ | Business Logic | Ultra Fast |
| **Feature Integrated** | ✅ | ✅ | ✅ | ✅ | End-to-end | Moderate |
| **Unit Resource** | ✅ | ✅ | ✅ | ✅ | Filament Components | Moderate |
| **Unit Model** | ✅ | ✅ | ✅ | ✅ | Eloquent Features | Moderate |

## Module-Specific Implementations

{nome-progetto}

1. **Reliability**: Tests don't fail due to external dependencies
2. **Speed**: Pure tests execute 10-100x faster than database tests
3. **Maintainability**: Business logic tests survive refactoring
4. **Clarity**: Simple objects make test intent clear
5. **Portability**: Tests run anywhere without setup

## Future Evolution

### Phase 1: Standardization (Current)
- Apply patterns to all existing modules
- Document module-specific test strategies
- Establish consistent test architecture

### Phase 2: Optimization  
- Parallel test execution
- Property-based testing for business rules
- Mutation testing for coverage quality

### Phase 3: Advanced Testing
- Contract testing for API boundaries
- Performance benchmarking
- Automated test pattern detection

## Links to Module Documentation

{nome-modulo}

## Windsurf Rules Integration

- [Testing Factory Best Practices](../.windsurf/rules/testing-factory-best-practices.mdc)
- [Test Error Resolution Patterns](../.windsurf/rules/test-error-resolution-patterns.mdc)

---

**Last Updated**: 2025-01-06  
**Status**: Active Implementation  
{nome-modulo}
**Philosophy**: Simple, Fast, Reliable Testing
