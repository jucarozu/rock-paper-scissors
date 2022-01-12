<?php

namespace Uniqoders\Game\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class GameCommand extends Command
{
    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('game')
            ->setDescription('New game: you vs computer')
            ->addArgument('name', InputArgument::OPTIONAL, 'what is your name?', 'Player 1');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write(PHP_EOL . 'Made with ♥ by Uniqoders.' . PHP_EOL . PHP_EOL);

        $player_name = $input->getArgument('name');

        $players = [
            'player' => [
                'name' => $player_name,
                'stats' => [
                    'draw' => 0,
                    'victory' => 0,
                    'defeat' => 0,
                ]
            ],
            'computer' => [
                'name' => 'Computer',
                'stats' => [
                    'draw' => 0,
                    'victory' => 0,
                    'defeat' => 0,
                ]
            ]
        ];

        // Weapons available
        $weapons = [
            0 => 'Scissors',
            1 => 'Rock',
            2 => 'Paper'
        ];

        // Rules to win
        $rules = [
            0 => 2,
            1 => 0,
            2 => 1
        ];

        $round = 1;
        $max_round = 5;

        $ask = $this->getHelper('question');

        do {
            // User selection
            $question = new ChoiceQuestion('Please select your weapon', array_values($weapons), 1);
            $question->setErrorMessage('Weapon %s is invalid.');

            $user_weapon = $ask->ask($input, $output, $question);
            $output->writeln('You have just selected: ' . $user_weapon);
            $user_weapon = array_search($user_weapon, $weapons);

            // Computer selection
            $computer_weapon = array_rand($weapons);
            $output->writeln('Computer has just selected: ' . $weapons[$computer_weapon]);

            if ($rules[$user_weapon] === $computer_weapon) {
                $players['player']['stats']['victory']++;
                $players['computer']['stats']['defeat']++;

                $output->writeln($player_name . ' win!');
            } else if ($rules[$computer_weapon] === $user_weapon) {
                $players['player']['stats']['defeat']++;
                $players['computer']['stats']['victory']++;

                $output->writeln('Computer win!');
            } else {
                $players['player']['stats']['draw']++;
                $players['computer']['stats']['draw']++;

                $output->writeln('Draw!');
            }

            $round++;
        } while ($round <= $max_round);

        // Display stats
        $stats = $players;

        $stats = array_map(function ($player) {
            return [$player['name'], $player['stats']['victory'], $player['stats']['draw'], $player['stats']['defeat']];
        }, $stats);

        $table = new Table($output);
        $table
            ->setHeaders(['Player', 'Victory', 'Draw', 'Defeat'])
            ->setRows($stats);

        $table->render();

        return 0;
    }
}
