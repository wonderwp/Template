<?php

namespace WonderWp\Component\Template\Views;

use function WonderWp\Functions\array_merge_recursive_distinct;

class VueFrag
{
    /** @var string */
    protected $templateFile;
    /** @var array */
    protected $values;

    /**
     * @param string $templateFile
     * @param array  $values
     */
    public function __construct($templateFile, array $values = [])
    {
        $this->templateFile = $templateFile;
        $this->values       = $values;
    }

    /**
     * @param array $values
     */
    public function render(array $values = [])
    {
        $params = array_merge_recursive_distinct($this->values, $values);
        // Spread attributes
        extract($params);

        include $this->templateFile;
    }
}
