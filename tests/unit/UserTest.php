<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    protected User $user;

    public function setUp(): void
    {
        $this->user = new User;
    }

    public function test_can_get_first_name_of_user(): void
    {

        $this->user->setFirstName('Anas');
        $this->assertEquals('Anas', $this->user->getFirstName());
    }

    public function test_can_get_last_name_of_user(): void
    {
        $this->user->setLastName('Salama');
        $this->assertEquals('Salama', $this->user->getLastName());
    }

    public function testFullNameIsReturned(): void
    {
        $this->user->setFirstName('anas fathy');
        $this->user->setLastName('salama');
        $this->assertEquals(ucwords('anas fathy salama'), $this->user->getFullName());
    }

    public function test_first_and_last_name_is_trimed(): void
    {
        $this->user->setFirstName('   Anas Fathy  ');
        $this->user->setLastName('salama   ');
        $this->assertEquals('Anas Fathy Salama', $this->user->getFullName());
    }

    public function test_email_address_can_be_set(): void
    {
        $this->user->setEmail('anassalama@test.com');
        $this->assertEquals('anassalama@test.com', $this->user->getEmail());
    }

    public function test_email_variables_contains_correct_values(): void
    {
        $this->user->setFirstName('Anas Fathy');
        $this->user->setLastName('salama');
        $this->user->setEmail('anassalama@test.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Anas Fathy Salama', $emailVariables['full_name']);
        $this->assertEquals('anassalama@test.com', $emailVariables['email']);
    }
}