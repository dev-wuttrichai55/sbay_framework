<?php

namespace Sbay\Base;

class CConfig {
    
    public function __construct($config) {
        $this->config = (object) $config;
    }
    
}
