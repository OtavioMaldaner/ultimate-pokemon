<?php


class Player implements ActiveRecord
{

  private int $idPlayer;
  private string $email;
  private string $nickname;
  private string $senha;

  public function __construct() {}

  public function constructorCreate(
    string $email,
    string $nickname,
    string $senha
): void
{
    $this->setEmail($email);
    $this->setNickName($nickname);
    $this->setSenha($senha);
}

public function constructLogin(string $email, string $senha): void
    {
        $this->setEmail($email);
        $this->setSenha($senha);
    }

public function setIdPlayer(int $idPlayer): void {
    $this->idPlayer = $idPlayer;
  }
  
public function getIdPlayer(): int {
    return $this->idPlayer;
  }

public function setEmail(string $email): void {
    $this->email = $email;
}

public function getEmail(): string {
    return $this->email;
}

public function setSenha(string $senha): void {
  $this->senha = $senha;
}

public function getSenha(): string {
  return $this->senha;
}

public function getNickName(): string {
  return $this->nickname;
}

public function setNickName(string $nickName): void {
  $this->nickname = $nickName;
}

public function save(): bool 
    {
        $connection = new MySQL();
        $directory = __DIR__ . "/../database/users/";
        $extension = "";

        
        
        if (isset($this->idPlayer)) {
          $sql = "UPDATE player SET email = '{$this->email}', nickName = '{$this->nickname}',  WHERE idPlayer = {$this->idPlayer}";
        }

        else {
            $this->senha = password_hash($this->senha,PASSWORD_BCRYPT);
            $sql = "INSERT INTO player (email,senha,nickName) VALUES ('{$this->email}','{$this->senha}','{$this->nickname}')";
        }
        
        return $connection->execute($sql);
    }

    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM player WHERE idPlayer = {$this->idPlayer}";
        return $connection->execute($sql);
    }

    public static function find($id): Player
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM player WHERE idPlayer = {$id}";
        $res = $connection->query($sql);
        $player = new Player;
        $player->constructorCreate(
            $res[0]['email'],
            $res[0]['nickName'],
            $res[0]['senha']
        );
        $player->setIdPlayer($res[0]['idPlayer']);
        
        return $player;
    }

    public static function findall(): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM player";
        $results = $connection->query($sql);
        $players = array();
        
        foreach($results as $result) {
            $p = new Player();
            $p->constructorCreate(
                $result['email'],
                $result['nickName'],
                $result['senha']
            );
            $p->setIdPlayer($result['idPlayer']);
            $players[] = $p;
        }
        
        return $players;
    }

    public function authenticate(): bool
    {
        $connection = new MySQL();
        $sql = "SELECT idPlayer, email, nickName, senha FROM player WHERE email = '{$this->email}'";
        $results = $connection->query($sql);
        
        if (password_verify($this->senha, $results[0]["senha"])) {
            session_start();
            $_SESSION['idPlayer'] = $results[0]['idPlayer'];
            $_SESSION['email'] = $results[0]['email'];
            $_SESSION['nickName'] = $results[0]['nickName'];
            return true;
        } else {
            return false;
        }
    }

    public static function refreshSession(): void
    {
        $connection = new MySQL();
        $sql = "SELECT idPlayer, email, nickName FROM player WHERE idPlayer = {$_SESSION['idPlayer']}";
        $res = $connection->query($sql);

        $_SESSION['idPlayer'] = $res[0]['idPlayer'];
        $_SESSION['email'] = $res[0]['email'];
        $_SESSION['nickName'] = $res[0]['nickName'];
        
    }
}
?>