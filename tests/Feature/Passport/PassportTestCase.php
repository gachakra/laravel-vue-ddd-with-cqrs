<?php
/**
 * Created by IntelliJ IDEA.
 * User: gachakra
 * Date: 2019-08-20
 * Time: 10:14
 */

namespace Tests\Feature\Passport;

use App\User;
use Carbon\CarbonImmutable;
use DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Date;
use Laravel\Passport\ClientRepository;
use Tests\TestCase;


class PassportTestCase extends TestCase {

    use DatabaseTransactions;

    /**
     * @var array|string[]
     */
    protected $headerWithToken = [];
    /**
     * @var array|string[]
     */
    protected $headerWithoutToken = [];
    /**
     * @var array|string[]
     */
    protected $scopes = [];
    /**
     * @var User
     */
    protected $user;

    public function setUp(): void {
        parent::setUp();

        // create personal access client in db
        {
            $clientRepository = new ClientRepository();
            $client = $clientRepository->createPersonalAccessClient(
                null,
                'Test Personal Access Client',
                url('/')
            );

            DB::table('oauth_personal_access_clients')->insert([
                'client_id' => $client->id,
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }

        // create user token in db
        {
            $this->user = factory(User::class)->create();
            $token = $this->user->createToken('TestToken', $this->scopes)->accessToken;
        }

        // set request header
        {
            $this->headerWithToken['Accept'] = 'application/json';
            $this->headerWithToken['Authorization'] = "Bearer $token";

            $this->headerWithoutToken['Accept'] = 'application/json';
        }
    }
}
