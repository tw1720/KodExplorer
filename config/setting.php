<?php
/*
* @link http://kodcloud.com/
* @author warlee | e-mail:kodcloud@qq.com
* @copyright warlee 2014.(Shanghai)Co.,Ltd
* @license http://kodcloud.com/tools/license/license.txt
*/

//配置數據,可在setting_user.php中添加變量覆蓋,升級後不會被替換
$config['settings'] = array(
	'downloadUrlTime'	=> 0,			 //下載地址生效時間，按秒計算，0代表不限制
	'apiLoginTonken'	=> '',			 //設定則認為開啟服務端api通信登陸，同時作為加密密匙
	'updloadChunkSize'	=> 1024*1024*0.4,//0.4M;分片上傳大小設定;需要小於php.ini上傳限制的大小
	'updloadThreads'	=> 10,			 //上傳併發數;部分低配服務器上傳失敗則將此設置為1
	'updloadBindary'	=> 0,			 //1:以二進制方式上傳;後端服務器以php://input接收;0則為傳統方式上傳
	'uploadCheckChunk'	=> true,		 //開關斷點續傳，一個文件上傳一半時中斷，同一個文件再次上傳到同一個位置時會接著之前的進度上傳。
	'paramRewrite'		=> false,		 //開啟url 去除? 直接跟參數
	'httpSendFile'		=> false,		 //調用webserver下載 http://www.laruence.com/2012/05/02/2613.html; 
										 //https://www.lovelucy.info/x-sendfile-in-nginx.html
	
	'pluginServer'		=> "http://api.kodcloud.com/?",
	'staticPath'		=> "./static/",	//靜態文件目錄,可以配置到cdn;
	'pluginHost'		=> PLUGIN_HOST  //靜態文件目錄
);
// windows upload threads;兼容不支持併發的服務器
if($config['systemOS'] == 'windows'){
	$config['settings']['updloadThreads'] = 1;
}
// windows iis bin上傳有限制
if(strstr($_SERVER['SERVER_SOFTWARE'],'-IIS')){
	$config['settings']['updloadBindary'] = 0;
}
//自適應https
if(substr(APP_HOST,0,8) == 'https://'){
    $config['settings']['pluginServer'] = str_replace("http://",'https://',$config['settings']['pluginServer']);
}

$config['settings']['appType'] = array(
	array('type' => 'tools','name' => 'app_group_tools','class' => 'icon-suitcase'),
	array('type' => 'game','name' => 'app_group_game','class' => 'icon-dashboard'),
	array('type' => 'movie','name' => 'app_group_movie','class' => 'icon-film'),
	array('type' => 'music','name' => 'app_group_music','class' => 'icon-music'),
	array('type' => 'life','name' => 'app_group_life','class' => 'icon-map-marker'),
	array('type' => 'others','name' => 'app_group_others','class' => 'icon-ellipsis-horizontal'),
);
$config['defaultPlugins'] = array(
	'adminer','DPlayer','imageExif','jPlayer','officeLive','photoSwipe','picasa',//'pdfjs',
	'simpleClock','toolsCommon','VLCPlayer','webodf','yzOffice','zipView'
);


//初始化系統配置
$config['settingSystemDefault'] = array(
	'systemPassword'	=> rand_string(20),
	'systemName'		=> "KodExplorer",
	'systemDesc'		=> "——可道雲.資源管理器",
	'pathHidden'		=> "Thumb.db,.DS_Store,.gitignore,.git",//目錄列表隱藏的項
	'autoLogin'			=> "0",			// 是否自動登錄；登錄用戶為guest
	'needCheckCode'		=> "0",			// 登陸是否開啟驗證碼；默認關閉
	'firstIn'			 => "explorer",	 // 登錄後默認進入[explorer desktop,editor]
	'passwordCheck'		=> '0',			// 是否強制要求密碼強度: 長度大於6,包含數字和英文字母;

	'newUserApp'		=> "",
	'newUserFolder'		=> "document,desktop",
	'newGroupFolder'	=> "share",	//新建分組默認建立文件夾
	'groupShareFolder'	=> "share",
	
	'desktopFolder'		=> 'desktop',	// 桌面文件夾別名
	'versionType'		=> "A",			// 版本
	'rootListUser'		=> 0,			// 組織架構根節點展示群組內用戶
	'rootListGroup'		=> 0,			// 組織架構根節點展示子群組
	'csrfProtect'		=> 0, 		 	// 開啟csrf保護
	'currentVersion'	=> KOD_VERSION,

	'wallpageDesktop'	=> "8",
	'wallpageLogin'		=> "2,3,6,8,9,11,12",
);
//初始化默認菜單配置
$config['settingSystemDefault']['menu'] = array(
	array('name'=>'desktop','type'=>'system','url'=>'index.php?desktop','target'=>'_self','use'=>'1'),
	array('name'=>'explorer','type'=>'system','url'=>'index.php?explorer','target'=>'_self','use'=>'1'),
	// array('name'=>'editor','type'=>'system','url'=>'index.php?editor','target'=>'_self','use'=>'1')
);
if( strstr(I18n::defaultLang(),'zh') || strstr(I18n::getType(),'zh') ){
	$config['settingSystemDefault']['newGroupFolder'] = "share";
	$config['settingSystemDefault']['newUserFolder'] = "document";
}

