<?php

interface IConNguoi
{
    function an();

    function ngu();
}

class ConNguoi implements IConNguoi
{
    function an()
    {
        echo "ăn";
    }

    function ngu()
    {
        echo "ngủ";
    }

}