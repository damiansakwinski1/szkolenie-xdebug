Docieramy do sytuacji, w której namierzyliśmy funkcję, która wykonuje się długo. Co możemy zrobić z tym dalej? Poniżej
najczęstsze problemy. Jeśli funkcja:

1. Wykonuje kwerendę do bazy danych, musimy zdiagnozować przyczynę wolnego wykonywania się kwerendy. Najczęściej
   występujące problemy mogą zostać rozwiązane za pomocą poniższej listy:
    1. Czy kwerenda pobiera tylko te dane, które są absolutnie konieczne do poprawnego działania aplikacji?
    1. Zastąpienie `SELECT * FROM products` kwerendą `SELECT id, name, stock FROM products`.
    1. Czy mamy pozakładane indeksy na kolumny, po których dokonujemy wyszukiwania “WHERE”?
    1. SELECT id FROM categories WHERE name = “Spodnie”. Czy mamy indeks na kolumnie name?
    1. Czy mamy pozakladane indeksy na kolumny, po których łączymy się z innymi tabelami przez JOINy?
    1. `SELECT * FROM products p LEFT JOIN products_categories pc ON p.product_id = pc.product_id`. Czy mamy indeks na
       `p.product_id` i `pc.product_id`?
    1. Czy serwer bazy danych nie ma problemów z odpowiedzią ze względu na duże obłożenie istniejącymi procesami/innymi
       kwerendami? Czy nie ma dużej ilości połączeń i kwerend w SHOW full processlist?
1. Wykonuje zapytanie do zewnętrznego serwisu (API Paczkomatów, API wyszukiwarki, itp.).
   1. Czy zapytanie musi być wykonywane zawsze “na świeżo”? Czy można zapisać jego wynik w pamięci podręcznej i serwować
   wielu użytkownikom?
   1. Czy istnieje możliwość kontaktu z dostawcą API i optymalizacją po ich stronie?
   1. Czy istnieje konieczność odpytywania zewnętrznego API? Być może można je zamienić na serwis lokalny tak, jak np. w
   przypadku wyszukiwarki.
1. Wykonuje pętlę po dużej ilości danych (produkty, kategorie, plik).
   1. Czy muszę iterować po całym zestawie danych? Być może potrzebuję tylko części elementów?
   1. Czy mogę zapisać wynik całej operacji w pamięci podręcznej?
   1. Czy mogę wykonać operację asynchronicznie (cron, rabbitmq)?
