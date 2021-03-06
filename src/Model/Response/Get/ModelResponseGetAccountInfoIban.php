<?php

namespace Anytime\ApiClient\Model\Response\Get;

class ModelResponseGetAccountInfoIban
{
    /**
     * @var string
     */
    private $iban;

    /**
     * @var string
     */
    private $swift;

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return ModelResponseGetAccountInfoIban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * @return string
     */
    public function getSwift()
    {
        return $this->swift;
    }

    /**
     * @param string $swift
     * @return ModelResponseGetAccountInfoIban
     */
    public function setSwift($swift)
    {
        $this->swift = $swift;
        return $this;
    }
}