<?php

namespace App\Features\TestTest\Services;

class TestService
{
    private static $model = Model::class;

    /**
     * Copy it and customized your logic
     */
    public function doAnyThing()
    {
        try {
            return 'data';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
