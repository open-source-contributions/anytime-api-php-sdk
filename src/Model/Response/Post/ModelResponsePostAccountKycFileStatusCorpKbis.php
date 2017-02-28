<?php

namespace Anytime\ApiClient\Model\Response\Post;

class ModelResponsePostAccountKycFileStatusCorpKbis
{
    /**
     * @var integer
     */
    private $status;

    /**
     * @var string
     */
    private $error;

    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
     * @return ModelResponsePostAccountKycFileStatusCorpKbis
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     * @return ModelResponsePostAccountKycFileStatusCorpKbis
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }


}