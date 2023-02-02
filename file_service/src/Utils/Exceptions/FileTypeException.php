<?php 
namespace Exceptions;

use Throwable;

class FileTypeException implements Throwable{
    protected string $message = "";
    private string $string = "";
    protected int $code;
    protected string $file = "";
    protected int $line;
    private array $trace = [];
    private ?Throwable $previous = null;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->message  = $message;
        $this->code     = $code;
        $this->previous = $previous;
    }

    public function getMessage(): string 
    {
        return $this->message;
    }

    public function getPrevious(): ?Throwable 
    {
        return $this->previous;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getFile(): string 
    {
        return $this->file;
    }

    public function getLine(): int
    {
        return $this->line;
    }

    public function getTrace(): array
    {
        return $this->trace;
    }
    public function getTraceAsString(): string
    {
        return json_encode($this->trace);
    }

    public function __toString(): string
    {
        return json_encode('ver como implementar');
    }

    // private function __clone(): void 
    // {
       
    // }

}