<?php


namespace App\DTO\Request;


class SearchRequestSchema
{
    public string $checkInDate;

    public string $checkOutDate;

    /**
     * @return string
     */
    public function getCheckInDate(): string
    {
        return $this->checkInDate;
    }

    /**
     * @param string $checkInDate
     */
    public function setCheckInDate(string $checkInDate): void
    {
        $this->checkInDate = $checkInDate;
    }

    /**
     * @return string
     */
    public function getCheckOutDate(): string
    {
        return $this->checkOutDate;
    }

    /**
     * @param string $checkOutDate
     */
    public function setCheckOutDate(string $checkOutDate): void
    {
        $this->checkOutDate = $checkOutDate;
    }



}