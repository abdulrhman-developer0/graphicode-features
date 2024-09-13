-<?php

    namespace App\Features\TestTest\Controllers;

    use Graphicode\Standard\Traits\ApiResponses;
    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;

    class TestController extends Controller
    {
        use ApiResponses;


        /**
         * Inject your service in constructor
         */
        public function __construct() {}

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $result = null;

            if (is($result)) {
                return $this->badResponse(
                    message: $result
                );
            }

            return $this->okResponse(
                $result,
                "Success api call"
            );
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $result = null;

            if (is($result)) {
                return $this->badResponse(
                    message: $result
                );
            }

            return $this->okResponse(
                $result,
                "Success api call"
            );
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $result = null;

            if (is($result)) {
                return $this->badResponse(
                    message: $result
                );
            }

            return $this->okResponse(
                $result,
                "Success api call"
            );
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $result = null;

            if (is($result)) {
                return $this->badResponse(
                    message: $result
                );
            }

            return $this->okResponse(
                $result,
                "Success api call"
            );
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $result = null;

            if (is($result)) {
                return $this->badResponse(
                    message: $result
                );
            }

            return $this->okResponse(
                $result,
                "Success api call"
            );
        }
    }
