<?php

namespace Uniqoders\Game\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Uniqoders\Game\Constants\GameSettings;
use Uniqoders\Game\Contracts\PlayerInterface;
use Uniqoders\Game\Contracts\RoundResultInterface;
use Uniqoders\Game\Facades\GameFacade;
use Uniqoders\Game\Factories\Models\Players\PlayerFactory;
use Uniqoders\Game\Models\Games\Game;
use Uniqoders\Game\Models\GameVariants\AbstractGameVariant;
use Uniqoders\Game\Models\GameVariants\RockPaperScissorsGameVariant;
use Uniqoders\Game\Models\GameVariants\RockPaperScissorsLizardSpockGameVariant;
use Uniqoders\Game\Models\RoundResults\DefeatRoundResult;
use Uniqoders\Game\Models\RoundResults\DrawRoundResult;
use Uniqoders\Game\Models\RoundResults\VictoryRoundResult;

class GameCommand extends Command
{
    /**
     * Game settings
     */

    /**
     * @var int
     */
    private int $DEFAULT_GAME_VARIANT_KEY;

    /**
     * @var int
     */
    private int $DEFAULT_CHOSEN_WEAPON_KEY;

    /**
     * @var int
     */
    private int $MAX_ROUNDS;

    /**
     * @var int
     */
    private int $MIN_ROUNDS_TO_WIN;


    /**
     * Players
     */

    /**
     * @var PlayerInterface
     */
    private PlayerInterface $humanPlayer;

    /**
     * @var PlayerInterface
     */
    private PlayerInterface $computerPlayer;


    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        // Get constants for game settings
        $this->DEFAULT_GAME_VARIANT_KEY = GameSettings::DEFAULT_GAME_VARIANT_KEY;
        $this->DEFAULT_CHOSEN_WEAPON_KEY = GameSettings::DEFAULT_CHOSEN_WEAPON_KEY;
        $this->MAX_ROUNDS = GameSettings::MAX_ROUNDS;
        $this->MIN_ROUNDS_TO_WIN = GameSettings::MIN_ROUNDS_TO_WIN;

        $this->setName('game')
             ->setDescription('New game: You vs Computer')
             ->addArgument(
                 'humanPlayerName',
                 InputArgument::OPTIONAL,
                 'What is your name?',
                 'Player 1'
             );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Welcome to game
        $output->write(PHP_EOL . 'Made with ♥ by Uniqoders.' . PHP_EOL . PHP_EOL);

        // Initialize players
        $this->initializePlayers($input->getArgument('humanPlayerName'));

        // Get available game variants
        $availableGameVariants = $this->getAvailableGameVariants();

        // Get selected game variant
        $chosenGameVariantKey = $this->getChosenGameVariantKey($input, $output, $availableGameVariants);

        // Get available weapons for selected game variant
        $availableWeapons = $this->getAvailableWeaponsByGameVariant($chosenGameVariantKey);

        // Initialize round counter
        $roundCounter = 1;

        do {

            // Set human player selected weapon
            $humanPlayerChosenWeaponKey = $this->getHumanPlayerChosenWeaponKey($input, $output, $availableWeapons);
            $this->humanPlayer->setChosenWeapon($availableWeapons[$humanPlayerChosenWeaponKey]);
            $output->writeln('You have just selected: ' . $this->humanPlayer->getChosenWeapon()->getName());

            // Set computer player selected weapon
            $computerPlayerChosenWeaponKey = $this->getComputerPlayerChosenWeaponKey($availableWeapons);
            $this->computerPlayer->setChosenWeapon($availableWeapons[$computerPlayerChosenWeaponKey]);
            $output->writeln('Computer has just selected: ' . $this->computerPlayer->getChosenWeapon()->getName());

            // Play game variant round and get round result
            $roundResult = GameFacade::getRoundResult(
                $this->humanPlayer->getChosenWeapon(), $this->computerPlayer->getChosenWeapon()
            );

            $output->writeln($roundResult->getName() . '!');

            // Update victories, defeats and draws for each player
            if ($roundResult instanceof VictoryRoundResult)
            {
                $this->humanPlayer->increaseTotalVictories();
                $this->computerPlayer->increaseTotalDefeats();
            }
            else if ($roundResult instanceof DefeatRoundResult)
            {
                $this->humanPlayer->increaseTotalDefeats();
                $this->computerPlayer->increaseTotalVictories();
            }
            else if ($roundResult instanceof DrawRoundResult)
            {
                $this->humanPlayer->increaseTotalDraws();
                $this->computerPlayer->increaseTotalDraws();
            }
            else
            {
                throw new \InvalidArgumentException("Round result is invalid.");
            }

            // Create array with total victories for each player
            $playersVictories = array(
                $this->humanPlayer->getTotalVictories(),
                $this->computerPlayer->getTotalVictories()
            );

            // End the game when any player reaches the minimum number of rounds won
            if (in_array($this->MIN_ROUNDS_TO_WIN, $playersVictories))
                break;

            // Increase round counter
            $roundCounter++;

        } while ($roundCounter <= $this->MAX_ROUNDS);

