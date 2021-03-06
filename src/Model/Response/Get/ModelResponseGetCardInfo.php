<?php

namespace Anytime\ApiClient\Model\Response\Get;

class ModelResponseGetCardInfo extends ModelResponseGet
{
   /**
     * @return integer
     */
    public function getAccId()
    {
        return (int)$this->getDataValue('acc_id');
    }

    /**
     * @return string
     */
    public function getCardRef()
    {
        return (string)$this->getDataValue('card_ref');
    }

    /**
     * @return \DateTime
     */
    public function getActivationDate()
    {
        return $this->timezoneNormalizer->normalize($this->getDataValue('activation_date'));
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return (float)$this->getDataValue('balance');
    }

    /**
     * @return integer
     */
    public function getValidityMonth()
    {
        return $this->getDataValue('validity_month');
    }

    /**
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->timezoneNormalizer->normalize($this->getDataValue('expiry_date'));
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return (string)$this->getDataValue('status');
    }

    /**
     * @return integer
     */
    public function getPos()
    {
        return (int)$this->getDataValue('pos');
    }

    /**
     * @return integer
     */
    public function getAtm()
    {
        return (int)$this->getDataValue('atm');
    }

    /**
     * @return ModelResponseGetCardInfoCardHolder
     */
    public function getCardHolder()
    {
        if(!$this->isGetterCached(__METHOD__)) {

            $cardHolder = $this->hydrator->hydrate(
                new ModelResponseGetCardInfoCardHolder(),
                (array)$this->getDataValue('card_holder')
            );

            $this->setGetterCache(__METHOD__, $cardHolder);
        }

        return $this->getGetterCache(__METHOD__);
    }

    /**
     * @return ModelResponseGetCardInfoCardHolder
     */
    public function getCardName()
    {
        if(!$this->isGetterCached(__METHOD__)) {

            $cardName = $this->hydrator->hydrate(
                new ModelResponseGetCardInfoCardName(),
                (array)$this->getDataValue('card_name')
            );

            $this->setGetterCache(__METHOD__, $cardName);
        }

        return $this->getGetterCache(__METHOD__);
    }

}
