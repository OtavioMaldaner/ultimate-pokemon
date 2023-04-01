<?php
class Wallet implements ActiveRecord {
    
    private int $idTransacao;

    public function __construct(private int $idPlayer, private int $idPokemon) {
        
    }

    // public function constructorCreate(int $idPlayer, int $idPokemon): void {
    //     $this->setIdPlayer($idPlayer);
    //     $this->setIdPokemon($idPokemon);
    // }

    public function setIdPlayer(int $idPlayer): void {
        $this->idPlayer = $idPlayer;
    }
        
    public function getIdPlayer(): int {
        return $this->idPlayer;
    }
        
    public function setIdPokemon(int $idPokemon): void {
        $this->idPokemon = $idPokemon;
    }
        
    public function getIdPokemon(): int {
        return $this->idPokemon;
    }

    public function setIdTransacao(int $idTransacao): void {
        $this->idTransacao = $idTransacao;
    }
        
    public function getIdTransacao(): int {
        return $this->idTransacao;
    }


    public function save(): bool
    {
        $connection = new MySQL();
        if (isset($this->idWallet)) {
            $sql = "UPDATE player_wallet SET idPlayer = '{$this->idPlayer}' ,idPokemon = '{$this->idPokemon}' WHERE idTransacao = {$this->idTransacao}";
        } else {
            $connection = new MySQL();
            $sql = "INSERT INTO player_wallet"."(idPlayer, idPokemon) "."VALUES ({$this->idPlayer}, '{$this->idPokemon}')";
        }
        
        return $connection->execute($sql);
    }
    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM player_wallet WHERE idTransacao = {$this->idTransacao}";
        $teste =  $connection->execute($sql);
        return true;
    }

    public static function find($idTransacao): Wallet
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM player_wallet WHERE idTransacao = {$idTransacao}";
        $result = $connection->query($sql);
        $w = new Wallet($result[0]['idPlayer'], $result[0]['idPokemon']);
        $w->setIdTransacao($result[0]['idTransacao']);
      
        return $w;
    }

    public static function findall():array{
      $connection = new MySQL();
      $sql = "SELECT * FROM wallet";
      $results = $connection->query($sql);
      
      $wallets = array();
      foreach($results as $result){
        $w = new Wallet($result[0]['idPlayer'], $result[0]['idPokemon']);
        $w->setIdTransacao($result[0]['idTransacao']);

        $wallets[] = $w;
      }
      
      return $wallets;
    }

    public static function getPlayerWallet($idPlayer): array {
        $connection = new MySQL();
        $sql = "SELECT * FROM player_wallet WHERE idPlayer = {$idPlayer}";
        $results = $connection->query($sql);
      
        $wallets = array();
        foreach($results as $result){
            $w = new Wallet($result['idPlayer'], $result['idPokemon']);
            $w->setIdTransacao($result['idTransacao']);

            $wallets[] = $w;
      }
      
      return $wallets;
    }

}