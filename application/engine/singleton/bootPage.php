<?php

class compilerPage {
    private $page;
    private $js;
    public function __construct($appurl,$filepath) {
        $this->appurl = $appurl;
        $this->filepath = $filepath;
    }
    public function check_files_and_get() {
        /*$url1 = str_replace("/","\\",$this->page.".html");
        $url2 = str_replace("/","\\",$this->page."/index.html");
        $urlerr = str_replace("/","\\",$this->filepath."/_errors/404.html");
        if (file_exists($url1))
        {
            return file_get_contents($url1);
        }
        if (file_exists($url2))
        {
            return file_get_contents($url2);
        }
        return file_get_contents($urlerr);*/
        return file_get_contents($this->page);
    }
    public function outputCapsule($fullpage,$name) {
        $this->statusWithoutLayout = TRUE;
        $this->js = "";
        $this->page = $fullpage;
        $i = $this->check_files_and_get();
        //$i = $this->compileLayout($i);
        //$i = $this->compileHeader($i);
        //$i = $this->compileGetter($i);
        $i = $this->compileAnchorLink($i);
        $i = $this->compileHeadExtras($i);
        $i = $this->compileHtmlJs($i);
        return $this->getResult($i,$name);
    }
    public function outputLayout($fullpage,$name) {
        $this->statusWithoutLayout = TRUE;
        $this->js = "";
        $this->page = $fullpage;
        $i = $this->check_files_and_get();
        //$i = $this->compileLayout($i);
        //$i = $this->compileHeader($i);
        //$i = $this->compileGetter($i);
        $i = $this->compileAnchorLink($i);
        $i = $this->compileHeadExtras($i);
        $i = $this->compileHtmlJs($i);
        return $this->getResult($i,$name);
    }
    public function outputPage($fullpage,$name) {
        $this->statusWithoutLayout = TRUE;
        $this->js = "";
        $this->page = $fullpage;
        $i = $this->check_files_and_get();
        $i = $this->compileLayout($i);
        //$i = $this->compileHeader($i);
        $i = $this->compileSetterGetter($i);
        //$i = $this->compileGetter($i);
        $i = $this->compileAnchorLink($i);
        $i = $this->compileHeadExtras($i);
        $i = $this->compileHtmlJs($i);
        return $this->getResult($i,$name);
    }/*
    function compileLayout($i) {
        preg_match_all('/<tr-layout(.*?)src="(.*?)"(.*?)\/>/s', $i, $p);
        if(($hasil = $p[2][0]) != null) {
            //get layout
            $filepath = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);
            $page = $filepath."\\gear\\layouts\\".$hasil.".html";
            $url = str_replace("/","\\",$page);
            if (!file_exists($url))
            {
                return false;
            }
            $page = file_get_contents($url);
            $i = $page.$i;
        }
        return $i;
    }*/
    function compileLayout($i) {
        preg_match_all('/<tr-layout(.*?)src="(.*?)"(.*?)\/>/s', $i, $p);
        if(($hasil = $p[2][0]) != null) {
            $regex = '/<tr-layout(.*?)src="'.$hasil.'"(.*?)\/>/s';
            $i = preg_replace($regex, "", $i);
            $this->js .= 'layouts_'.$hasil.'();'."\n";
            $this->statusWithoutLayout = FALSE;
        }
        return $i;
    }
    function compileSetterGetter($i) {
        preg_match_all('/<tr-set-(.*?)>(.*?)<\/tr-set-(.*?)>/s', $i, $p);
        //$setter = [];
        foreach($p[1] as $k => $v) {
            $regex = '/<tr-set-'.$v.'>(.*?)<\/tr-set-'.$v.'>/s';
            $i = preg_replace($regex, "", $i);
            $this->js .= "document.querySelector('tr-get-".$v."').innerHTML = ".json_encode($p[2][$k]).";\n";
            //$setter[$v] = $p[2][$k];
        }
        return $i;
    }
    function compileAnchorLink($i) {
        preg_match_all('/<tr-a(.*?)href="(.*?)"(.*?)>/s', $i, $p);
        foreach($p[0] as $k => $v) {
            $search = $p[2][$k];
            $replace = $this->appurl.$p[2][$k];
            $subject = $v;
            $replaced = str_replace($search,$replace,$subject);
            $i = str_replace($subject,$replaced,$i);
        }
        return $i;
    }
    function compileHeadExtras($i) {
        preg_match_all('/<tr-head-title>(.*?)<\/tr-head-title>/s', $i, $title);
        preg_match_all('/<tr-head-meta(.*?)name="(.*?)"(.*?)content="(.*?)"(.*?)>/s', $i, $meta);
        if (isset($title[1][0])) {
            $this->js .= 'const title = document.querySelector("title");'."\n";
            $this->js .= 'title.innerHTML = "'.$title[1][0].'"'."\n";
        }
        foreach($meta[2] as $k => $v) {
            $this->js .= "document.querySelector('meta[name=".$v."]').setAttribute('content', '".$meta[4][$k]."');"."\n";
        }
        return $i;
    }
    function compileHtmlJs($i) {
        preg_match_all('/<script>(.*?)<\/script>/s', $i, $p);
        $newJS = [];
        foreach($p[1] as $k => $v) {
            $newJS[$k] = $v;
        }
        $newJS = "<script>\n".$this->js.implode("\n",$newJS)."\n</script>\n";
        $i = preg_replace('/<script>(.*?)<\/script>/s', $newJS, $i, 1);
        return $i;
    }
    function getResult($i,$name) {
        preg_match_all('/<tr-main>(.*?)<\/tr-main>/s', $i, $html);
        preg_match_all('/<script>(.*?)<\/script>/s', $i, $js);
        $js2 = "\n".'async function '.$name.'() {'."\n";
        if($this->statusWithoutLayout) {
            $js2 .= 'document.querySelector("#main-page").innerHTML = '.json_encode($html[1][0]);
        }
        $js2 .= $js[1][0];
        $js2 .= '}'."\n";
        return $js2;
    }
    function scanAllDir($dir) {
        $result = [];
        foreach(scandir($dir) as $filename) {
            if ($filename[0] === '.') continue;
            $filePath = $dir . '/' . $filename;
            if (is_dir($filePath)) {
                foreach ($this->scanAllDir($filePath) as $childFilename) {
                    $result[] = $filename . '/' . $childFilename;
                }
            } else {
                $result[] = $filename;
            }
        }
        return $result;
    }
    function getActualName($page) {
        $page = str_replace(".html","",$page);
        $page = str_replace("index","",$page);
        $page = (substr($page,-1) == '/') ? substr($page,0,-1) : $page;
        $page = str_replace("/","_",$page);
        $page = str_replace("-","_",$page);
        return $page;
    }
    function jsonAllPage($default) {
        $output = "";
        foreach(['layouts' => $this->filepath.'gear/layouts'] as $k => $v) {
            $fulllist = $this->scanAllDir($v);
            foreach ($fulllist as $v2) {
                $name = strtolower($k.'_'.$this->getActualName($v2));
                $output .= $this->outputLayout($v.'/'.$v2,$name);
            }
        }
        foreach(['pages' => $this->filepath.'gear/pages'] as $k => $v) {
            $fulllist = $this->scanAllDir($v);
            foreach ($fulllist as $v2) {
                $name = strtolower($k.'_'.$this->getActualName($v2));
                $output .= $this->outputPage($v.'/'.$v2,$name);
            }
        }
            
            //'capsules' => $this->filepath.'gear/capsules',
            
        $output .= $this->outputPage($this->filepath.'gear/pages/'.$default,'pages__default');
        return $output;
    }
}
?>