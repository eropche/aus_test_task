<?php

declare(strict_types=1);

namespace App\Command;

use App\Handler\UpdateCustomersHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GetRandomUsersCommand extends Command
{
    protected static $defaultName = 'random_user:generate';

    private UpdateCustomersHandler $updateCustomersHandler;

    public function __construct(UpdateCustomersHandler $updateCustomersHandler)
    {
        parent::__construct();
        $this->updateCustomersHandler = $updateCustomersHandler;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Start generate');
        $this->updateCustomersHandler->handle();

        return Command::SUCCESS;
    }
}
