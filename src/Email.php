<?php

final class Email extends Controller implements Regulation
{
    private $email;

    public function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);
        $this->email = $email;
    }

    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }

    public function __toString() : string
    {
        return $this->email;
    }

    public static function fromString(string $email): self
    {
        return new self($email);
    }
}