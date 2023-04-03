<?php

class Pokemon implements ActiveRecord{

  private int $idPokemon;
  private string $nome;
  private float $peso;

  private float $altura;

  private string $tipo;

  private int $over;

  private int $idPlayer;

  public function __construct() {}

  public function constructorCreate(
    string $nome,
    float $peso,
    float $altura,
    string $tipo,
    int $over 
): void
{
    $this->setNome($nome);
    $this->setPeso($peso);
    $this->setAltura($altura);
    $this->setTipo($tipo);
    $this->setOver($over);
}

public function setIdPlayer(int $idPlayer): void {
  $this->idPlayer = $idPlayer;
}

public function getIdPlayer(): int {
  return $this->idPlayer;
}

public function setNome(string $nome): void {
  $this->nome = $nome;
}

public function getNome(): string {
  return $this->nome;
}

public function setPeso(int $peso): void {
  $this->peso = $peso;
}

public function getPeso(): float {
  return $this->peso;
}

public function setAltura(int $altura): void {
  $this->altura = $altura;
}

public function getAltura(): float {
  return $this->altura;
}

public function setTipo(string $tipo): void {
  $this->tipo = $tipo;
}

public function getTipo(): string {
  return $this->tipo;
}

public function setOver(int $over): void {
  $this->over = $over;
}

public function getOver(): int {
  return $this->over;
}

public function setIdPokemon(int $idPokemon): void {
  $this->idPokemon = $idPokemon;
}

public function getIdPokemon(): int {
  return $this->idPokemon;
}

public function save(): bool
    {
        $connection = new MySQL();
        if (isset($this->idPokemon)) {
            $sql = "UPDATE pokemon SET nome = '{$this->nome}' ,peso = '{$this->peso}', altura = '{$this->altura}', tipo = '{$this->tipo}', over = '{$this->over}' WHERE idPokemon = {$this->idPokemon}";
        } else {
            $connection = new MySQL();
            $sql = "INSERT INTO `product`".
                "(`idPlayer`, `peso`, `altura`, `tipo`, `over`) ".
                "VALUES (, {$this->idPlayer}, '{$this->peso}', '{$this->altura}', {$this->tipo}, {$this->over})";

        }
        
        return $connection->execute($sql);
    }
    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM pokemon WHERE idPokemon = {$this->idPokemon}";
        return $connection->execute($sql);
    }

    public static function find($idPokemon): Pokemon
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM pokemon WHERE idPokemon = {$idPokemon}";
        $result = $connection->query($sql);
        $p = new Pokemon();
        $p->constructorCreate(
          $result[0]['nome'],
          $result[0]['peso'],
          $result[0]['altura'],
          $result[0]['tipo'],
          $result[0]['over']
        );
        $p->setIdPokemon($result[0]['idPokemon']);
      
        return $p;
    }

    public static function findall():array{
      $connection = new MySQL();
      $sql = "SELECT * FROM pokemon";
      $results = $connection->query($sql);
      
      $pokemons = array();
      foreach($results as $result){
        $p = new Pokemon();
        $p->constructorCreate(
          $result[0]['nome'],
          $result[0]['peso'],
          $result[0]['altura'],
          $result[0]['tipo'],
          $result[0]['over']
        );
        $p->setIdPlayer($result[0]['idPlayer']);
        $p->setIdPokemon($result[0]['idPokemon']);

        $pokemons[] = $p;
      }
      
      return $pokemons;
  }
  public static function findIdPokemonByName($pokemonName){
      $connection = new MySQL();
      $sql = "SELECT idPokemon FROM pokemon WHERE nome = '{$pokemonName}'";
      $result = $connection->query($sql);
      return $result[0]['idPokemon'];
  }
  public static function verificaPokemonNaCarteira($idPokemon, $idPlayer) : bool {

      $connection = new MySQL();
      $sql = "SELECT * FROM player_wallet WHERE idPokemon = {$idPokemon} and idPlayer = {$idPlayer}";
      $result = $connection->query($sql);
      if(count($result) >= 1){
          return true;

      }else{
          return false;
      }


  }

}