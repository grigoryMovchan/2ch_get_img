<?php

namespace Application;

class ThreadParser
{

    private $responseHandler;
    private $executionStatus;

    function __construct()
    {
        $this->responseHandler = ResponseHandler::getInstance();
        $this->executionStatus = ExecutionStatus::getInstance();
    }

    public function parseThread(ThreadDownloader $downloader, $url)
    {
        $code = $downloader->getThreadHtmlCode($url);
        if (is_null($code)) {
            return false;
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true); // скрывает сообщения об ошибках HTML
        $dom->loadHTML($code);

        $nodes = $dom->getElementsByTagName("div");
        $sourceImageLinks = array();

        foreach ($nodes as $element) {
            $classy = $element->getAttribute("class");

            if (strpos($classy, "image-link") !== false) {
                $tagsA = $element->getElementsByTagName("a");

                foreach ($tagsA as $tagA) {
                    $sourceImageLinks[] = $tagA->getAttribute("href");
                }
            }
        }

        $downloader->downloadImages($sourceImageLinks);

        $this->responseHandler->addSuccess("Файлы скачаны.");

        // Сообщает в переменную сессии что скрипт завершил выполнение
        $this->executionStatus->setDownloadingComplete();

        return true;
    }

}
