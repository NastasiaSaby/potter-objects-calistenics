<?php

use PHPUnit\Framework\TestCase;
include('potter.php');

class MovieTest extends PHPUnit_Framework_TestCase
{
    public function testShouldGetPriceOf2DifferentBooks()
    {
        $firstBooks = new FirstBooks();
        $firstBooks->add(new Book());
        $firstBooks->add(new Book());

        $secondBooks = new SecondBooks();
        $secondBooks->add(new Book());
        $secondBooks->add(new Book());

        $thirdBooks = new ThirdBooks();
        $thirdBooks->add(new Book());
        $thirdBooks->add(new Book());

        $fourthBooks = new FourthBooks();
        $fourthBooks->add(new Book());

        $fifthBooks = new FifthBooks();
        $fifthBooks->add(new Book());


        $basket = new Basket($firstBooks, $secondBooks, $thirdBooks, $fourthBooks, $fifthBooks);
        $this->assertEquals($basket->getPrice(), '51.60');
    }

    public function testShouldRemoveBooks()
    {
        $firstBooks = new FirstBooks();
        $firstBooks->add(new Book());
        $firstBooks->add(new Book());

        $this->assertEquals($firstBooks->getNumber(), 2);

        $firstBooks->remove();

        $this->assertEquals($firstBooks->getNumber(), 1);
    }

    public function testShouldGetOneBooks()
    {
        $book2 = new Book();
        $firstBooks = new FirstBooks();
        $firstBooks->add(new Book());
        $firstBooks->add($book2);

        $this->assertEquals($firstBooks->getNumber(), 2);

        $this->assertEquals($firstBooks->getOne(), 1);

        $this->assertEquals($firstBooks->getNumber(), 1);

        $this->assertEquals($firstBooks->getOne(), 1);

        $this->assertEquals($firstBooks->getNumber(), 0);

        $this->assertEquals($firstBooks->getOne(), 0);
    }

    public function testShouldGet152Lot()
    {
        $lot = new Lot(1, 0, 1, 0, 0);

        $this->assertEquals($lot->getPrice(), '15.2');
    }

    public function testShouldGet8Lot()
    {
        $lot = new Lot(1, 0, 0, 0, 0);

        $this->assertEquals($lot->getPrice(), '8');
    }

    public function testShouldGet216Lot()
    {
        $lot = new Lot(1, 0, 1, 0, 1);

        $this->assertEquals($lot->getPrice(), '21.6');
    }

    public function testShouldGet192Lot()
    {
        $lot = new Lot(1, 0, 1, 1, 1);

        $this->assertEquals($lot->getPrice(), '25.6');
    }

    public function testShouldGet30Lot()
    {
        $lot = new Lot(1, 1, 1, 1, 1);

        $this->assertEquals($lot->getPrice(), '30');
    }

    public function testShouldGetLot()
    {
        $lot = new Lot(1, 0, 0, 0, 0);

        $this->assertEquals($lot->getPrice(), '8');
    }

}
