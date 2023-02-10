<?php

class RanksController extends Controller
{
    function beforeAction () {

    }

    function index()
    {
        $ranks = $this->Rank->viewAll();
        $this->set('ranks', $ranks);
    }

    function afterAction () {

    }
}