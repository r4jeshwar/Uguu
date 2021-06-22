<?php

class UploadedFile
{
    /* Public attributes */
    public $name;
    public $size;
    public $tempfile;
    public $error;

    /**
     * SHA-1 checksum
     *
     * @var string 40 digit hexadecimal hash (160 bits)
     */
    private $sha1;

    /**
     * Generates the SHA-1 or returns the cached SHA-1 hash for the file.
     *
     * @return string|false $sha1
     */
    public function getSha1()
    {
        if (!$this->sha1) {
            $this->sha1 = sha1_file($this->tempfile);
        }

        return $this->sha1;
    }

    /**
     * MIME-type
     *
     * @var string
     */

    private $mime;

    /**
     * Fetches the MIME type of the file
     *
     * @return string|false $mime
     */

    public function getMime(){
        if (!$this->mime) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $this->mime = finfo_file($finfo, $file->tempfile);
            finfo_close($finfo);
        }
        return $this->mime;
    }

    /**
     * Extension of file
     *
     * @var string
     */

    private $ext;

    /**
     * Fetches the extension of the file
     *
     * @return string|false $ext
     */

    public function getExt(){
        if (!$this->ext) {
            $this->ext = pathinfo($file->name, PATHINFO_EXTENSION);
        }
        return $this->ext;
    }
}