<?php

class Heap
{
    private $stack;
    private $deleted;

    public function __construct()
    {
        $this->deleted = [];
        $this->stack = new SplMinHeap();
    }

    public function process($cmd)
    {
        $cmd = explode(' ', trim($cmd));
        $cmd[0] = (int)$cmd[0];
        switch ($cmd[0]) {
            case 1:
                $cmd[1] = (int)$cmd[1];
                $this->stack->insert($cmd[1]);
                if (isset($this->deleted[$cmd[1]])) {
                    unset($this->deleted[$cmd[1]]);
                }
                break;
            case 2:
                if (!$this->stack->isEmpty()) {
                    $this->deleted[$cmd[1]] = true;
                }
                break;
            case 3:
                while ($this->stack->valid()) {
                    if (!isset($this->deleted[$this->stack->current()])) {
                        echo($this->stack->current() . PHP_EOL);
                        break;
                    }
                    $this->stack->next();
                }
                break;
        }
    }
}


//$input = [
//    '1 4',
//    '1 9',
//    '3',
//    '2 4',
//    '3',
//];

$input = [
    '1 10',
    '1 9',
    '3',
    '1 3',
    '3',
    '2 9',
    '3',
    '2 3',
    '3',
    '1 5',
    '1 2',
    '3',
];

$editor = new Heap();

foreach ($input as $item) {
    $editor->process($item);
}


//$_fp = fopen("php://stdin", "r");
//fscanf($_fp, "%[^\n]", $st_temp);
//$s = new Heap();
//while( $line = fgets( $_fp ) ) {
//    $s->process($line);
//}
