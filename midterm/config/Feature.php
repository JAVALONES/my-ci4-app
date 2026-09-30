<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;


class Feature extends BaseConfig
{
    
    public bool $autoRoutesImproved = false;

    
    public bool $oldFilterOrder = false;

    
    public bool $limitZeroAsAll = true;
}
