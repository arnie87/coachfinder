# coachfinder

## Code refactoring
- /src/Template/Layout/default.ctp --> Script/CSS Source sollte von einem Content Delivery Network kommen.
- Layout-Anpassung für Mobile/Tablet
- /src/Controller/SearchController.php --> Methoden clubs() und coaches() in deren jeweiligen Controllern unterbringen (index-method) und SearchController löschen
- Verbessern des Session handlings --> muss zentraler geschehen
- Ändern der Request method von POST auf GET beim Abrufen von Daten (Suche von Coaches und Club positions) - POST --> create / GET --> read
