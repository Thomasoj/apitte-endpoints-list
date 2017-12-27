<?php

namespace Thomasoj\Command;

use Apitte\Core\Schema\Schema;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ApitteEndpointsListCommand
 * @package App\Console
 *
 * @author  Tomáš Trávníček <ttravnicek@email.cz>
 */
class ApitteEndpointsListCommand extends Command
{
    private $schema;

    public function __construct(Schema $schema)
    {
        $this->schema = $schema;
        parent::__construct(null);
    }

    protected function configure()
    {
        $this->setName('api:endpoints')
            ->setDescription('Show list of API endpoints.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeLn("<info>API endpoints:</info>");

        $table = new Table($output);
        $table->setHeaders(['Endpoint', 'Method', 'Parameters', 'Handler']);

        foreach ($this->schema->getEndpoints() as $endpoint) {
            $table->addRow([
                $endpoint->getMask(),
                implode('|', $endpoint->getMethods()),
                implode (',', array_map(function ($parameter){
                    return $parameter->getName();
                }, $endpoint->getParameters())),
                $endpoint->getHandler()->getClass() . '::' . $endpoint->getHandler()->getMethod()
            ]);
        }

        $table->render();
        return 0;
    }
}
