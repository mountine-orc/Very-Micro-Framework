<?php
namespace Core
{
    class View
    {
        function render($viewName, $argumentArray = array())
        {
            foreach ($argumentArray as $key => $val)
                $$key = $val;
            include("/view/headerView.php");
            include("/view/".$viewName."View.php");
            include("/view/footerView.php");
        }
    }
}