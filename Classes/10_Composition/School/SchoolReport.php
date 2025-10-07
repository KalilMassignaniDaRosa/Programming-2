<?php
class SchoolReport{
    public array $grades;
    public float $frequency;

    public function __construct(array $grades,float $frequency){
        $this->grades = $grades;
        $this->frequency = $frequency;
    }

    public function showInfo(): string {
        return "<strong>Average:</strong> " .
            number_format($this->getAverage(),2,",")."<br>".
               "<strong>Frequency:</strong> ". $this->getFrequency()."%";
    }

    #region Getters
     public function getAverage(): float {
        return array_sum($this->grades) / count($this->grades);
    }

    public function getFrequency(): float {
        return $this->frequency;
    }
    #endregion
}
