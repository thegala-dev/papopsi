<?php

namespace App\Console\Commands\Premium;

use App\Enums\Account\PremiumTiers;
use App\Services\Contracts\PremiumAccountService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NewAccount extends Command
{
    protected $signature = 'premium:new-account
                            {email : The premium account email}
                            {name : The premium account name}
                            {tier : The premium account tier}';

    protected $description = 'Create a new premium account data and send mail to the user';

    public function handle(PremiumAccountService $premiumAccountService): void
    {
        $validator = Validator::make($this->arguments(), [
            'tier' => Rule::in(PremiumTiers::names(true)),
            'email' => 'email',
        ]);

        if (! $validator->passes()) {
            $this->error('The provided input is invalid: '.PHP_EOL.implode(PHP_EOL, $validator->errors()->all()));
        }

        $link = $premiumAccountService->generateLinkFor(
            tier: $this->tierFrom($this->argument('tier')),
            email: $this->argument('email'),
            name: $this->argument('name'),
        );

        $this->info("Signed Link: {$link}");
    }

    private function tierFrom(string $name): PremiumTiers
    {
        return match (strtoupper($name)) {
            PremiumTiers::ACCOUNT_15_DAYS->name => PremiumTiers::ACCOUNT_15_DAYS,
            PremiumTiers::ACCOUNT_30_DAYS->name => PremiumTiers::ACCOUNT_30_DAYS,
            PremiumTiers::ACCOUNT_60_DAYS->name => PremiumTiers::ACCOUNT_60_DAYS,
        };
    }
}
