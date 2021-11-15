<?php

namespace Tests\Unit;

use App\Models\Claim;
use Tests\TestCase;

class ClaimTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_claim()
    {
        $claim = Claim::make([
            'user_email' => 'test2@test2.com',
            'message' => 'test',
            'answered' => false
        ]);

        $this->assertTrue(!empty($claim));
    }

    public function test_update_claim()
    {
        Claim::create([
            'id' => '1',
            'user_email' => 'test2@test2.com',
            'message' => 'test',
            'answered' => false
        ]);

        $claim = Claim::where('id', '1')->first();
        $claim->answered = true;
        $claim->save();

        $this->assertTrue($claim->answered);
    }


}
