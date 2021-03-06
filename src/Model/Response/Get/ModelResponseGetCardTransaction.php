<?php

namespace Anytime\ApiClient\Model\Response\Get;

use Anytime\ApiClient\Model\Response\Get\Traits\PagingTrait;

class ModelResponseGetCardTransaction extends ModelResponseGet
{
    use PagingTrait;

    /**
     * @return string
     */
    public function getCardRef()
    {
        return (string)$this->getDataValue('card_ref');
    }

    /**
     * @return integer
     */
    public function getAccId()
    {
        return (int)$this->getDataValue('acc_id');
    }

    /**
     * @return ModelResponseGetCardTransactionTransaction[]
     */
    public function getTransactions()
    {
        if(!$this->isGetterCached(__METHOD__)) {
            $transactions = [];

            foreach ($this->data['transactions'] as $elem) {
                $vatDetails = [];
                $elem['date'] = $this->timezoneNormalizer->normalize($elem['date']);
                $elem['date_transaction'] = $this->timezoneNormalizer->normalize($elem['date_transaction']);

                /** @var ModelResponseGetCardTransactionTransaction $transactionTransaction */
                $transactionTransaction = $this->hydrator->hydrate(
                    new ModelResponseGetCardTransactionTransaction(),
                    $elem
                );

                if(array_key_exists('vat_details', $elem)) {
                    foreach($elem['vat_details'] as $vatDetail) {
                        $vatDetails[] = $this->hydrator->hydrate(
                            new ModelResponseGetTransactionVatDetail(),
                            $vatDetail
                        );
                    }
                }

                $transactionTransaction->setVatDetails($vatDetails);

                if(array_key_exists('failed_reason', $elem)) {
                    $failedReason = $this->hydrator->hydrate(new ModelResponseGetCardTransactionTransactionFailedReason(), $elem['failed_reason']);
                    $transactionTransaction->setFailedReason($failedReason);
                }

                $transactions[] = $transactionTransaction;
            }

            $this->setGetterCache(__METHOD__, $transactions);
        }

        return $this->getGetterCache(__METHOD__);
    }

}
