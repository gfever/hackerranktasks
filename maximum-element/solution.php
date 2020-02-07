<?php

declare(strict_types=1);

class MaxStack
{

    private $stack;
    private $maxStack;

    public function __construct()
    {
        $this->stack = new SplStack();
        $this->maxStack = new SplStack();
    }


    public function process($cmd)
    {
        $cmd = explode(' ', trim($cmd));
        $cmd[0] = (int) $cmd[0];
        switch ($cmd[0]) {
            case 1:
                if ($this->maxStack->isEmpty() || $cmd[1] >= $this->maxStack->current()) {
                    $this->maxStack->push($cmd[1]);
                    $this->maxStack->rewind();
                }
                $this->stack->push($cmd[1]);
                break;
            case 2:
                if (!$this->stack->isEmpty()) {
                    $last = $this->stack->pop();
                    if (!$this->maxStack->isEmpty() && $last == $this->maxStack->current()) {
                        $this->maxStack->pop();
                        $this->maxStack->rewind();
                    }
                }
                break;
            case 3:
                $this->maxStack->rewind();
                if (!$this->maxStack->isEmpty()) {
                    echo($this->maxStack->current() . PHP_EOL);    
                }
                break;
        }
    }

}


$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%[^\n]", $st_temp);
$s = new MaxStack();
while( $line = fgets( $_fp ) ) {
    $s->process($line);
}


$input = [
'1 97',
'2',
'1 20',
'2',
'1 26',
'1 20',
'2',
'3',
'1 91',
'3',
];

$editor = new MaxStack();

foreach ($input as $item) {
    $editor->process($item);
}
