<?php

namespace Anytime\ApiClient\Model\Response\Get;

class ModelResponseGetCardTransactionDetails extends ModelResponseGet
{
    /**
     * @return string
     */
    public function getTxid()
    {
        return (string)$this->getDataValue('txid');
    }

    /**
     * @return integer
     */
    public function getMcc()
    {
        return (int)$this->getDataValue('mcc');
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return (float)$this->getDataValue('amount');
    }

    /**
     * @return float
     */
    public function getAmountFx()
    {
        return (float)$this->getDataValue('amount_fx');
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return (string)$this->getDataValue('currency');
    }

    /**
     * @return float
     */
    public function getFx()
    {
        return (float)$this->getDataValue('fx');
    }

    /**
     * @return float
     */
    public function getFxFee()
    {
        return (float)$this->getDataValue('fx_fee');
    }

    /**
     * @return integer
     */
    public function getStatus()
    {
        return (int)$this->getDataValue('status');
    }

    /**
     * @return integer
     */
    public function getType()
    {
        return (int)$this->getDataValue('type');
    }

    /**
     * @return float
     */
    public function getBalanceAfter()
    {
        return (string)$this->getDataValue('balance_after');
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->timezoneNormalizer->normalize($this->getDataValue('date'));
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return (string)$this->getDataValue('description');
    }
}