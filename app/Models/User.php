<?php

namespace App\Models;

class User
{
    private string $firstName;
    private string $lastName;
    private string $email;

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = ucwords(trim($firstName));
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = ucwords(trim($lastName));
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return ucwords($this->firstName) . " " . ucwords($this->lastName);
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return array[]
     */
    public function getEmailVariables(): array
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}