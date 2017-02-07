<?php

class Books
{
    protected $books = [];

    public function add($first)
    {
        $this->books[] = $first;
    }

    public function getOne()
    {
        $number = $this->getNumber();
        $this->remove();

        if ($number === 0) {
            return 0;
        }

        return 1;
    }

    public function remove()
    {
        array_pop($this->books);
    }

    public function getNumber()
    {
        return count($this->books);
    }
}


class FirstBooks extends Books
{

}

class SecondBooks extends Books
{

}

class ThirdBooks extends Books
{

}

class FourthBooks extends Books
{

}

class FifthBooks extends Books
{

}

class Book
{

}

class Lot
{
    protected $total = 0;

    public function __construct($first, $second, $third, $fourth, $cinq)
    {
        $this->total = $first + $second + $third + $fourth + $cinq;
    }

    public function getPrice()
    {
        if ($this->total === 1) {
            return 8;
        }

        if ($this->total === 2) {
            return 15.2;
        }

        if ($this->total === 3) {
            return 21.6;
        }

        if ($this->total === 4) {
            return 25.6;
        }

        if ($this->total === 5) {
            return 30;
        }
    }
}

class Basket
{
    protected $firstBooks;
    protected $secondBooks;
    protected $books = [];

    public function __construct($firstBooks , $secondBooks, $thirdBooks, $fourthBooks, $fifthBooks)
    {
        $this->firstBooks = $firstBooks;
        $this->secondBooks = $secondBooks;
        $this->thirdBooks = $thirdBooks;
        $this->fourthBooks = $fourthBooks;
        $this->fifthBooks = $fifthBooks;

        $this->books[] = $firstBooks;
        $this->books[] = $secondBooks;
        $this->books[] = $thirdBooks;
        $this->books[] = $fourthBooks;
        $this->books[] = $fifthBooks;
    }

    public function getPrice()
    {
        $number = $this->getLotNumber();

        $total = 0;
        for ($iteration = 0; $iteration < $number; $iteration++) {
            $lot = new Lot(
                $this->firstBooks->getOne(),
                $this->secondBooks->getOne(),
                $this->thirdBooks->getOne(),
                $this->fourthBooks->getOne(),
                $this->fifthBooks->getOne()
            );

            $total += $lot->getPrice();
        }

        return $total;
    }

    /**
     * @return int
     */
    protected function getLotNumber()
    {
        $number = 0;
        foreach ($this->books as $books) {
            $number = $this->getNewNumber($books, $number);
        }
        return $number;
    }

    /**
     * @param $books
     * @param $number
     * @return mixed
     */
    protected function getNewNumber($books, $number)
    {
        if ($books->getNumber() > $number) {
            $number = $books->getNumber();
            return $number;
        }

        return $number;
    }
}