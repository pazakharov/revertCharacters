<?php declare(strict_types=1);

require_once __DIR__.'/../revertCharacters.php';

use PHPUnit\Framework\TestCase;
use function RevertCharacters\revertCharacters as revertCharacters;
final class RevertCharactersTest extends TestCase
{
    /**
     * Тест на пустую строку
     * @return void
     */
    public function testEmptyString(): void
    {
        $this->assertEquals('',revertCharacters('') );
    }

    /**
     * Тест работы заранее известной строки
     * @return void
     */
    public function testStringWithManyWords(): void
    {
        $this->assertEquals('Тевирп! Онвад ен ьсиледив.',revertCharacters('Привет! Давно не виделись.') );
    }

    /**
     * Тест строки из одного слова
     * @return void
     */
    public function testStringOneWord(): void
    {
        $this->assertEquals('Тевирп',revertCharacters('Привет') );
 
    }
}