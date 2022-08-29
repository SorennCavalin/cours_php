<?php

namespace Modeles\Entities;

class Player_contest extends BaseEntity
{
    private $player_id;
    private $contest_id;

    /**
     * Get the value of player_id
     */
    public function getPlayer_id()
    {
        return $this->player_id;
    }

    /**
     * Set the value of player_id
     *
     * @return  self
     */
    public function setPlayer_id($player_id)
    {
        $this->player_id = $player_id;

        return $this;
    }

    /**
     * Get the value of contest_id
     */
    public function getContest_id()
    {
        return $this->contest_id;
    }

    /**
     * Set the value of contest_id
     *
     * @return  self
     */
    public function setContest_id($contest_id)
    {
        $this->contest_id = $contest_id;

        return $this;
    }
}
