# Geo Module - Filament v4 Upgrade Notes

This document outlines specific considerations and changes for the `Geo` module during the Filament v4 upgrade. For a comprehensive overview of the Filament v4 upgrade process, refer to the main project documentation: [`docs/Filament_Upgrade_v4.md`](../../docs/Filament_Upgrade_v4.md).

## **Key Changes and Action Items for `Geo` Module**

### **1. `AddressSection` Component (`Modules\Geo\Filament\Forms\Components\AddressSection.php`)**

*   **Issue:** In Filament v3, `Section` components (which `AddressSection` extends) would span the full width of their parent grid by default. In Filament v4, this is no longer the default behavior; they now only consume one column.
*   **Action Required:** Review all instances where `AddressSection` is used. If the component is expected to span the full width, ensure the `->columnSpanFull()` method is explicitly called on the `AddressSection` instance.
    ```php
    use Modules\Geo\Filament\Forms\Components\AddressSection;

    // ... in your form schema
    AddressSection::make()
        // ... other configurations
        ->columnSpanFull(),
    ```
    Alternatively, if the old behavior is desired globally for all `Section` components, this can be configured in a service provider (e.g., `AppServiceProvider`):
    ```php
    use Filament\Schemas\Components\Section;

    Section::configureUsing(fn (Section $section) => $section->columnSpanFull());
    ```

### **2. `AddressItemEnum::getFormSchema()` PHPStan Fix (`Modules\Geo\Enums\AddressItemEnum.php`)**

*   **Problem Addressed:** PHPStan previously reported a type mismatch: `Method Modules\Geo\Filament\Forms\Components\AddressSection::getFormSchema() should return array<string, Filament\Schemas\Components\Component> but returns list<mixed>.`
*   **Resolution:** The `AddressItemEnum::getFormSchema()` method was updated to return an associative array (`array<string, TextInput>`) where keys correspond to the field names (`$item->value`), aligning with Filament's expectation for form schemas. This resolves the type error and provides a more robust schema definition.

### **3. Custom Component `make()` Method Overrides**

*   **Issue:** Filament v4 recommends refactoring custom components that override the static `make()` method.
    *   If `make()` was overridden to provide a default name, it's now recommended to override `getDefaultName()` instead.
    *   If `make()` was overridden to provide default configuration (i.e., immediately after instantiation), it's now recommended to override the `setUp()` method instead.
*   **Action Required:** Review `AddressSection.php` (and any other custom `Geo` module components) for `make()` method overrides. If found, refactor them to use `getDefaultName()` or `setUp()` as appropriate to maintain compatibility and reduce future maintenance burden.

---
**DRY (Don't Repeat Yourself) / KISS (Keep It Simple, Stupid) Principles:**

*   **Centralized Enums:** The `AddressItemEnum` exemplifies DRY by centralizing address field definitions and their form schema generation. This ensures consistency across the application wherever address fields are used.
*   **Reusable Components:** `AddressSection` itself promotes reusability. Adhering to Filament v4's component API ensures this reusability remains robust.
*   **Global Configuration:** Utilizing `configureUsing()` in `AppServiceProvider` for global component behavior (e.g., `columnSpanFull()`) helps keep configuration DRY and easy to manage from a single location.

By adhering to these principles, the `Geo` module remains maintainable and aligned with the project's architectural standards.
