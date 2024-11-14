<?php
require_once("Gibi.php");
class Revista extends Gibi{
    private string $editora;
    
    /**
     * Get the value of editora
     */
    public function getEditora(): string
    {
        return $this->editora;
    }

    /**
     * Set the value of editora
     */
    public function setEditora(string $editora): self
    {
        $this->editora = $editora;

        return $this;
    }
}
?>