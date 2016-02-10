<?php

namespace Sutogo\Base\ViewHelpers;

class HexToRgbaViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        $this->registerArgument('color', 'string', 'Hex code of color', true);
        $this->registerArgument('opacity', 'string', 'Opacity optional value', false);
    }

    public function render()
    {
        $default = 'rgb(0, 0, 0)';

        $color = $this->arguments['color'];
        $opacity = $this->arguments['opacity'];

        //Return default if no color provided
        if (empty($color))
        {
            return '';
        }

        //Sanitize $color if "#" is provided
        if ($color[0] == '#')
        {
            $color = substr($color, 1);
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6)
        {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        }
        elseif (strlen($color) == 3)
        {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        }
        else
        {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb = array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if (is_null($opacity) === false)
        {
            $output = 'rgba(' . implode(", ", $rgb) . ', ' . $opacity . ')';
        }
        else
        {
            $output = 'rgb(' . implode(", ", $rgb) . ')';
        }

        return $output;
    }
}