//新用戶初始化默認配置
$config['settingDefault'] = array(
	'listType'			=> "icon",		// list||icon||split
	'listSortField'		=> "name",		// name||size||ext||mtime
	'listSortOrder'		=> "up",		// asc||desc
	'fileIconSize'		=> "80",		// 圖標大小
	'animateOpen'		=> "0",			// dialog動畫
	'soundOpen'			=> "0",			// 操作音效
	'theme'				=> "win10",		// app theme [mac,win7,win10,metro,metro_green,alpha]
	'wall'				=> "8",			// wall picture
	"fileRepeat"		=> "replace",	// rename,replace,skip
	"recycleOpen"		=> "1",			// 1 | 0 代表是否開啟
	'resizeConfig'		=> 
		'{"filename":250,"filetype":80,"filesize":80,"filetime":215,"editorTreeWidth":200,"explorerTreeWidth":200}'
);
$config['editorDefault'] = array(
	'fontSize'		=> '14px',
	'theme'			=> 'tomorrow',
	'autoWrap'		=> 1,		//自適應寬度換行
	'autoComplete'	=> 1,
	'functionList' 	=> 1,
	"tabSize"		=> 4,
	"softTab"		=> 1,
	"displayChar"	=> 0,		//是否顯示特殊字符
	"fontFamily"	=> "Menlo",	//字體
	"keyboardType"	=> "ace",	//ace vim emacs
	"autoSave"		=> 0,		//自動保存
);


// 多選項總配置	
// http://blog.sina.com.cn/s/blog_7981f91f01012wm7.html
// http://monsoongale.iteye.com/blog/1044431
$config['settingAll'] = array(
	'language' => array(
		"en"	=>	array("English","英語","English"),
		"zh-TW"	=>	array("繁體中文","繁體中文","Traditional Chinese"),
	),//de el fi fr nl pt	d/m/Y H:i
	
	'themeall'		=> "mac,win10,win7,metro,metro_green,metro_purple,metro_pink,metro_orange,alpha_image,alpha_image_sun,alpha_image_sky,diy",
	'codethemeall'	=> "chrome,clouds,crimson_editor,eclipse,github,kuroir,solarized_light,tomorrow,xcode,ambiance,monokai,idle_fingers,pastel_on_dark,solarized_dark,twilight,tomorrow_night_blue,tomorrow_night_eighties",
	'codefontall'	=> 'Source Code Pro,Consolas,Courier,DejaVu Sans Mono,Liberation Mono,Menlo,Monaco,Monospace'
);


//權限配置；精確到需要做權限控制的控制器和方法
//需要權限認證的Action;root組無視權限
$config['roleSetting'] = array(
	'explorer'	=> array(
		'pathInfo','pathList','treeList','pathChmod',
		'mkdir','mkfile','pathRname','pathDelete','zip','unzip','unzipList',
		'pathCopy','pathCute','pathCuteDrag','pathCopyDrag','clipboard','pathPast',
		'serverDownload','fileUpload','search','pathDeleteRecycle',
		'fileDownload','zipDownload','fileDownloadRemove','fileProxy','fileSave','officeView','officeSave'),
	'app'		=> array('userApp','initApp','add','edit','del'),//
	'editor'	=> array('fileGet','fileSave'),

	'user'		=> array('changePassword','commonJs'),//可以設立公用賬戶
	'userShare' => array('set','del'),
	'setting'	=> array('set','systemSetting','phpInfo','systemTools'),
	'fav'		=> array('add','del','edit'),

	'systemMember'	=> array('get','add','edit','doAction','getByName'),
	'systemGroup'	=> array('get','add','del','edit'),
	'systemRole'	=> array('add','del','edit','roleGroupAction'),
	//不開放此功能【避免擴展名修改，導致系統安全問題】
	'pluginApp'		=> array('index','appList','changeStatus','setConfig','install','unInstall')
);

$config['pathRoleDefine'] = array(
	'read'	=> array(
		'list'	=> array('explorer.index','explorer.pathList','explorer.treeList','editor.index','pluginApp.to'),
		'info'	=> array('explorer.pathInfo','explorer.search'),
		'copy'	=> array('explorer.pathCopy'),
		'preview'=>array('explorer.image','explorer.unzipList','explorer.fileProxy','explorer.officeView','editor.fileGet','explorer.fileView'),
		'download'=>array('explorer.fileDownload','explorer.zipDownload','explorer.fileDownloadRemove'),
	),
	'write' => array(
		'add'	=> array('explorer.mkdir','explorer.mkfile','explorer.zip','explorer.unzip','app.userApp'),
		'edit'	=> array('explorer.officeSave','explorer.imageRotate','editor.fileSave','explorer.fileSave'),
		'change'=> array('explorer.pathRname','explorer.pathPast','explorer.pathCopyDrag','explorer.pathCuteDrag'),
		'upload'=> array('explorer.fileUpload','explorer.serverDownload'),
		'remove'=> array('explorer.pathDelete','explorer.pathCute'),
	)
);

$config['pathRoleGroupDefault'] = array(
	'1'	=> array(
		"name"		=> "read",
		"style"		=> "blue-light",
		"display"	=> 1,
		"actions"	=> array(
			"read:list" 	=> 1,
			"read:info" 	=> 1,
			"read:copy" 	=> 1,
			"read:preview"	=> 1,
			"read:download" => 1,
		)
	),
	'2'	=> array(
		"name"		=> "write",
		'style'		=> "blue-deep",
		"display"	=> 1,
		"actions"	=> array(
			"read:list" 	=> 1,
			"read:info" 	=> 1,
			"read:copy" 	=> 1,
			"read:preview"	=> 1,
			"read:download" => 1,

			"write:add"		=> 1,
			"write:edit"	=> 1,
			"write:change"	=> 1,
			"write:upload"	=> 1,
			"write:remove"	=> 1,
		)
	),
);

