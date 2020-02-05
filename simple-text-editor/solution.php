<?php

declare(strict_types=1);

'8
1 abc
3 3
2 3
1 xy
3 2
4 
4 
3 1';


//append - Append string  to the end of .
//delete - Delete the last  characters of .
//print - Print the  character of .
//undo - Undo the last (not previously undone) operation of type  or , reverting  to the state it was in prior to that operation.]

class Editor
{

    private $stack;
    private $string = '';

    public function __construct()
    {
        $this->stack = new SplStack();
    }

    public function undo()
    {
        $this->process($this->stack->pop(), true);
    }

    public function process($cmd, $undo = false)
    {
        $cmd = explode(' ', trim($cmd));
        $cmd[0] = (int) $cmd[0];
        switch ($cmd[0]) {
            case 1:
                $this->string .= $cmd[1];
                $newcmd = '2 ' . strlen($cmd[1]);
                if (!$undo) {
                    $this->stack->push($newcmd);
                }
                break;
            case 2:
                $cut = substr($this->string, -(int)$cmd[1]);
                $newcmd = '1 ' . $cut;
                if (!$undo) {
                    $this->stack->push($newcmd);
                }
                $this->string = substr($this->string, 0, -(int)$cmd[1]);
                break;
            case 3:
                echo $this->string[(int)$cmd[1] - 1] . PHP_EOL;
                break;
            case 4:
                $this->undo();
                break;
        }
    }

}


$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%[^\n]", $st_temp);
$s = new Editor();
while( $line = fgets( $_fp ) ) {
    $s->process($line);
}


$input = [
    '1 abc',
    '3 3',
    '2 3',
    '1 xy',
    '3 2',
    '4',
    '4',
    '3 1'
];

$editor = new Editor();

foreach ($input as $item) {
    $editor->process($item);
}
