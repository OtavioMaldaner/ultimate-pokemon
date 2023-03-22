<?php

class Media implements ActiveRecord
{

    private int $idPokemon;
    private $path;
    private int $idMedia;

    public function __construct()
    {

    }

    public function setIdPokemon(int $idPokemon): void
    {
        $this->idPokemon = $idPokemon;
    }

    public function getIdPokemon(): int
    {
        return $this->idPokemon;
    }

    public function setIdMedia(int $idMedia): void
    {
        $this->idMedia = $idMedia;
    }

    public function getIdMedia(): int
    {
        return $this->idMedia;
    }

    public function setPath($path): void
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }


    public function save(): bool
    {
        $connection = new MySQL();


        if (isset($this->idMedia)) {
            $sql = "UPDATE media SET idPokemon = '{$this->idPokemon}' ,path = '{$this->path}' WHERE idMedia = {$this->idMedia}";
        } else {
            $sql = "INSERT INTO media (idPokemon,path) VALUES ('{$this->idPokemon}','{$this->path}')";
        }

        return $connection->execute($sql);
    }

    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM media WHERE idMedia = {$this->idMedia}";

        return $connection->execute($sql);
    }

    public static function find($id): Media
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM media WHERE idMedia = {$id}";
        $res = $connection->query($sql);
        $media = new Media();
        $media->setIdPokemon($res[0]['idPokemon']);
        $media->setIdMedia($res[0]['idMedia']);
        $media->setPath($res[0]['path']);

        return $media;
    }


    public static function findall(): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM media";
        $results = $connection->query($sql);
        $media = array();

        foreach ($results as $result) {
            $u = new Media();
            $u->setIdPokemon($result['idPokemon']);
            $u->setIdMedia($result['idMedia']);
            $u->setPath($result['path']);
            $media[] = $u;
        }

        return $media;
    }

    public static function findMediaByPokemon($id): Media
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM media WHERE idPokemon = {$id}";
        $res = $connection->query($sql);
        $media = new Media();
        $media->setIdPokemon($res[0]['idPokemon']);
        $media->setIdMedia($res[0]['idMedia']);
        $media->setPath($res[0]['path']);

        return $media;

    }
}

