<?php

namespace Anytime\ApiClient\IO;

use Anytime\ApiClient\Constant\Method;

class IORequest
{
    /**
     * @var string
     */
    private $method = Method::GET;

    /**
     * @var string
     */
    private $url = '';

    /**
     * @var array
     */
    private $formData = [];

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $files = [];

    /**
     * @param string $method
     * @return IORequest
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $url
     * @return IORequest
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param array $formData
     * @return IORequest
     */
    public function setFormData($formData)
    {
        $this->formData = $formData;
        return $this;
    }

    /**
     * @param array $headers
     * @return IORequest
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }


    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * @param array $files
     * @return IORequest
     */
    public function setFiles($files)
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Return an array with all the Guzzle request options parameters arranged correctly
     */
    public function getRequestArrangedOptions()
    {
        $options = [
            'headers' => $this->getHeaders()
        ];

        if(count($this->files) > 0) {
            $options['multipart'] = $this->getMultipartOption();
        } else {
            $options['form_params'] = $this->formData;
        }

        return $options;
    }

    /**
     * @return array
     */
    protected function getMultipartOption()
    {
        $multipart = [];

        foreach($this->files as $fieldName => $fileName) {
            if(file_exists($fileName) && is_readable($fileName)) {
                $multipart[] = [
                    'name'     => $fieldName,
                    'contents' => file_get_contents($fileName),
                    'filename' => $fieldName . '.jpg'
                ];
            }
        }

        foreach($this->formData as $fieldName => $value) {
            $multipart[] = [
                'name'     => $fieldName,
                'contents' => (is_array($value) ? json_encode($value) : $value)  // @TODO Ne va pas fonctionner correctement avec des champs array et sous champs ... etc.. il faut refactorer. En attendant pour eviter des fatal on encode en json si c'est un array
            ];
        }

        return $multipart;
    }


}