<?php

namespace Info;

/*
* @author CanYB (CanMILASK)
* @version 1.0
* @api 3.9.5(old)
* @api 3.12.2(new)
* @since 28.11.19
* Plugin Language: Turkish - English
*
*/

#Main
use pocketmine\plugin\PluginBase;

#Komut
use pocketmine\{Player, Server};
use pocketmine\command\{Command, CommandSender};

#Form
use Info\form\ModalForm;

#Event
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("Eklenti Aktif - Plugin Active ");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onGiris(PlayerJoinEvent $e){
		$player = $e->getPlayer();
		
		$isim = $player->getName();
		$this->girisForm($player);
		$e->setJoinMessage("§7[§a+§7] §6$isim §aOyuna Katıldı");
    }
    
	public function girisForm($player){
	    $form = new ModalForm(function (Player $event, $data){
      $player = $event->getPlayer();
      $isim = $player->getName();
      if($data===null){
        return;
			}
			switch($data){
 				case 1:
 				    $player->addTitle("§6Haylaz§fMC", "§aiyi oyunlar");
 				    
				break;
				case 2:

				break;
            }
        });
        $isim = $player->getName();
        $form->setTitle("§7[Info] - §0Giriş");
        $form->setContent("§7Hoşgeldin §6$isim. §7Kurallar                  
        §cKüfür Kullanımı §7= §c10 Puan      
        §cArgo Kullanımı §7= §c5 Puan...");
        $form->setButton1("§6Devam Et\n§0Oyuna Geç");
        $form->setButton2("");
        $form->sendToPlayer($player);
	}
}
