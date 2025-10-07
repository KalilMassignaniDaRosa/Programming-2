<?php
require_once 'SchoolReport.php';

class Student{
    private string $cpf;
    public string $name;
    private SchoolReport $report;

    public function __construct(string $cpf, string $name,
        array $grades, float $frequency){
        $this->cpf = $cpf;
        $this->name = $name;

        // Composicao
        $this->report = new SchoolReport($grades, $frequency);
    }

    public function showInfo(): string {
        return "<strong>Name:</strong> {$this->name}<br>".
                "<strong>Cpf:</strong> {$this->cpf}<br>"
             . $this->report->showInfo() . "</p>";
    }

    #region Getter/Setter
    public function getCpf(): string{
        return $this->cpf;
    }

    public function setCpf(string $cpf): void{
        $this->cpf = $cpf;
    }
    #endregion
}
