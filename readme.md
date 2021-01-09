### Тестовое задание
Напиши метод, который принимает на вход строку и меняет порядок букв в каждом слове на обратный с сохранением регистра и пунктуации.

Например:
```
$result = revertCharacters("Привет! Давно не виделись.");
echo $result; // Тевирп! Онвад ен ьсиледив.
```
Также напиши unit-тесты для этого метода.

### Использование 
Установка: Клонируйте репозиторий, установите зависимости Composer
```
composer install
```
Скрипт может работать в консольном режиме:
```
C:\laragon\www\flip_worlds [master +3 ~2 -0 !]> php .\revertCharacters.php 'Привет! Давно не Виделись с тобой. Как дела Вася?'
Тевирп! Онвад ен Ьсиледив с йобот. Как алед Ясав?
```
### Тесты
```
C:\laragon\www\flip_worlds [master +3 ~2 -0 !]> ./vendor/bin/phpunit tests
PHPUnit 9.0.0 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 00:00.170, Memory: 4.00 MB

OK (3 tests, 3 assertions)
```
