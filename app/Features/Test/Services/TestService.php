<?php

namespace App\Features\Test\Services;

use Graphicode\Standard\TDO\TDO;
use App\Features\Test\Models\Test;

class TestService
{
    private static $model = Test::class;

    /**
     * Get All
     */
    public function getTests()
    {
        try {
            $tests =  self::$model::get();

            return $testss;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Create One
     */
    public function storeTest(TDO $tdo)
    {
        try {
            $creationData = collect(
                $tdo->all(true)
            )->except([
                // ignore any key?
            ])->toArray();

            // manobolate the data before creation?

            $test =  self::$model::create($creationData);

            // write any logic after creation?

            return $test;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get One By Id
     */
    public function getTestById(string $testId)
    {
        try {
            $test =  self::$model::find($testId);
            if (! $test) return "No model with id $testId";
            return $test;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update One By Id
     */
    public function updateTestById(string $testId, TDO $tdo)
    {
        try {
            $updateData = collect(
                $tdo->all(true)
            )->except([
                // ignore any key?
            ])->toArray();

            // manobolate the data before update?

            $test =  $this->getTestById($testId);
            if (is_string($test)) return $test;
            $test->update($updateData);

            // write any logic after update?

            return $test;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Delete One By Id
     */
    public function deleteTestById(string $testId)
    {
        try {

            // get model to delete by id
            $test =  $this->getTestById($testId);
            if (is_string($test)) return $test;
            $deleted = $test->delete();

            return $deleted;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
