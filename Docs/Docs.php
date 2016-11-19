<?php

class Docs {

    public static $desc = [];
    public static $shortDesc = "Some short description";
    public static $longDesc;

    public function __construct()
    {
        self::$shortDesc = $shortDesc;
        self::$longDesc = $longDesc;
        self::$desc = $desc;
    }


    public static function displayClassName($class_name)
    {
        return "<h4>{$class_name} Methods</h4>";
    }

    public static function listClassMethods(ReflectionClass $reflector, $class_methods)
    {
        $output = "";
        foreach ($class_methods as $method) {
            if( $method->class == $reflector->getName() ) {
                    $output .= "<h5><strong>";
                    $output .= $method->getName()."()";
                    $output .= "</strong></h5>";
                    $output .= "<p>";
                    $output .=  self::getShortDescription( $method->getDocComment() );
                    $output .= "</p>";
                $output .= "<hr />";
            }
        }
        return $output;
    }

    public static function getShortDescription($full_comment)
    {
        $parse = self::parseComment($full_comment);
        return self::$shortDesc;
    }

    private static function parseComment($full_comment)
    {
        // if(preg_match('#^/\*\*(.*)\*/#s', $full_comment, $comment) === false)
        // 	die("Error");

        // $comment = trim($comment[1]);

        //Get all the lines and strip the * from the first character
        if(preg_match_all('#^\s*\*(.*)#m', $full_comment, $lines) === false)
            die('Error');

            // echo "<pre>";
            // print_r($lines[1]);
            // echo "</pre>";

        $parsedLines = self::parseLines($lines[1]);
    }

    private static function parseLines($lines)
    {
        self::$shortDesc = $lines[0];
        foreach($lines as $line) {
            $parsedLine = self::parseLine($line); //Parse the line

            if($parsedLine === false && empty(self::$shortDesc)) {
                $desc = array();
                // self::$shortDesc = implode(PHP_EOL, $desc); //Store the first line in the short description
            } elseif($parsedLine !== false) {
                $desc[] = $parsedLine; //Store the line in the long description
            }
        }
        // self::$longDesc = implode(PHP_EOL, $desc);
    }

    private static function parseLine($line) {

        //Trim the whitespace from the line
        $line = trim($line);

        if(empty($line)) return false; //Empty line

        if(strpos($line, '@') === 0) {
            $param = substr($line, 1, strpos($line, ' ') - 1); //Get the parameter name
            $value = substr($line, strlen($param) + 2); //Get the value
            // if(self::setParam($param, $value)) return false; //Parse the line and return false if the parameter is valid
        }

        return $line;
    }
}
