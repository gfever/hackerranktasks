<?php

class Stack
{

    private $stack;
    
    public function __construct()
    {
        $this->stack = new SplQueue();
    }

    public function process($query)
    {
        $exploded = explode(' ', $query);
        switch ((int)$exploded[0]) {
            case 1:
                $this->stack->enqueue($exploded[1]);
                break;
            case 2:
                if (!$this->stack->isEmpty()) {
                    $this->stack->dequeue();
                }
                break;
            case 3:
                if (!$this->stack->isEmpty()) {
                    echo $this->stack->bottom();
                }
                break;
        }
    }
}

$_fp = fopen("php://stdin", "r");

fscanf($_fp, "%[^\n]", $st_temp);

$s = new Stack();

while( $line = fgets( $_fp ) ) {
    $s->process($line);
}



