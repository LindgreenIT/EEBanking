<?php

namespace eeBanking\orm\test;

use doctrine\orm\mapping\Column;
use doctrine\orm\mapping\Entity;
use doctrine\orm\mapping\Id;
use doctrine\orm\mapping\table;

#[Entity]
#[Table('accounts')]

class Account
{
    #[Id]
    #[Column]
    public int $account_id;

    #[Column]
    public int $user_id;

    #[Column]
    public int $balance;
}