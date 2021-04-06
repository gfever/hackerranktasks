<?php

class SinglyLinkedListNode {
    public int $data;
    public ?SinglyLinkedListNode $next;

    public function __construct(int $nodeData)
    {
        $this->data = $nodeData;
        $this->next = null;
    }
}

class SinglyLinkedList {
    public $head;
    public $tail;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    public function insertNode(int $nodeData)
    {
        $node = new SinglyLinkedListNode($nodeData);

        if (is_null($this->head)) {
            $this->head = $node;
        } else {
            $this->tail->next = $node;
        }

        $this->tail = $node;
    }
}

function printSinglyLinkedList($node, $sep, $fptr)
{
    while (!is_null($node)) {
        fwrite($fptr, $node->data);

        $node = $node->next;

        if (!is_null($node)) {
            fwrite($fptr, $sep);
        }
    }
}

function echoSinglyLinkedList($node)
{
    while (!is_null($node)) {
        echo($node->data);
        $node = $node->next;
    }
}

// Complete the reverse function below.

/*
 * For your reference:
 *
 * SinglyLinkedListNode {
 *     int data;
 *     SinglyLinkedListNode next;
 * }
 *
 */
function reverse(SinglyLinkedListNode $head): SinglyLinkedList
{
 
    $revesedList = new SinglyLinkedList();
    $reversed = [];
    while ($head->next) {
        $reversed[] = $head->data;
        $head = $head->next;
    }
    $reversed[] = $head->data;
  
    $start = count($reversed);
    for ($i = $start-1; $i >= 0; $i--) {
        $revesedList->insertNode($reversed[$i]);
    }
    
    return $revesedList->head;
}


$data = [1, 2, 3, 4, 5];

$list = new SinglyLinkedList();
foreach ($data as $item) {
    $list->insertNode($item);
}


echoSinglyLinkedList(reverse($list->head)->head);

//$fptr = fopen(getenv("OUTPUT_PATH"), "w");
//
//$stdin = fopen("php://stdin", "r");
//
//fscanf($stdin, "%d\n", $tests);
//
//for ($tests_itr = 0; $tests_itr < $tests; $tests_itr++) {
//    $llist = new SinglyLinkedList();
//
//    fscanf($stdin, "%d\n", $llist_count);
//
//    for ($i = 0; $i < $llist_count; $i++) {
//        fscanf($stdin, "%d\n", $llist_item);
//        $llist->insertNode($llist_item);
//    }
//
//    $llist1 = reverse($llist->head);
//
//    printSinglyLinkedList($llist1, " ", $fptr);
//    fwrite($fptr, "\n");
//}
//
//fclose($stdin);
//fclose($fptr);