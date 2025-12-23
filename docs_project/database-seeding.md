{nome-progetto}

## Struttura Script

Gli script di seeding sono organizzati nella seguente struttura:

```bashscripts/
└── database/
    └── seeding/
{nome-progetto}
        ├── tinker-commands.php                # Comandi diretti per Tinker
        ├── tinker-1000-records.php            # Script Tinker per 1000 record
        └── tinker-20-studios-66010.php       # 🆕 Script Tinker per 20 studi + dottori
```

## Script Principale: 1000 Record per Modello

{nome-progetto}
- **UserFactory**: Generazione utenti (Patient, Doctor, Admin)
- **StudioFactory**: Generazione studi medici
- **AppointmentFactory**: Generazione appuntamenti

{nome-progetto}
# 📊 RISULTATO FINALE:
#   - Studi creati: 1000
#   - Dottori totali: 1000
#   - Pazienti totali: 1000
#   - Appuntamenti totali: 500
```

## Troubleshooting

### Errori Comuni
{nome-progetto}
2. **Factory non trovato**: Controllare esistenza factory nel modulo
3. **Errore database**: Verificare migrazioni e configurazione
4. **Memoria insufficiente**: Utilizzare script in batch più piccoli

### Soluzioni
1. **Eseguire migrazioni**: `php artisan migrate`
2. **Verificare autoload**: `composer dump-autoload`
3. **Controllare namespace**: Verificare struttura moduli
4. **Testare connessione**: Verificare configurazione database

## Best Practices

### Prima dell'Esecuzione
- Backup del database esistente
- Verifica spazio disco disponibile
- Controllo configurazione ambiente
- Test su ambiente di sviluppo

### Durante l'Esecuzione
- Monitorare output e progressi
- Verificare statistiche intermedie
- Controllare utilizzo risorse
- Gestire eventuali errori

### Dopo l'Esecuzione
- Verificare integrità relazioni
- Controllare statistiche finali
- Testare funzionalità applicazione
- Documentare modifiche effettuate

## Collegamenti e Riferimenti

- [README BashScripts](../bashscripts/README.md)
- [Quick Start Seeding](../bashscripts/database/seeding/QUICK_START.md)
{nome-progetto}

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 2.0
{nome-progetto}
