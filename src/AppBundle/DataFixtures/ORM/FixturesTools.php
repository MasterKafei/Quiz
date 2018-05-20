<?php

namespace AppBundle\DataFixtures\ORM;


class FixturesTools
{
    public static function getFileFromLink($link)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch,CURLOPT_URL,$link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }

    public static function saveFileFromLink($link, $extension, $savedFolder)
    {
        $image = FixturesTools::getFileFromLink($link);
        $name = md5(uniqid()) . '.' . $extension;
        if(!is_dir($savedFolder))
        {
            mkdir($savedFolder, 0755, true);
        }
        $saveFile = fopen($savedFolder . '/' . $name, 'w');
        fwrite($saveFile, $image);
        fclose($saveFile);

        return $name;
    }
}
