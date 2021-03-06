<?php

namespace Anytime\ApiClient\Builder\RequestBuilder;

use Anytime\ApiClient\Model\Request\Get\ModelRequestGetAccountStatement;
use Anytime\ApiClient\Model\Request\ModelRequestInterface;

class GetAccountStatementRequestDirector extends RequestDirector
{
    /**
     * @param ModelRequestInterface|ModelRequestGetAccountStatement $modelRequest
     * @return GetAccountStatementRequestDirector
     */
    public function buildRequest(ModelRequestInterface $modelRequest)
    {
        $this->requestBuilder->setUri('accounts/' . $modelRequest->getId() . '/statements');
        return $this;
    }
}