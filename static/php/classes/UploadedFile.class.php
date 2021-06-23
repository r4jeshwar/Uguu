<?php

class UploadedFile
{
    /* Public attributes */
    public $name;
    public $size;
    public $tempfile;
    public $error;

    private $sha1;
    public function getSha1()
    {
        if (!$this->sha1) {
            $this->sha1 = sha1_file($this->tempfile);
        }
        return $this->sha1;
    }

    private $mime;
    public function getMime()
    {
        if (!$this->mime) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $this->mime = finfo_file($finfo, $this->tempfile);
            finfo_close($finfo);
        }
        return $this->mime;
    }
}
