<?php

namespace App;

use App\Engine\Wikipedia\WikipediaEngine;
use App\Engine\Wikipedia\WikipediaParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;


class GreenCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('search')
            ->addArgument('term');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$output->writeln('Olá, seja bem vindo ' . $input->getArgument('term'));
        $wikipedia = new WikipediaEngine(new WikipediaParser(), HttpClient::create());
        $result = $wikipedia->search($input->getArgument('term'));
        var_dump($result);

        return 0;
    }
}