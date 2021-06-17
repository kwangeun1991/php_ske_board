<?php

$ske_board = new ske_Board();

$list = $ske_board->getList();

view("ske_list", ['list' => $list]);
