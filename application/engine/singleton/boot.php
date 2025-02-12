<?php 
    //-- Calling Section
    require_once('bootPage.php');
    require_once('bootDatabaseQuery.php');
    //require_once('bootDBTable.php');
    //-- End of Calling Section

    //-- Booting Section
    $pageCompiler = new compilerPage($app_url,$filepath);
    //$dbinfo = DB::dbCheckOrCreate();
    //$tableCompiler = new tableParser($app_url,$filepath);
    //$tableCompiler->run();
    //-- End of Booting Section

    $allData = $pageCompiler->jsonAllPage('welcome/index.html');
    $allData['html'] = str_replace(array("\r","\n"),"",$allData['html']);
    $allData['html'] = str_replace(['"',"'"], "", $allData['html']);
    $hasil = '';
    $hasil .= file_read($filepath.'/engine/jsng/support.js')."\n";
    $hasil .= "let trickster = document.querySelector('trickster');
                let page_url = trickster.getAttribute('url');
                let project_name = trickster.getAttribute('name');
                globalThis.page_url = page_url;
                ";
    $hasil .= file_read($filepath.'/engine/jsng/sweetalert2@11.js')."\n";
    $hasil .= file_read($filepath.'/engine/jsng/selector.js')."\n";
    $hasil .= file_read($filepath.'/engine/jsng/database.js')."\n";
    $hasil .= file_read($filepath.'/engine/jsng/table.js')."\n";
    $hasil .= file_read($filepath.'/engine/jsng/form.js')."\n";
    //$hasil .= file_read($filepath.'/engine/jsng/crud.js')."\n";
    //$hasil .= file_read($filepath.'/engine/jsng/capsule.js')."\n";
    //$hasil .= "let listRoute = ".json_encode($address, JSON_PRETTY_PRINT).";\n";
    $hasil .= $allData."\n";
    $hasil .= file_read($filepath.'/engine/jsng/router.js')."\n";

    file_write($filepath.'/battery/minified.js', $hasil);
?>
