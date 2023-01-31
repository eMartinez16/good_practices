<?php 
namespace Utils\Exceptions;

use Throwable;

class ImageTypeException implements Throwable{
    protected string $message = "";
    private string $string = "";
    protected int $code;
    protected string $file = "";
    protected int $line;
    private array $trace = [];
    private ?Throwable $previous = null;

    public __construct(string $message = "", int $code = 0, ?Throwable $previous = null){
        $this->message  = $message;
        $this->code     = $code;
        $this->previous = $previous;
    }

    function getMessage(): string {
        return $this->message;
    }

     function getPrevious(): ?Throwable {
        return $this->getPrevious;
    }

     function getCode(): int{
        return $this->code;
    }

     function getFile(): string {
        return $this->file;
    }

     function getLine(): int{
        return $this->line;
    }

     function getTrace(): array{
        return $this->trace;
    }
     function getTraceAsString(): string{
        return json_encode($this->trace);
    }

     function __toString(): string{

    }

    // private function __clone(): void;
}