        // Display game final stats
        $gameFinalStats = $this->getFinalStats();

        $table = new Table($output);

        $table
            ->setHeaders([ 'Player', 'Victories', 'Draws', 'Defeats' ])
            ->setRows($gameFinalStats);

        $table->render();

        return Command::SUCCESS;
    }

    /**
     * @param string $humanPlayerName
     * @return void
     */
    protected function initializePlayers(string $humanPlayerName): void
    {
        // Initialize a human player object
        $this->humanPlayer = PlayerFactory::getInstance()->createHumanPlayer($humanPlayerName ?? 'Player 1');

        // Initialize a computer player object
        $this->computerPlayer = PlayerFactory::getInstance()->createComputerPlayer();
    }

    /**
     * @return array
     */
    protected function getAvailableGameVariants(): array
    {
        // Get available game variants array
        return Game::getAvailableGameVariants();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param array $availableGameVariants
     * @return int
     */
    protected function getChosenGameVariantKey(InputInterface $input, OutputInterface $output, array $availableGameVariants): int
    {
        // Get question helper
        $questionHelper = $this->getHelper('question');

        // Display game variants choice question
        $gameVariantQuestion = new ChoiceQuestion(
            'Please select a game variant',
            array_values(
                array_map(function($gameVariant) {
                    return $gameVariant->__toString();
                }, $availableGameVariants)
            ),
            $this->DEFAULT_GAME_VARIANT_KEY
        );

        $gameVariantQuestion->setErrorMessage('Game variant %s is invalid.');

        // Get selected game variant
        $chosenGameVariant = $questionHelper->ask($input, $output, $gameVariantQuestion);
        $output->writeln('Selected game variant: ' . $chosenGameVariant);

        return array_search($chosenGameVariant, $availableGameVariants);
    }

    /**
     * @param int $chosenGameVariantKey
     * @return array
     */
    protected function getAvailableWeaponsByGameVariant(int $chosenGameVariantKey): array
    {
        // Get available weapons for selected game variant
        switch ($chosenGameVariantKey) {
            case 0:
                return RockPaperScissorsGameVariant::getAvailableWeapons();
            case 1:
                return RockPaperScissorsLizardSpockGameVariant::getAvailableWeapons();
            default:
                throw new \InvalidArgumentException("Game variant $chosenGameVariantKey is invalid.");
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param array $availableWeapons
     * @return int
     */
    protected function getHumanPlayerChosenWeaponKey(InputInterface $input, OutputInterface $output, array $availableWeapons): int
    {
        // Get question helper
        $questionHelper = $this->getHelper('question');

        // Display weapons choice question
        $weaponQuestion = new ChoiceQuestion(
            'Please select your weapon',
            array_values(
                array_map(function($weapon) {
                    return $weapon->__toString();
                }, $availableWeapons)
            ),
            $this->DEFAULT_CHOSEN_WEAPON_KEY
        );

        $weaponQuestion->setErrorMessage('Weapon %s is invalid.');

        // Get selected human player weapon
        $humanPlayerChosenWeapon = $questionHelper->ask($input, $output, $weaponQuestion);

        return array_search($humanPlayerChosenWeapon, $availableWeapons);
    }

    /**
     * @param array $availableWeapons
     * @return int
     */
    protected function getComputerPlayerChosenWeaponKey(array $availableWeapons): int
    {
        return array_rand($availableWeapons);
    }

    /**
     * @return array
     */
    protected function getFinalStats(): array
    {
        $players = array(
            $this->humanPlayer,
            $this->computerPlayer
        );

        return array_map(function ($player) {
            return [
                'playerName' => $player->getName(),
                'totalVictories' => $player->getTotalVictories(),
                'totalDraws' => $player->getTotalDraws(),
                'totalDefeats' => $player->getTotalDefeats()
            ];
        }, $players);
    }
}
