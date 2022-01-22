<?php

namespace LilMathou\SlashLive;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

    /** @var string[] */
    private $config;

    public function onEnable(): void
    {
        $this->config = $this->getConfig()->getAll();
        $this->getServer()->getLogger()->notice("Plugin fait par LilMathou#0130");
    }


    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        $commandname = $command->getName();
        if ($commandname=="live"){
            if($sender instanceof Player){
                $player = $sender->getNetworkSession()->getPlayer();
                $name = $player->getName();
                Server::getInstance()->broadcastMessage(str_replace("{name}", $sender->getName(), $this->config["msg"]));
            }
        }
        return true;
    }
}