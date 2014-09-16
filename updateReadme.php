#!/bin/php
<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16
 * @todo put it in nice classes
 */

$baseUrl = 'https://github.com/stevleibelt/trainee/tree/master/';
$filePath = __DIR__ . '/README.md';
$identifier = '## Sections';

//begin of update logic
/**
 * @param string $identifier
 * @param string $filePath
 * @return array
 */
function fetchContentThatShouldNotBeUpdated($identifier, $filePath)
{
    $contentOfReadme = explode("\n", file_get_contents($filePath));
    $contentBeforeIdentifier = array();

    foreach ($contentOfReadme as $content) {
        if ($content !== $identifier) {
            $contentBeforeIdentifier[] = $content;
        } else {
            break;
        }
    }

    return $contentBeforeIdentifier;
}

/**
 * @param string $identifier
 * @param string $basePath
 * @param string $baseUrl
 * @return array
 */
function createContentThatShouldBeUpdated($identifier, $basePath, $baseUrl)
{
    $content = array();

    $content[] = $identifier;
    $content[] = '';

    $fullQualifiedPathsWithFittingFiles = array();
    directoryWalker($basePath, $fullQualifiedPathsWithFittingFiles);

    $pathsAsArray = convertDirectoryWalkerResult($basePath, $fullQualifiedPathsWithFittingFiles);
    $pathsAsArray = sortArrayByKeys($pathsAsArray);
    addGeneratedContent($content, $pathsAsArray, $baseUrl);

    return $content;
}

/**
 * @param array $array
 * @return array
 */
function sortArrayByKeys(array $array)
{
    $keys = array_keys($array);
    natsort($keys);
    $sorted = array();

    foreach ($keys as $key) {
        $sorted[$key] = $array[$key];
    }

    return $sorted;
}

/**
 * @param $content
 * @param array $data
 * @param $baseUrl
 */
function addGeneratedContent(&$content, array $data, $baseUrl)
{
    foreach ($data as $path => $fileName) {
        $lines = getLinesFromFile($path . DIRECTORY_SEPARATOR . $fileName, 1);
        $content[] = '* [' . substr($lines[0], 2) . '](' . $baseUrl . '/' . $path . ')';
    }
}

function convertDirectoryWalkerResult($basePath, array $array)
{
    $convertedArray = array();
    $lengthOfBasePath = strlen($basePath) + 1; //+1 for trailing directory slash

    foreach ($array as $fullQualifiedPath => $fileName) {
        $key = substr($fullQualifiedPath, $lengthOfBasePath);
        $convertedArray[$key] = $fileName;
    }

    return $convertedArray;
}

/**
 * @param string $basePath
 * @param array $array
 */
function directoryWalker($basePath, array &$array)
{
    $matchingSuffix = '.md';

    $directoryNames = getDirectoryNames($basePath);
    $subPathsToSearchIn = array();

    foreach ($directoryNames as $directoryName) {
        $foundMatchingSuffixInDirectory = false;
        $path = $basePath . DIRECTORY_SEPARATOR . $directoryName;
        $fileNames = getFileNames($path);

        foreach ($fileNames as $fileName) {
            if (stringEndsWith($fileName, $matchingSuffix)) {
                $array[$path] = $fileName;
                $foundMatchingSuffixInDirectory = true;
                break;
            }
        }

        if (!$foundMatchingSuffixInDirectory) {
            $subPathsToSearchIn[] = $path;
        }
    }

    foreach ($subPathsToSearchIn as $pathToSearchIn) {
        directoryWalker($pathToSearchIn, $array);
    }
}
//end of update logic

//begin of file system utility
function getLinesFromFile($filePath, $numberOfLines)
{
    $content = explode("\n", file_get_contents($filePath));
    $lines = array_slice($content, 0, $numberOfLines);

    return $lines;
}

/**
 * @param string $basePath
 * @return array
 */
function getFileNames($basePath)
{
    $names = array();

    if ($directoryHandle = opendir($basePath)) {
        while (false !== ($fileSystemIdentifier = readdir($directoryHandle))) {
            if (is_file($basePath . DIRECTORY_SEPARATOR . $fileSystemIdentifier)) {
                $names[] = $fileSystemIdentifier;
            }
        }
        closedir($directoryHandle);
    }

    return $names;
}

/**
 * @param string $basePath
 * @return array
 */
function getDirectoryNames($basePath)
{
    $names = array();

    if ($directoryHandle = opendir($basePath)) {
        $blacklistedDirectoryNames = array(
            '.',
            '..',
            '.svn',
            '.git',
            '.idea',
            'vendor'
        );
        while (false !== ($fileSystemIdentifier = readdir($directoryHandle))) {
            if (is_dir($basePath . DIRECTORY_SEPARATOR . $fileSystemIdentifier)) {
                if (!in_array($fileSystemIdentifier, $blacklistedDirectoryNames)) {
                    $names[] = $fileSystemIdentifier;
                }
            } else {
            }
        }
        closedir($directoryHandle);
    }

    return $names;
}
//end of file system utility

//begin of string utility
/**
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function stringEndsWith($haystack, $needle)
{
    return (substr($haystack, -(strlen($needle))) === $needle);
}
//end of string utility

//starting generation

$content = array_merge(
    fetchContentThatShouldNotBeUpdated(
        $identifier,
        $filePath
    ),
    createContentThatShouldBeUpdated(
        $identifier,
        __DIR__,
        $baseUrl
    )
);

file_put_contents($filePath, implode("\n", $content));
