<?php

namespace Anytime\ApiClient\Model\Response\Get\Traits;

/**
 * @method mixed getDataValue($key)
 * @method bool isGetterCached($key)
 * @method \Anytime\ApiClient\Model\Response\ModelResponse setGetterCache($key, $data)
 * @method mixed getGetterCache($key)
 */
trait PagingLimitTrait
{
    use PagingTotalResultsTrait;

    /**
     * @return PagingFiltersLimit
     */
    public function getFilters()
    {
        if(!$this->isGetterCached(__METHOD__)) {
            $data = $this->getDataValue('filters');

            if($data && is_array($data)) {
                $filters = $this->hydrator->hydrate(new PagingFiltersLimit(), $data);
                $this->setGetterCache(__METHOD__, $filters);
            }
        }

        return $this->getGetterCache(__METHOD__);
    }
}