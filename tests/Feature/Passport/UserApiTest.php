<?php
/**
 * Created by IntelliJ IDEA.
 * User: gachakra
 * Date: 2019-08-20
 * Time: 10:27
 */

namespace Tests\Feature\Passport;

use Symfony\Component\HttpFoundation\Response;

class UserApiTest extends PassportTestCase {

    /**
     * @test
     */
    public function get_api_user_with_token_in_headers(): void {
        $this
            ->get('api/user', $this->headerWithToken)
            ->assertOk();
    }

    /**
     * @test
     */
    public function get_api_user_without_token_in_headers(): void {
        $this
            ->get('api/user', $this->headerWithoutToken)
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
