<?php

declare(strict_types=1);

class Q
{

    private $q;

    public function __construct()
    {
        $this->q = new SplQueue();
    }
    
    public function process($cmd)
    {
        $cmd = explode(' ', trim($cmd));
        $cmd[0] = (int) $cmd[0];
        switch ($cmd[0]) {
            case 1:
                $this->q->enqueue($cmd[1]);
                break;
            case 2:
                $this->q->dequeue();
                break;
            case 3:
                $this->q->rewind();
                if (!$this->q->isEmpty()) {
                    echo($this->q->current() . PHP_EOL);    
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
'10',
'1 42',
'2',
'1 14',
'3',
'1 28',
'3',
'1 60',
'1 78',
'2',
'2'
];

$editor = new Q();

foreach ($input as $item) {
    $editor->process($item);
}
